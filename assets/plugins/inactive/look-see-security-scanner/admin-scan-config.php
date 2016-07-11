<?php
//---------------------------------------------------------------------
// PAGE: Look-See Scan!
//---------------------------------------------------------------------



//this page is only for admins
if(!function_exists('current_user_can') || !current_user_can('manage_options'))
	die("Nobody here but us chickens.");



//before we get into it, populate some data
global $wpdb;
$xout = array('tests'=>array());



//-------------------------------------------------
// Security Keys

$tmp = array(
	'name'=>'Authentication keys and salts',
	'action'=>'WordPress uses eight authentication keys and salts that should be <b>unique</b> to each individual installation, making it harder for hackers to launch generic attacks. Replace the definitions in your `wp-config.php` file with the random results generated at <a href="https://api.wordpress.org/secret-key/1.1/salt/" target="_blank">https://api.wordpress.org/secret-key/1.1/salt/</a>.',
	'level'=>'warning',
	'notes'=>array()
);
foreach(array('AUTH_KEY','AUTH_SALT','LOGGED_IN_KEY','LOGGED_IN_SALT','NONCE_KEY','NONCE_SALT','SECURE_AUTH_KEY','SECURE_AUTH_SALT') AS $key){
	if(!defined($key))
		$tmp['notes'][] = "Missing: `$key`";
	elseif(strlen(constant($key)) < 35)
		$tmp['notes'][] = "Weak Key: `$key`";
}
$xout['tests'][] = $tmp;



//-------------------------------------------------
// Table Prefix

$tmp = array(
	'name'=>'Default table prefix',
	'action'=>'Changing the database table prefix from the default <code>wp_</code> to anything else will protect your site from the vast majority of SQL injection attacks. Take a look at <a href="http://www.wpbeginner.com/wp-tutorials/how-to-change-the-wordpress-database-prefix-to-improve-security/" target="_blank">http://www.wpbeginner.com/wp-tutorials/how-to-change-the-wordpress-database-prefix-to-improve-security/</a> for a helpful tutorial.',
	'level'=>'warning',
	'notes'=>array()
);
if($wpdb->prefix === 'wp_')
	$tmp['notes'][] = 'The database prefix is currently "wp_"';
$xout['tests'][] = $tmp;



//-------------------------------------------------
// Default User

$tmp = array(
	'name'=>'Default username',
	'action'=>'Almost every single brute-force login attempt presupposed the existence of a user called "admin".  You should either delete the user (and re-assign the content to a new user), or use <a href="https://wordpress.org/plugins/apocalypse-meow/" target="_blank">Apocalypse Meow</a> to rename it.',
	'level'=>'danger',
	'notes'=>array()
);
if(username_exists('admin'))
	$tmp['notes'][] = 'The username "admin" exists';
$xout['tests'][] = $tmp;



//-------------------------------------------------
// Plugin/Theme Editor

$tmp = array(
	'name'=>'Theme/Plugin Editor',
	'action'=>'You should disable the built-in theme/plugin editing capabilities of WordPress by adding the following to your `wp-config.php` file: <code>define(\'DISALLOW_FILE_EDIT\', true);</code>',
	'level'=>'warning',
	'notes'=>array()
);
if(!defined('DISALLOW_FILE_EDIT') || !DISALLOW_FILE_EDIT)
	$tmp['notes'][] = 'The theme/plugin editor is enabled';
$xout['tests'][] = $tmp;



//-------------------------------------------------
// SSL

$tmp = array(
	'name'=>'SSL logins',
	'action'=>'Without SSL protection, everything you do online is visible to anybody else who happens to be on the same network. This is of particular concern if you enjoy cafe WiFi, but it applies equally well to service offered by hotels, airlines, stadiums, etc. Indeed, bad network security abounds!  The first thing you need to do is get an SSL certificate. Many web hosts now offer them for free.  Once an SSL certificate is installed on the server, you can force the `wp-admin` area to use it by adding the following code to your `wp-config.php`: <code>FORCE_SSL_ADMIN</code>',
	'level'=>'warning',
	'notes'=>array()
);
if(!defined('FORCE_SSL_ADMIN') || !FORCE_SSL_ADMIN){
	//maybe SSL is forced some other way?
	if(is_ssl())
		$tmp['notes'][] = 'The current session uses SSL, but encryption is not forced via WordPress (just make sure it is forced via your web server, etc.)';
	else
		$tmp['notes'][] = 'Your login session does not force encryption';
}
$xout['tests'][] = $tmp;



//--------------------------------------------------
// Check for extra themes

$tmp = array(
	'name'=>'Inactive Themes',
	'action'=>'Code is very complex. Every theme you upload to your server has the potential to contain an exploitable vulnerability, even if it isn\'t active. You should permanently delete the following themes.',
	'level'=>'warning',
	'notes'=>array()
);
$current_theme = get_stylesheet_directory();
$themes = wp_get_themes();
foreach($themes AS $t){
	if($t->get_stylesheet_directory() !== $current_theme)
		$tmp['notes'][] = "Inactive: " . $t->get_stylesheet_directory();
}
$xout['tests'][] = $tmp;



//--------------------------------------------------
// Check for extra plugins

$tmp = array(
	'name'=>'Inactive Plugins',
	'action'=>'Code is very complex. Every plugin you upload to your server has the potential to contain an exploitable vulnerability, even if it isn\'t active. You should permanently delete the following plugins.',
	'level'=>'warning',
	'notes'=>array()
);
$current_plugins = get_option('active_plugins');
$plugins = get_plugins();
foreach($plugins AS $k=>$v){
	if(!in_array($k, $current_plugins))
		$tmp['notes'][] = "Inactive: " . $v["Name"];
}
$xout['tests'][] = $tmp;



//--------------------------------------------------
// phpinfo()

$tmp = array(
	'name'=>'phpinfo()',
	'action'=>'<code>phpinfo()</code> is a function that outputs everything you ever wanted to know about PHP (but were afraid to ask), including operating system, version, configuration, and extension information.  This information is useful to web developers, but it can also help hackers target attacks against your server.  It is recomended the following file(s) be removed if they are no longer needed.',
	'level'=>'warning',
	'notes'=>array()
);
foreach(glob(trailingslashit(ABSPATH) . '*.php') as $filename){
	if(false !== ($file = @file_get_contents($filename)) && preg_match('/\bphpinfo\s*\(/i', $file))
		$tmp['notes'][] = looksee_format_file($filename);
}
$xout['tests'][] = $tmp;



//--------------------------------------------------
// Backups

$tmp = array(
	'name'=>'Backup Files',
	'action'=>'Many servers get cluttered with backup files over time. The problem is such files are still publicly accessible, and worse, without a proper extension the web server will likely display the contents as plain text. Hackers routinely search for old configuration files to gather credentials, API keys, etc. These files should be deleted or moved off-site.',
	'level'=>'danger',
	'notes'=>array()
);
//perform a mini search of the web root
$dir = untrailingslashit(ABSPATH);

//first, everything
$iterator = new FilesystemIterator($dir, FilesystemIterator::CURRENT_AS_PATHNAME | FilesystemIterator::SKIP_DOTS | FilesystemIterator::UNIX_PATHS);

$iterator = new CallbackFilterIterator($iterator, function($file){
	//files
	if(is_file($file))
		return (preg_match('/\.(bac?k|old|backup|te?mp|sql)$/i', $file) || substr($file, -1) === '~');
	//directories
	else
		return (bool) preg_match('/^(backups?|old|te?mp|test|bac?k)$/i', basename($file));
});

foreach($iterator AS $file)
	$tmp['notes'][] = looksee_format_file($file) . (is_dir($file) ? '/' : '');

$xout['tests'][] = $tmp;



//--------------------------------------------------
// Directory Index

$tmp = array(
	'name'=>'Directory Index',
	'action'=>'Your server will currently return a list of the files located in a directory if there is not an "index" file present (e.g. <code>index.html</code>). This (dumb) feature is called Directory Indexing; you should disable it as it can give attackers a lot of information about your file system.',
	'level'=>'warning',
	'notes'=>array()
);
//try to load a directory we know about
$data = wp_remote_get(plugins_url('img/', __FILE__));
if(is_array($data) && isset($data['body']) && substr_count($data['body'], 'blobfolio'))
	$tmp['notes'][] = 'See e.g. ' . plugins_url('img/', __FILE__);
$xout['tests'][] = $tmp;



//--------------------------------------------------
// Apocalypse Meow

if(!in_array('apocalypse-meow/index.php', $current_plugins)){
	$tmp = array(
		'name'=>'Apocalypse Meow',
		'action'=>'Apocalypse Meow is Look-See\'s (pro-active) companion plugin.  It includes several tools to help lockdown your site and is highly recommended (and not just because we wrote it!).  Visit <a href="https://wordpress.org/plugins/apocalypse-meow/" target="_blank">https://wordpress.org/plugins/apocalypse-meow/</a> for more information.',
		'level'=>'warning',
		'notes'=>array('Apocalypse Meow is not installed')
	);
	$xout['tests'][] = $tmp;
}



//--------------------------------------------------
// Check for Updates

$tmp = array(
	'name'=>'Plugin/Theme updates',
	'action'=>'Keeping your software up-to-date is critical! Go to <a href="' . esc_url(admin_url('update-core.php')) . '">' . esc_html(admin_url('update_core.php')) . '</a> to get up to speed.',
	'level'=>'warning',
	'notes'=>array()
);
$updates = wp_get_update_data();
if($updates['counts']['total'] > 0)
	$tmp['notes'][] = "{$updates['counts']['total']} update" . ($updates['counts']['total'] === 1 ? ' is' : 's are') . ' available';
$xout['tests'][] = $tmp;



?>
<script>var lookseeENV = <?php echo json_encode($xout); ?>;</script>
<div class="wrap" data-ng-cloak data-ng-app="lookseeAngular" data-ng-controller="lookseeAngularScanConfig">

	<h1>Look-See Security Scanner: Config Analysis</h1>

	<div id="poststuff">
		<div id="post-body" class="metaboxy-hoder columns-1">

			<div class="postbox-container" id="postbox-container-2">

				<div class="postbox">
					<h3 class="hndle">Results</h3>
					<div class="inside">

						<div data-ng-repeat="item in tests" class="looksee-results-section plugins">
							<h4 data-ng-class='{"has-vulnerabilities" : item.notes.length}' class="is-checked">{{item.name}}</h4>

							<i class="looksee-info-icon" data-ng-class='{"is-active" : info === item.name}' data-ng-click="toggleInfo(item.name)" data-ng-show="item.notes.length"></i>

							<div class="looksee-info" data-ng-class='{"is-active" : info === item.name}'>
								<p class="description" data-ng-bind-html="item.action"></p>
								<ul>
									<li data-ng-repeat="note in item.notes">{{note}}</li>
								</ul>
							</div>

					</div><!--.inside-->
				</div><!--.postbox-->

			</div><!--#postbox-container-2-->

		</div><!--#post-body-->
	</div><!--#poststuff-->
</div><!--.wrap-->