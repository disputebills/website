<?php
//---------------------------------------------------------------------
// Admin
//---------------------------------------------------------------------
// Set up menus, pages, etc



//---------------------------------------------------------------------
// Compatibility
//---------------------------------------------------------------------

//-------------------------------------------------
// Requirements Notice
//
// @param n/a
// @return n/a
function looksee_requirements_notice(){
	global $wpdb;
	$errors = array();

	$current = get_current_screen();

	//only show this to admins on relevant pages
	if(!current_user_can('manage_options') || ($current->id !== 'dashboard' && $current->id !== 'plugins' && $current->parent_base !== 'looksee-security-scanner'))
		return;

	//extensions
	$extensions = array('Core','date','filter','json','pcre','spl','standard');
	foreach($extensions AS $e){
		if(!extension_loaded($e))
			$errors[] = 'The plugin requires the PHP extension <em>' . $e . '</em>.';
	}

	//must be PHP 5.4+
	if(version_compare(PHP_VERSION, '5.4.0') < 0)
		$errors[] = 'The plugin requires PHP 5.4.0 or greater.';

	//make sure the tables exist
	if(!looksee_tables_exist())
		$errors[] = 'The Look-See database tables do not exist. Your MySQL user must have CREATE TABLES grants for this plugin to be properly installed.';

	//any errors?
	if(!is_array($errors) || !count($errors))
		return;

	?>
	<div class="notice notice-error">
		<p>Your server does not meet the minimum requirements for running <strong>Look-See Security Scanner</strong>. Things might work out anyhow, but you or your system administrator should take a look at the following:<br>
		&nbsp;&nbsp;&bullet;&nbsp;&nbsp;<?php echo implode("<br>&nbsp;&nbsp;&bullet;&nbsp;&nbsp;", $errors); ?></p>
	</div>
	<?php
}
add_action('admin_notices', 'looksee_requirements_notice');

//--------------------------------------------------
// Force deactivation if multi-site is enabled
//
// @param n/a
// @return true
function looksee_deactivate_multisite(){
	if(is_multisite()){
		require_once(ABSPATH . '/wp-admin/includes/plugin.php');
		deactivate_plugins(__FILE__);
		echo '<div class="error fade"><p><strong>Look-See Security Scanner</strong> is not compatible with WPMU and has been disabled. Sorry!</p></div>';
	}

	return true;
}
add_action('admin_init', 'looksee_deactivate_multisite');

//--------------------------------------------------------------------- end compatibility



//---------------------------------------------------------------------
// Menus
//---------------------------------------------------------------------

//--------------------------------------------------
// Admin Scripts
//
// @param n/a
// @return true
function looksee_admin_scripts(){

	//angular js
	wp_register_script(
		'angular_js',
		plugins_url('js/angular.min.js', __FILE__),
		array('jquery'),
		LOOKSEE_VERSION
	);

	//angular module for HTML
	wp_register_script(
		'angular_sanitize_js',
		plugins_url('js/angular-sanitize.min.js', __FILE__),
		array('jquery', 'angular_js'),
		LOOKSEE_VERSION
	);

	//main js
	wp_register_script(
		'looksee_js',
		plugins_url('js/core.min.js', __FILE__),
		array('angular_js', 'angular_sanitize_js'),
		LOOKSEE_VERSION
	);

	wp_enqueue_script('looksee_js');
}

//--------------------------------------------------
// Admin Styles
//
// @param n/a
// @return true
function looksee_admin_styles(){

	//main css
	wp_register_style(
		'looksee_css',
		plugins_url('css/core.min.css', __FILE__),
		array(),
		LOOKSEE_VERSION
	);

	wp_enqueue_style('looksee_css');
}

//--------------------------------------------------
// Set up pages and menus
//
// @param n/a
// @return true
function looksee_admin_menu(){

	//main link goes in tools
	$page = add_menu_page('File Scanner', 'Look-See Security Scanner', 'manage_options', 'looksee-security-scanner', 'looksee_scan_page', 'dashicons-search');
	add_action('admin_print_styles-' . $page, 'looksee_admin_styles');
	add_action('admin_print_scripts-' . $page, 'looksee_admin_scripts');

	//plugins/themes
	$page = add_submenu_page('looksee-security-scanner', 'Plugin/Theme Vulnerabilities', 'Plugin/Theme Vulnerabilities', 'manage_options', 'looksee-security-scanner-plugins', 'looksee_scan_plugins_page');
	add_action('admin_print_styles-' . $page, 'looksee_admin_styles');
	add_action('admin_print_scripts-' . $page, 'looksee_admin_scripts');

	//config/themes
	$page = add_submenu_page('looksee-security-scanner', 'Config Analysis', 'Config Analysis', 'manage_options', 'looksee-security-scanner-config', 'looksee_scan_config_page');
	add_action('admin_print_styles-' . $page, 'looksee_admin_styles');
	add_action('admin_print_scripts-' . $page, 'looksee_admin_scripts');

}
add_action('admin_menu', 'looksee_admin_menu');

//--------------------------------------------------
// The Main Scanner Page!
//
// @param n/a
// @return true
function looksee_scan_page(){
	require_once(dirname(__FILE__) . '/admin-scan.php');
	return true;
}

//--------------------------------------------------
// Plugins/Themes Scanner Page
//
// @param n/a
// @return true
function looksee_scan_plugins_page(){
	require_once(dirname(__FILE__) . '/admin-scan-plugins.php');
	return true;
}

//--------------------------------------------------
// Config Analysis Page
//
// @param n/a
// @return true
function looksee_scan_config_page(){
	require_once(dirname(__FILE__) . '/admin-scan-config.php');
	return true;
}

//--------------------------------------------------------------------- end menus

?>