<?php
//---------------------------------------------------------------------
// AJAX
//---------------------------------------------------------------------
// AJAX handlers



//-------------------------------------------------
// Scan!
//
// @param n/a
// @return json
function looksee_ajax_scan(){

	global $wpdb;
	global $current_user;

	//our response
	$xout = array(
		'success'=>false,
		'errors'=>array(),
		'data'=>array()
	);

	//only admins can do this
	if(!current_user_can('manage_options')){
		$xout['errors'][] = 'You do not have permission to run a scan.';
		wp_send_json($xout);
	}

	if(!isset($_POST['n']) || !wp_verify_nonce($_POST['n'], 'looksee-scan')){
		$xout['errors'][] = 'The form had expired. Please reload the page and try again.';
		wp_send_json($xout);
	}

	//are we starting?
	if(isset($_POST['start'])){
		if(false === (looksee_prescan())){
			$xout['errors'][] = 'The prescan was either unable to collect the official WordPress core checksums or was unable to access the file system.';
		}
		else {
			$xout['data'] = looksee_scan_status();
			$xout['success'] = true;
		}
		wp_send_json($xout);
	}

	//so just a regular ol' scan then
	$dbResult = $wpdb->get_results("SELECT `file_name_hash`, `file_name`, `tries` FROM `{$wpdb->prefix}looksee2_files` WHERE `pending`=1 AND `tries` < " . LOOKSEE_SCAN_TRIES . " ORDER BY `file_name_hash` ASC LIMIT " . LOOKSEE_SCAN_FILES, ARRAY_A);

	//nothing?
	if(!is_array($dbResult) || !count($dbResult)){
		$wpdb->query("UPDATE `{$wpdb->prefix}looksee2_files` SET `pending`=0");
		$xout['data'] = looksee_scan_status();
		$xout['success'] = true;
		wp_send_json($xout);
	}

	//keep track of when we start so we don't take too long
	$start = microtime(true);

	//make sure we don't go over the same files due to failure
	$hashes = array();
	foreach($dbResult AS $Row)
		$hashes[] = $Row['file_name_hash'];

	//did we try these already? if so, enter restricted mode where we update
	//more frequently
	$restricted = in_array(get_option('looksee_last_file', ''), $hashes);
	if(!$restricted)
		update_option('looksee_last_file', $hashes[0]);

	//and done with those
	unset($hashes);

	//okay, the real scan now
	$updates = array();
	foreach($dbResult AS $Row){
		$tmp = array(
			'hash_found'=>'',
			'size'=>0,
			'modified'=>'0000-00-00 00:00:00',
			'permissions'=>0,
			'mime'=>'',
			'tries'=>intval($Row['tries']) + 1,
			'pending'=>1
		);

		//try to scan it
		if(false !== ($info = looksee_scan($Row['file_name']))){
			$tmp = looksee_parse_args($info, $tmp);
			$tmp['pending'] = 0;
		}

		//if restricted, update each file individually
		if($restricted)
			$wpdb->update("{$wpdb->prefix}looksee2_files", $tmp, array('file_name_hash'=>$Row['file_name_hash']), array('%s', '%d', '%s', '%d', '%s', '%d', '%d'), '%s');
		else
			$updates[] = "('{$Row['file_name_hash']}','{$tmp['hash_found']}',{$tmp['size']},'{$tmp['modified']}',{$tmp['permissions']},'" . esc_sql($tmp['mime']) . "',{$tmp['tries']},{$tmp['pending']})";

		//give up so we can save what we've scanned
		if(microtime(true) - $start >= LOOKSEE_SCAN_TIMEOUT)
			break;
	}

	//updating?
	if(count($updates)){
		$updates = array_chunk($updates, LOOKSEE_SCAN_CHUNK);
		//it is more efficient to use ON DUPLICATE KEY than to have a
		//crazy long CASE/WHEN type of situation, or to attempt to
		//save these one by one
		foreach($updates AS $u){
			$wpdb->query("INSERT INTO `{$wpdb->prefix}looksee2_files`(`file_name_hash`,`hash_found`,`size`,`modified`,`permissions`,`mime`,`tries`,`pending`) VALUES" . implode(',', $u) . " ON DUPLICATE KEY UPDATE `hash_found`=VALUES(`hash_found`), `size`=VALUES(`size`),`modified`=VALUES(`modified`),`permissions`=VALUES(`permissions`),`mime`=VALUES(`mime`),`tries`=VALUES(`tries`),`pending`=VALUES(`pending`)");
		}
	}

	$xout['success'] = true;
	$xout['data'] = looksee_scan_status();

	wp_send_json($xout);
}
add_action('wp_ajax_looksee_ajax_scan', 'looksee_ajax_scan');



//-------------------------------------------------
// Abort Scan!
//
// @param n/a
// @return json
function looksee_ajax_scan_abort(){
	global $wpdb;
	global $current_user;

	//our response
	$xout = array(
		'success'=>false,
		'errors'=>array(),
		'data'=>array()
	);

	//only admins can do this
	if(!current_user_can('manage_options')){
		$xout['errors'][] = 'You do not have permission to run a scan.';
		wp_send_json($xout);
	}

	if(!isset($_POST['n']) || !wp_verify_nonce($_POST['n'], 'looksee-scan')){
		$xout['errors'][] = 'The form had expired. Please reload the page and try again.';
		wp_send_json($xout);
	}

	$xout['data'] = looksee_scan_status_reset(true);
	looksee_db_truncate("{$wpdb->prefix}looksee2_files");
	delete_option('looksee_last_file');
	$xout['success'] = true;

	wp_send_json($xout);
}
add_action('wp_ajax_looksee_ajax_scan_abort', 'looksee_ajax_scan_abort');



//-------------------------------------------------
// Get Results
//
// @param n/a
// @return json
function looksee_ajax_scan_results(){
	global $wpdb;
	global $current_user;

	//our response
	$xout = array(
		'success'=>false,
		'errors'=>array(),
		'data'=>array()
	);

	//only admins can do this
	if(!current_user_can('manage_options')){
		$xout['errors'][] = 'You do not have permission to run a scan.';
		wp_send_json($xout);
	}

	if(!isset($_POST['n']) || !wp_verify_nonce($_POST['n'], 'looksee-scan')){
		$xout['errors'][] = 'The form had expired. Please reload the page and try again.';
		wp_send_json($xout);
	}

	if(!isset($_POST['status']) || !strlen($_POST['status'])){
		$xout['errors'][] = 'Invalid file status.';
		wp_send_json($xout);
	}

	//file permissions are tracked separately
	if($_POST['status'] === 'perms'){
		$dbResult = $wpdb->get_results("SELECT CONCAT(`permissions`,' ',`file_name`) AS `file`, `size`, `mime` AS `type`, `modified` FROM `{$wpdb->prefix}looksee2_files` WHERE NOT(`permissions` IN (0,644,640,600)) ORDER BY `file_name` ASC", ARRAY_A);
		if(is_array($dbResult) && count($dbResult)){
			$xout['data'] = $dbResult;
			$xout['success'] = true;
		}
	}
	//all the other results are boilerplate
	else {
		$dbResult = $wpdb->get_results("SELECT `file_name` AS `file`, `size`, `mime` AS `type`, `modified`, `wp` FROM `{$wpdb->prefix}looksee2_files` WHERE `status`='" . esc_sql($_POST['status']) . "' ORDER BY `file_name` ASC", ARRAY_A);
		if(is_array($dbResult) && count($dbResult)){
			$xout['data'] = $dbResult;
			$xout['success'] = true;
		}
	}

	wp_send_json($xout);
}
add_action('wp_ajax_looksee_ajax_scan_results', 'looksee_ajax_scan_results');


//-------------------------------------------------
// Update Settings
//
// @param n/a
// @return json
function looksee_ajax_scan_settings(){

	//our response
	$xout = array(
		'success'=>false,
		'errors'=>array(),
		'data'=>array()
	);

	//only admins can do this
	if(!current_user_can('manage_options'))
		$xout['errors'][] = 'You do not have permission to update the scan settings.';

	//check the nonce
	if(!wp_verify_nonce($_POST['n'], 'looksee-scan-settings'))
		$xout['errors'][] = 'The form had expired. Please reload the page and try again.';

	//check the status
	$status = looksee_scan_status();
	if($status['status'] === 'Scanning')
		$xout['errors'][] = 'You cannot update the settings while a scan is underway.';

	if(!count($xout['errors'])){
		$options = looksee_options();

		//do core and media first, since they always apply
		foreach(array('skipMedia','onlyCore') AS $field)
			$options[$field] = isset($_POST[$field]) && intval($_POST[$field]) ? 1 : 0;

		//onlyCore is incompatible with size and cache
		if(!$options['onlyCore']){
			$options['skipCache'] = isset($_POST['skipCache']) && intval($_POST['skipCache']) === 1 ? 1 : 0;
			//size needs a touch of sanitizing
			$options['skipSize'] = isset($_POST['skipSize']) ? intval($_POST['skipSize']) * 1024 * 1024 : 2097152;
			if($options['skipSize'] < 0)
				$options['skipSize'] = 0;
		}
		else
			$options['skipCache'] = $options['skipSize'] = 0;

		//save
		update_option('looksee_options', $options);
		$xout['success'] = true;
	}

	wp_send_json($xout);
}
add_action('wp_ajax_looksee_ajax_scan_settings', 'looksee_ajax_scan_settings');



//-------------------------------------------------
// Scan Plugins/Themes
//
// @param n/a
// @return json
function looksee_ajax_scan_plugins(){
	//our response
	$xout = array(
		'success'=>false,
		'errors'=>array(),
		'data'=>array()
	);

	//only admins can do this
	if(!current_user_can('manage_options')){
		$xout['errors'][] = 'You do not have permission to scan plugin/theme vulnerabilities.';
		wp_send_json($xout);
	}

	//check the nonce
	if(!wp_verify_nonce($_POST['n'], 'looksee-scan-plugins')){
		$xout['errors'][] = 'The form had expired. Please reload the page and try again.';
		wp_send_json($xout);
	}

	if(!isset($_POST['slug']) || !strlen($_POST['slug'])){
		$xout['errors'][] = 'Invalid plugin/theme.';
		wp_send_json($xout);
	}

	if(!isset($_POST['method']) || !in_array($_POST['method'], array('plugins','themes'))){
		$xout['errors'][] = 'Invalid method.';
		wp_send_json($xout);
	}

	//is this in cache?
	$transient_key = 'looksee_' . substr($_POST['method'],0,1) . '_' . md5($_POST['slug']);
	if(false !== ($cache = get_transient($transient_key))){
		$xout['data'] = $cache;
		$xout['success'] = true;
	}
	//look it up
	else {
		$raw = wp_remote_get("https://wpvulndb.com/api/v2/plugins/{$_POST['slug']}");
		if(is_wp_error($raw))
			$xout['errors'][] = 'Lookup failed for the ' . substr($method, 0, strlen($method)-1) . ' `' . $_POST['slug'] . '`.';
		else {
			$xout['success'] = true;
			if(200 === wp_remote_retrieve_response_code($raw)){
				$body = trim(wp_remote_retrieve_body($raw));
				if(strlen($body)){
					$json = json_decode($body, true);
					if(is_array($json) && isset($json[$_POST['slug']], $json[$_POST['slug']]['vulnerabilities']) && is_array($json[$_POST['slug']]['vulnerabilities']) && count($json[$_POST['slug']]['vulnerabilities'])){
						foreach($json[$_POST['slug']]['vulnerabilities'] AS $v){
							$tmp = array(
								'title'=>$v['title'],
								'fixedIn'=>$v['fixed_in'],
								'type'=>$v['vuln_type'],
								'more'=>isset($v['references']['url']) ? (array) $v['references']['url'] : array()
							);
							$xout['data'][] = $tmp;
						}//each vuln
					}//if vuln
				}//if body
			}//if 200

			set_transient($transient_key, $xout['data'], 7200);
		}//if not error
	}//lookup

	wp_send_json($xout);
}
add_action('wp_ajax_looksee_ajax_scan_plugins', 'looksee_ajax_scan_plugins');

?>