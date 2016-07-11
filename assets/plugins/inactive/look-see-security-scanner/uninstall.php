<?php
//----------------------------------------------------------------------
// UNINSTALL
//----------------------------------------------------------------------
// remove plugin data



//make sure WordPress is calling this page
if(!defined('WP_UNINSTALL_PLUGIN'))
	exit();



//remove options
$options = array(
	'looksee_checksum_version',
	'looksee_db_version',
	'looksee_options',
	'looksee_scan'
);
foreach($options AS $o)
	delete_option($o);



//remove tables
global $wpdb;
$tables = array(
	"{$wpdb->prefix}looksee2_core",
	"{$wpdb->prefix}looksee2_files"
);
foreach($tables AS $t)
	$wpdb->query("DROP TABLE IF EXISTS `$t`");



return true;
?>