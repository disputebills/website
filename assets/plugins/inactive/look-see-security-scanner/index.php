<?php
/*
Plugin Name: Look-See Security Scanner
Plugin URI: https://wordpress.org/plugins/look-see-security-scanner/
Description: Verify the integrity of a WP installation by scanning for unexpected or modified files.
Version: 20.1.2
Author: Blobfolio, LLC
Author URI: https://blobfolio.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

	Copyright © 2016  Blobfolio, LLC  (email: hello@blobfolio.com)

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/



//---------------------------------------------------------------------
// Init & Setup
//---------------------------------------------------------------------

//the database version
define('LOOKSEE_DB',			2.03);

//the program version
define('LOOKSEE_VERSION',		'20.1.1');

//the normal chunk size when entering data en masse
define('LOOKSEE_CHUNK',			250);

//a regex filter for common media files
define('LOOKSEE_MEDIA_REGEX',	'/\.(ai|psd|bmp|jpe?g|gif|png|tiff?|webp|svgz?|mp4|mpg|mp3|mp2|m4v|webm|ogv|ogg|midi|oga|flac|ico)$/');

//the number of scan tries before giving up
define('LOOKSEE_SCAN_TRIES',	3);

//the number of files to attempt at once
define('LOOKSEE_SCAN_FILES',	1000);

//the scan timeout (seconds)
define('LOOKSEE_SCAN_TIMEOUT',	10);

//the scan update chunk
define('LOOKSEE_SCAN_CHUNK',	250);

@require_once(dirname(__FILE__) . '/functions-admin.php');
@require_once(dirname(__FILE__) . '/functions-ajax.php');

//-------------------------------------------------
// Directory Traversal Options
//
// return options, and also set some constants on
// first load
//
// @param n/a
// @return options
function looksee_options(){
	static $options;

	if(is_null($options)){
		$options = get_option('looksee_options', array(
			'skipCache'=>1,
			'skipMedia'=>1,
			'skipSize'=>2097152,
			'onlyCore'=>0
		));
		foreach($options AS $k=>$v){
			$options[$k] = (int) $v;
			if($options[$k] <= 0)
				unset($options[$k]);
		}
	}

	//for performance reasons, it is best to define constants for the
	//search options, as loading even a cached array 1000x is slow
	foreach(array('skipMedia'=>'LOOKSEE_SKIP_MEDIA', 'skipCache'=>'LOOKSEE_SKIP_CACHE', 'skipSize'=>'LOOKSEE_SKIP_SIZE', 'onlyCore'=>'LOOKSEE_ONLY_CORE') AS $k=>$v){
		if(!defined($v))
			define($v, (isset($options[$k]) ? $options[$k] : false));
	}

	return $options;
}
add_action('plugins_loaded', 'looksee_options');

//-------------------------------------------------
// Set Up DB
//
// @param n/a
// @return true
function looksee_db(){
	global $wpdb;
	@require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	$charset = $wpdb->get_charset_collate();

	//hold server files
	$sql = "CREATE TABLE {$wpdb->prefix}looksee2_files (
  file_name_hash char(32) NOT NULL,
  file_name text NOT NULL,
  wp varchar(10) NOT NULL DEFAULT '',
  hash_expected char(32) NOT NULL DEFAULT '',
  hash_found char(32) NOT NULL DEFAULT '',
  mime varchar(50) NOT NULL DEFAULT '',
  size bigint(20) NOT NULL DEFAULT '0',
  modified datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  permissions smallint(5) NOT NULL DEFAULT '0',
  pending tinyint(1) NOT NULL DEFAULT '0',
  tries tinyint(1) NOT NULL DEFAULT '0',
  status enum('','badCore','oldCore','extraCore','badUpload','failed','new','changed','deleted') NOT NULL DEFAULT '',
  PRIMARY KEY  (file_name_hash),
  KEY wp (wp),
  KEY pending (pending),
  KEY hash_expected (hash_expected),
  KEY hash_found (hash_found),
  KEY tries (tries),
  KEY status (status)
) $charset";

	//save it
	dbDelta($sql);

	//hold core checksums
	$sql = "CREATE TABLE {$wpdb->prefix}looksee2_core (
  wp varchar(10) NOT NULL,
  file_name_hash char(32) NOT NULL,
  file_name text NOT NULL,
  hash char(32) NOT NULL DEFAULT '',
  PRIMARY KEY  (wp,file_name_hash),
  KEY hash (hash)
) $charset";

	//save it
	dbDelta($sql);

	//take this opportunity to clear old settings
	looksee_version_cleanup();

	//save db version and exit
	update_option('looksee_db_version', LOOKSEE_DB);
	return true;
}
register_activation_hook(__FILE__,'looksee_db');

//-------------------------------------------------
// Clean Up
//
// remove settings and tables from old versions
//
// @param n/a
// @return true
function looksee_version_cleanup(){
	global $wpdb;

	//remove old Look-See tables, if applicable
	$wpdb->query("DROP TABLE IF EXISTS `{$wpdb->prefix}looksee_files`");

	//remove old options
	$options = array(
		'looksee_core_version',
		'looksee_file_permissions',
		'looksee_file_permissions',
		'looksee_inside',
		'looksee_max_size',
		'looksee_scan_report',
		'looksee_skip_cache'
	);
	foreach($options AS $o)
		delete_option($o);
}

//-------------------------------------------------
// Make Sure Tables Exist
//
// @param n/a
// @return true/false
function looksee_tables_exist(){
	static $exist;

	if(is_null($exist)){
		global $wpdb;
		$dbResult = $wpdb->get_results("SHOW TABLES WHERE `Tables_in_" . DB_NAME . "` = '{$wpdb->prefix}looksee2_files' OR `Tables_in_" . DB_NAME . "` = '{$wpdb->prefix}looksee2_core'", ARRAY_N);
		$exist = count($dbResult) === 2;

		//unset our database flags
		if(!$exist){
			delete_option('looksee_db_version');
			delete_option('looksee_checksum_version');
		}
	}

	return $exist;
}

//-------------------------------------------------
// Require Tables
//
// no point loading our sub-pages if the tables
// are messed up.
//
// @param n/a
// @return true or die
function looksee_require_tables_exist(){
	if(!looksee_tables_exist())
		wp_die('This page cannot be loaded until the database tables are populated.');

	return true;
}

//-------------------------------------------------
// DB Updates?
//
// @param n/a
// @return true
function looksee_db_upgrade(){

	//don't do this on AJAX or CRON
	if((defined('DOING_CRON') && DOING_CRON) || (defined('DOING_AJAX') && DOING_AJAX))
		return true;

	//update the DB table structure
	if(get_option('looksee_db_version') != LOOKSEE_DB)
		looksee_db();

	//update checksums
	if(get_option('looksee_checksum_version') != get_bloginfo('version','display'))
		looksee_core_checksums(true);
}
add_action('plugins_loaded', 'looksee_db_upgrade');

//-------------------------------------------------
// Save Checksums
//
// pull core checksums from WP API
//
// @param clean
// @return true/false
function looksee_core_checksums($clean=false){
	global $wpdb, $wp_local_package;

	if(!looksee_tables_exist())
		return false;

	$version = get_bloginfo('version', 'display');
	$locale = isset($wp_local_package) ? $wp_local_package : 'en_US';

	//do we need to do anything?
	if(!$clean && intval($wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}looksee2_core` WHERE `wp`='" . esc_sql($version) . "'")))
		return true;

	//make sure update.php is loaded
	@require_once(ABSPATH . 'wp-admin/includes/update.php');

	$inserts = array();
	$tmp = get_core_checksums($version, $locale);

	//if this is not an array or is in some other way bad, return false
	if(!is_array($tmp) || !count($tmp))
		return false;

	//clear old values
	looksee_db_truncate("{$wpdb->prefix}looksee2_core");

	//build data to insert
	foreach($tmp AS $k=>$v){
		//we don't care about wp-content
		if('wp-content' == substr($k, 0, 10))
			continue;

		$inserts[] = "('" . esc_sql($version) . "','" . md5($k) . "','" . esc_sql($k) . "','$v')";
	}

	//insert en masse for maximum efficiency, but limit the number of
	//simultaneous inserts to help servers memory problems
	$inserts = array_chunk($inserts, LOOKSEE_CHUNK);
	foreach($inserts AS $i)
		$wpdb->query("INSERT INTO `{$wpdb->prefix}looksee2_core`(`wp`,`file_name_hash`,`file_name`,`hash`) VALUES" . implode(',', $i));

	update_option('looksee_checksum_version', $version);
	return true;
}

//--------------------------------------------------------------------- end init/setup



//---------------------------------------------------------------------
// Data Helpers
//---------------------------------------------------------------------

//-------------------------------------------------
// Always Use Forward Slashes
//
// @param path
// @return path
function looksee_forwardslashit($path){
	return str_replace('\\', '/', $path);
}

//-------------------------------------------------
// Stricter Parse Args
//
// like wp_parse_args, but we only want to allow
// keys in the template
//
// @param args
// @param defaults
// @return parsed or false
function looksee_parse_args($args, $defaults){
	$args = (array) $args;
	$defaults = (array) $defaults;

	if(!count($defaults))
		return false;
	if(!count($args))
		return $defaults;

	foreach($defaults AS $k=>$v){
		if(isset($args[$k]))
			$defaults[$k] = $args[$k];
	}

	return $defaults;
}

//-------------------------------------------------
// TRUNCATE helper
//
// Not all database users will have TRUNCATE
// permissions, so we'll try to fallback to a
// slower DELETE
//
// @param table
// @return true/false
function looksee_db_truncate($table){
	global $wpdb;

	$table = esc_sql($table);

	if(false !== $wpdb->query("TRUNCATE TABLE `$table`"))
		return true;

	if(false !== $wpdb->query("DELETE FROM `$table`"))
		return true;

	return false;
}

//-------------------------------------------------
// Directory Traversal
//
// you would think readdir() would be the fastest,
// but in practice FilesystemIterator w/ filters
// is much more efficient, but only if we handle
// recursion manually (RecursiveIteratorIterator
// bites). we're also not utilizing SplFileInfo at
// this stage, which saves a lot of overhead.
//
// @param directory
// @param (reference) files
// @return true
function looksee_readdir($dir, &$files){
	//remove trailing slash
	$dir = untrailingslashit($dir);

	//first, everything
	$iterator = new FilesystemIterator($dir, FilesystemIterator::CURRENT_AS_PATHNAME | FilesystemIterator::SKIP_DOTS | FilesystemIterator::UNIX_PATHS);

	//now filter in order of greatest impact, i.e., focus on reducing the
	//dataset early and performing heavy operations later

	if(LOOKSEE_SKIP_MEDIA){
		$iterator = new CallbackFilterIterator($iterator, function($file){
			return !is_file($file) || !(preg_match(LOOKSEE_MEDIA_REGEX, strtolower($file)));
		});
	}

	if(LOOKSEE_SKIP_CACHE){
		$iterator = new CallbackFilterIterator($iterator, function($file){
			return strpos($file, trailingslashit(ABSPATH) . 'wp-content/cache') !== 0;
		});
	}

	if(LOOKSEE_SKIP_SIZE){
		$iterator = new CallbackFilterIterator($iterator, function($file){
			try {
				if(is_file($file)){
					$size = @filesize($file);
					return $size <= LOOKSEE_SKIP_SIZE;
				}
			} catch(Exception $e){}

			return true;
		});
	}

	//finally, parse what we've found!
	foreach($iterator AS $file){
		if(is_dir($file))
			looksee_readdir($file, $files);
		else {
			$nice_name = looksee_format_file($file);
			$files[md5($nice_name)] = $nice_name;
		}
	}

	return true;
}

//-------------------------------------------------
// FILTER found file: straighten slashes, strip
// ABSPATH
//
// @param file
// @return file/false
function looksee_format_file($file){
	$file = looksee_forwardslashit($file);
	if(substr($file, 0, strlen(ABSPATH)) === ABSPATH)
		$file = substr($file, strlen(ABSPATH));
	return $file;
}

//--------------------------------------------------------------------- end helpers



//---------------------------------------------------------------------
// MIME TYPES
//---------------------------------------------------------------------

//-------------------------------------------------
// Build MIME DB
//
// this is an internal function to translate the
// the (lovely) mime database provided by
// https://github.com/jshttp/mime-db into something
// that is a little more efficient to parse during
// file scans
//
// @param n/a
// @return true
function looksee_build_mimes(){
	//the source mimes
	$raw = json_decode(file_get_contents(dirname(__FILE__) . '/mimes-raw.json'), true);

	//reformat so it is ext=>type
	$mimes = array();
	foreach($raw AS $type=>$v){
		if(!isset($v['extensions']) || !count($v['extensions']))
			continue;
		foreach($v['extensions'] AS $ext)
			$mimes[$ext] = $type;
	}
	ksort($mimes);

	//save
	@file_put_contents(dirname(__FILE__) . '/mimes.json', json_encode($mimes));

	//debug notice
	header("content-type: text/plain");
	echo 'Built ' . count($mimes) . ' mimes.';
	exit;
}

//-------------------------------------------------
// Get Mime Type by file path
//
// why is this so hard?! the fileinfo extension is
// not reliably present, and even when it is it
// kinda sucks, and WordPress' internal function
// excludes a ton. well, let's do it ourselves then
//
// @param file
// @return type
function looksee_get_mime_type($file){
	static $mimes;

	//first, load the mimes
	if(is_null($mimes))
		$mimes = json_decode(@file_get_contents(dirname(__FILE__) . '/mimes.json'), true);

	//extension
	$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

	//done
	return strlen($ext) && isset($mimes[$ext]) ? $mimes[$ext] : 'application/octet-stream';
}

//--------------------------------------------------------------------- end mimes



//---------------------------------------------------------------------
// Scan!
//---------------------------------------------------------------------

//-------------------------------------------------
// Scan Status Reset
//
// @param reset
// @return true
function looksee_scan_status_reset($reset=false){
	$defaults = array(
		'date'=>current_time('mysql'),
		'started'=>0,
		'ended'=>0,
		'duration'=>0,
		'status'=>false,
		'files'=>array(
			'total'=>0,
			'scanned'=>0,
			'pending'=>0
		),
		'summary'=>array(
			'badCore'=>array(
				'count'=>0,
				'name'=>'Bad Core Files',
				'info'=>'This shows WordPress core files that have been modified (which is never a good sign!).',
				'action'=>'Visit wordpress.org and download a fresh copy of the program.',
				'level'=>'danger'
			),
			'oldCore'=>array(
				'count'=>0,
				'name'=>'Old Core Files',
				'info'=>'This shows files that were once, but are no longer, part of the WordPress core.',
				'action'=>'These files should be deleted automatically whenever you upgrade WordPress, but if you perform manual updates that might not happen. To keep things clean, these files should be deleted.',
				'level'=>'warning'
			),
			'extraCore'=>array(
				'count'=>0,
				'name'=>'Non-Core Files In Reserved Folders',
				'info'=>'This shows unexpected files in the protected WordPress folders `wp-include` and `wp-admin`.',
				'action'=>'You should carefully inspect and probably delete these files.',
				'level'=>'danger'
			),
			'badUpload'=>array(
				'count'=>0,
				'name'=>'Scripts in Uploads',
				'info'=>'This shows you scripts located in the uploads folder, which should really only contain media files.',
				'action'=>'You should carefully inspect and probably delete these files.',
				'level'=>'danger'
			),
			'new'=>array(
				'count'=>0,
				'name'=>'New Files',
				'info'=>'This shows any new files that have been found since the previous scan.',
				'action'=>'You should double-check the list for anything unexpected. If you have not run a scan before or if you change your scan settings, this might contain a lot of files.',
				'level'=>'warning'
			),
			'deleted'=>array(
				'count'=>0,
				'name'=>'Deleted Files',
				'info'=>'This shows any files that have been deleted since the previous scan.',
				'action'=>'',
				'level'=>'warning'
			),
			'changed'=>array(
				'count'=>0,
				'name'=>'Changed Files',
				'info'=>'This shows files that have changed since the previous scan. Most often this will contain updated plugin files.',
				'action'=>'You should double-check the list for anything unexpected.',
				'level'=>'warning'
			),
			'failed'=>array(
				'count'=>0,
				'name'=>'Scan Failures',
				'info'=>'This shows any files that were found but could not be scanned.',
				'action'=>'You should double-check these files have the correct owner/permissions. If the failed files are overly large, you should set the size restriction to a lower value.',
				'level'=>'danger'
			),
			'ok'=>array(
				'count'=>0,
				'name'=>'A-OK!',
				'info'=>'',
				'action'=>'',
				'level'=>'info'
			)
		)
	);

	//and for our non-Windows users, add permissions
	if(strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN'){
		$defaults['summary']['perms'] = array(
			'count'=>0,
			'name'=>'Unsafe Permissions',
			'info'=>'This shows you any files with unsafe UNIX permissions.',
			'action'=>'File permissions dictate which user(s) are allowed to read, write, and/or execute it. Lax permissions present a security risk, so you should only set permissions that are actually necessary for your web site to function. For web server files, this usually means 644, 640, or 600.',
			'level'=>'warning'
		);
	}

	if($reset)
		update_option('looksee_scan', $defaults);

	return $defaults;
}

//-------------------------------------------------
// Scan Status
//
// get or update status
//
// @param restart
// @return status
function looksee_scan_status($restart=false){

	global $wpdb;

	$defaults = looksee_scan_status_reset();

	//new?
	if($restart){
		$data = $defaults;
		$data['started'] = microtime(true);
		$data['status'] = 'Scanning';
		update_option('looksee_scan', $data);
	}
	//get and/or update
	else {
		$data = looksee_parse_args(get_option('looksee_scan', null), $defaults);
		if(date('Y-m-d', strtotime($data['date'])) < date('Y-m-d', strtotime("-1 hour", current_time('timestamp'))))
			$data = $defaults;

		if($data['started'] > 0 && $data['ended'] === 0){
			$data['files']['total'] = (int) $wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}looksee2_files`");
			//if nothing, we're done
			if(!$data['files']['total'])
				$data = $defaults;
			//fetch more!
			else {
				$data['files']['pending'] = (int) $wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}looksee2_files` WHERE `pending`=1");
				$data['files']['scanned'] = $data['files']['total'] - $data['files']['pending'];
				//just in case
				if($data['files']['scanned'] < 0)
					$data['files']['scanned'] = 0;

				//we're done!
				if($data['files']['pending'] === 0){
					//update our file statuses

					$data['status'] = 'Finished';

					//clear our last file placeholder
					delete_option('looksee_last_file');

					//for consistency, delete files that were too big
					if(LOOKSEE_SKIP_SIZE){
						$wpdb->query("DELETE FROM `{$wpdb->prefix}looksee2_files` WHERE NOT(LENGTH(`hash_found`)) AND `size` > " . LOOKSEE_SKIP_SIZE);
						$data['files']['total'] = $data['files']['scanned'] = (int) $wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}looksee2_files`");
					}

					//bad core files
					$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `status`='badCore' WHERE LENGTH(`wp`) AND NOT(`hash_expected`=`hash_found`) AND LENGTH(`hash_found`)");

					//old core files are a little more annoying
					@require_once(ABSPATH . '/wp-admin/includes/update-core.php');
					global $_old_files;
					$old = array();
					foreach($_old_files AS $o)
						$old[] = md5($o);
					$old = array_chunk($old, LOOKSEE_CHUNK);
					foreach($old AS $o)
						$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `status`='oldCore' WHERE LENGTH(`hash_found`) AND `file_name_hash` IN ('" . implode("','", $o) . "')");
					unset($old);

					//extra files in core folders
					$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `status`='extraCore' WHERE LENGTH(`hash_found`) AND `status`='' AND NOT(LENGTH(`wp`)) AND (`file_name` LIKE 'wp-includes%' OR `file_name` LIKE 'wp-admin%')");

					//scripts in uploads
					$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `status`='badUpload' WHERE LENGTH(`hash_found`) AND `status`='' AND `file_name` LIKE 'wp-content/uploads%' AND LOWER(`file_name`) REGEXP '\.(php|php4|php3|phtml|rb|asp|aspx|pl|axd|asx|asmx|ashx|cfm|py|rhtml|cgi|dll)$'");

					//failed
					$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `status`='failed' WHERE `status`='' AND `tries` >= " . LOOKSEE_SCAN_TRIES);

					//new
					$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `status`='new' WHERE `status`='' AND LENGTH(`hash_found`) AND NOT(LENGTH(`hash_expected`))");

					//deleted
					$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `status`='deleted' WHERE `status`='' AND LENGTH(`hash_expected`) AND NOT(LENGTH(`hash_found`))");

					//updated
					$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `status`='changed' WHERE `status`='' AND NOT(`hash_found`=`hash_expected`)");

					//now the db is updated, let's pull the totals
					$dbResult = $wpdb->get_results("SELECT COUNT(*) AS `count`, `status` FROM `{$wpdb->prefix}looksee2_files` GROUP BY `status`", ARRAY_A);
					foreach($dbResult AS $Row)
						$data['summary'][(strlen($Row['status']) ? $Row['status'] : 'ok')]['count'] = (int) $Row['count'];

					//count permission issues for any non-Windows users
					if(strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN')
						$data['summary']['perms']['count'] = (int) $wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}looksee2_files` WHERE NOT(`permissions` IN (0,644,640,600))");

					//set the end time
					$data['ended'] = microtime(true);
					$data['duration'] = $data['ended'] - $data['started'];
				}
			}//update
			update_option('looksee_scan', $data);
		}//scan in progress
	}//not restarting

	//done
	return $data;
}

//-------------------------------------------------
// Pre Scan
//
// scans can be really hard work on slow shared
// servers, so first we need to generate a list of
// targets. we'll scan those in smaller chunks
// later.
//
// @param n/a
// @return true/false
function looksee_prescan(){

	global $wpdb;

	looksee_scan_status(true);

	//before we do anything, make sure we have core files
	if(!intval($wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}looksee2_core` WHERE `wp`='" . esc_sql(get_bloginfo('version','display')) . "'"))){
		looksee_core_checksums(true);
		//still no cores, exit
		if(!intval($wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}looksee2_core` WHERE `wp`='" . esc_sql(get_bloginfo('version','display')) . "'")))
			return false;
	}

	//if we're doing core-only, we can delete it all!
	if(LOOKSEE_ONLY_CORE)
		looksee_db_truncate("{$wpdb->prefix}looksee2_files");

	//deletion of old data is more selective...
	else {
		//first, delete records that don't apply any more
		$conds = array("LENGTH(`wp`)", "NOT(LENGTH(`hash_found`))", "`status`='oldCore'");
		if(LOOKSEE_SKIP_CACHE)
			$conds[] = "`file_name` LIKE 'wp-content/cache%'";
		if(LOOKSEE_SKIP_SIZE)
			$conds[] = "`size` > " . intval(LOOKSEE_SKIP_SIZE);
		if(LOOKSEE_SKIP_MEDIA)
			$conds[] = "LOWER(`file_name`) REGEXP '" . substr(LOOKSEE_MEDIA_REGEX, 1, strlen(LOOKSEE_MEDIA_REGEX)-2) . "'";
		$wpdb->query("DELETE FROM `{$wpdb->prefix}looksee2_files` WHERE " . implode(' OR ', $conds));

		//move previous "found" hash to "expected"
		$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `hash_expected`=`hash_found`, `hash_found`=''");
	}

	//add WP core files back (we always expect the real hash)
	$wpdb->query("INSERT INTO `{$wpdb->prefix}looksee2_files`(`file_name_hash`,`file_name`,`wp`,`hash_expected`) (SELECT `file_name_hash`, `file_name`, `wp`, `hash` AS `hash_expected` FROM `{$wpdb->prefix}looksee2_core`" . (LOOKSEE_SKIP_MEDIA ? " WHERE NOT(LOWER(`file_name`) REGEXP '" . substr(LOOKSEE_MEDIA_REGEX, 1, strlen(LOOKSEE_MEDIA_REGEX)-2) . "')" : '') . ") ON DUPLICATE KEY UPDATE `wp`=VALUES(`wp`)");

	//once again, a core-only scan is easy
	if(LOOKSEE_ONLY_CORE)
		$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `pending`=1, `status`='', `tries`=0");
	//otherwise we have a lot more work to do
	else {
		//now get whatever files are in the table
		$old_files = array();
		$removed = array();
		$dbResult = $wpdb->get_results("SELECT `file_name_hash`, `file_name` FROM `{$wpdb->prefix}looksee2_files` ORDER BY `file_name_hash` ASC", ARRAY_A);
		if(is_array($dbResult) && count($dbResult)){
			foreach($dbResult AS $Row)
				$old_files[$Row['file_name_hash']] = $Row['file_name'];
		}

		//now get our new files
		$new_files = array();
		looksee_readdir(ABSPATH, $new_files);

		//calculate array keys, more efficient this way
		$old_keys = array_keys($old_files);
		$new_keys = array_keys($new_files);

		//anything new?
		$new = array_diff($new_keys, $old_keys);

		if(count($new)){
			$inserts = array();
			foreach($new AS $n)
				$inserts[] = "('$n', '" . esc_sql($new_files[$n]) . "')";

			$inserts = array_chunk($inserts, LOOKSEE_CHUNK);
			foreach($inserts AS $i)
				$wpdb->query("INSERT INTO `{$wpdb->prefix}looksee2_files`(`file_name_hash`,`file_name`) VALUES" . implode(',', $i));
			unset($i);
		}
		unset($new);

		//reset some statuses
		$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `pending`=1, `status`='', `tries`=0");

		//anything lost? we can save scan time by de-pending them now
		$removed = array_diff($old_keys, $new_keys);
		if(count($removed)){
			$removed = array_chunk($removed, LOOKSEE_CHUNK);
			foreach($removed AS $r)
				$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `pending`=0 WHERE `file_name_hash` IN ('" . implode("','", $r) . "')");
			unset($r);
		}
	}

	//at this point, there need to be files or we're broken
	if(!intval($wpdb->get_var("SELECT COUNT(*) FROM `{$wpdb->prefix}looksee2_files`")))
		return false;

	//and done!
	return true;
}

//-------------------------------------------------
// Scan!
//
// @param file
// @return info
function looksee_scan($file){

	$info = array(
		'hash_found'=>'',
		'size'=>0,
		'modified'=>'0000-00-00 00:00:00',
		'permissions'=>0,
		'mime'=>''
	);

	$path = ABSPATH . "/$file";

	if(!file_exists($path))
		return $info;

	try {
		$file = new SplFileInfo($path);
		if(!$file->isFile() || !$file->isReadable())
			return $info;

		$info['size'] = (int) $file->getSize();
		$info['modified'] = date('Y-m-d H:i:s', $file->getMTime());
		$info['permissions'] = strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? 0 : (int) substr(sprintf('%o', $file->getPerms()), -3);
		$info['mime'] = looksee_get_mime_type($path);

		//find its hash?
		if(!LOOKSEE_SKIP_SIZE || $info['size'] <= LOOKSEE_SKIP_SIZE)
			$info['hash_found'] = md5_file($path);

	} catch(Exception $e){}


	return $info;
}

//--------------------------------------------------------------------- end scan
?>