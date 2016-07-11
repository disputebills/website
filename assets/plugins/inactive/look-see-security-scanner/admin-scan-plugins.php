<?php
//---------------------------------------------------------------------
// PAGE: Look-See Scan!
//---------------------------------------------------------------------



//this page is only for admins
if(!function_exists('current_user_can') || !current_user_can('manage_options'))
	die("Nobody here but us chickens.");



//before we get into it, populate some data
$xout = array(
	'ajaxurl'=>admin_url('admin-ajax.php'),
	'nonce'=>wp_create_nonce('looksee-scan-plugins'),
	'plugins'=>array(),
	'themes'=>array()
);


//let's parse plugins first
$plugins = get_plugins();
foreach($plugins AS $k=>$v){
	$tmp = array(
		'name'=>$v['Name'],
		'version'=>$v['Version'],
		'url'=>filter_var($v['PluginURI'], FILTER_VALIDATE_URL) ? $v['PluginURI'] : '',
		'slug'=>dirname($k),
		'vulnerabilities'=>array(),
		'checked'=>false
	);
	//while we're here, let's include any results that are already cached
	if(false !== ($cache = get_transient('looksee_p_' . md5($tmp['slug'])))){
		$tmp['vulnerabilities'] = $cache;
		$tmp['checked'] = true;
	}
	$xout['plugins'][] = $tmp;
}

//and themes
$themes = wp_get_themes();
foreach($themes AS $k=>$v){
	$tmp = array(
		'name'=>$v['Name'],
		'version'=>$v['Version'],
		'url'=>filter_var($v['ThemeURI'], FILTER_VALIDATE_URL) ? $v['ThemeURI'] : '',
		'slug'=>$v->template,
		'vulnerabilities'=>array(),
		'checked'=>false
	);
	//while we're here, let's include any results that are already cached
	if(false !== ($cache = get_transient('looksee_t_' . md5($tmp['slug'])))){
		$tmp['vulnerabilities'] = $cache;
		$tmp['checked'] = true;
	}
	$xout['themes'][] = $tmp;
}

?>
<script>var lookseeENV = <?php echo json_encode($xout); ?>;</script>
<div class="wrap" data-ng-cloak data-ng-app="lookseeAngular" data-ng-controller="lookseeAngularScanPlugins">

	<h1>Look-See Security Scanner: Plugin &amp; Theme Vulnerabilities</h1>

	<div class="notice notice-info">
		<p>Your installed themes and plugins are being checked against the <a href="https://wpvulndb.com/" title="WPScan Vulnerability Database" target="_blank">WPScan Vulnerability Database</a>.</p>
		<p>In many cases, the threats shown will have already been fixed by the authors (in such cases, just make sure you're up-to-date).  However you should refer to the sources provided, if any, for additional information.  And if a plugin or theme has a history of dangerous issues, you might want to uninstall it. ;)</p>
	</div>

	<div class="error fade" data-ng-repeat="error in errors"><p>{{error}}</p></div>

	<div id="poststuff">
		<div id="post-body" class="metaboxy-hoder columns-1">

			<div class="postbox-container" id="postbox-container-2">

				<div class="postbox">
					<h3 class="hndle">Plugins</h3>
					<div class="inside">

						<div data-ng-repeat="item in plugins" class="looksee-results-section plugins">
							<h4 data-version="{{item.version}}" data-ng-class='{"has-vulnerabilities" : item.checked && item.vulnerabilities.length, "is-checked" : item.checked}'>{{item.name}}</h4>

							<i class="looksee-info-icon" data-ng-class='{"is-active" : info === item.name}' data-ng-click="toggleInfo(item)" data-ng-show="item.checked && item.vulnerabilities.length"></i>

							<div class="looksee-info" data-ng-class='{"is-active" : info === item}'>
								<table class="looksee-results-table">
									<thead>
										<tr>
											<th>Title</th>
											<th>Type</th>
											<th>Fixed</th>
											<th>Resources</th>
										</tr>
									</thead>
									<tbody>
										<tr data-ng-repeat="v in item.vulnerabilities">
											<td data-label="Title:">{{v.title}}</td>
											<td data-label="Type:">{{v.type}}</td>
											<td data-label="Fixed In:">
												<span data-ng-class='{"is-fixed" : v.fixedIn && v.fixedIn < item.version}'>{{v.fixedIn}}</span>
											</td>
											<td data-label="Resources:">
												<ul data-ng-show="v.more.length">
													<li data-ng-repeat="url in v.more"><a href="{{url}}" target="_blank">{{url | hostname}}</a></li>
												</ul>
												<p data-ng-hide="v.more.length">N/A</p>
											</td>
										</tr>
									</tbody>
								</table>
							</div>

					</div><!--.inside-->
				</div><!--.postbox-->

				<div class="postbox">
					<h3 class="hndle">Themes</h3>
					<div class="inside">

						<div data-ng-repeat="item in themes" class="looksee-results-section plugins">
							<h4 data-version="{{item.version}}" data-ng-class='{"has-vulnerabilities" : item.checked && item.vulnerabilities.length, "is-checked" : item.checked}'>{{item.name}}</h4>

							<i class="looksee-info-icon" data-ng-class='{"is-active" : info === item.name}' data-ng-click="toggleInfo(item)" data-ng-show="item.checked && item.vulnerabilities.length"></i>

							<div class="looksee-info" data-ng-class='{"is-active" : info === item}'>
							Vulnerabilities go here.
							</div>

					</div><!--.inside-->
				</div><!--.postbox-->

			</div><!--#postbox-container-2-->

		</div><!--#post-body-->
	</div><!--#poststuff-->
</div><!--.wrap-->