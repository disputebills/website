<?php
//---------------------------------------------------------------------
// PAGE: Look-See Scan!
//---------------------------------------------------------------------



//this page is only for admins
if(!function_exists('current_user_can') || !current_user_can('manage_options'))
	die("Nobody here but us chickens.");

//and we have to have a proper database
looksee_require_tables_exist();

//and we need wpdb
global $wpdb;



//before we get into it, populate some data
$xout = array(
	'ajaxurl'=>admin_url('admin-ajax.php'),
	'scan'=>looksee_scan_status(),
	'nonce'=>wp_create_nonce('looksee-scan'),
	'settings'=>array(
		'skipCache'=>LOOKSEE_SKIP_CACHE,
		'skipMedia'=>LOOKSEE_SKIP_MEDIA,
		'skipSize'=> intval(LOOKSEE_SKIP_SIZE)/1024/1024,
		'onlyCore'=>LOOKSEE_ONLY_CORE,
		'action'=>'looksee_ajax_scan_settings',
		'n'=>wp_create_nonce('looksee-scan-settings'),
	)
);



?>
<script>var lookseeENV = <?php echo json_encode($xout); ?>;</script>
<div class="wrap" data-ng-cloak data-ng-app="lookseeAngular" data-ng-controller="lookseeAngularScan">

	<h1>Look-See Security Scanner: File System</h1>

	<div class="notice notice-info" data-ng-show="info === 'about'"><p>Use this page to scan for unexpected filesystem changes like modified program files, suspicious uploads, etc.</p></div>

	<div class="error fade" data-ng-repeat="error in errors"><p>{{error}}</p></div>

	<div id="poststuff">
		<div id="post-body" class="metaboxy-hoder columns-2">

			<div class="postbox-container" id="postbox-container-1">

				<!--scan settings-->
				<div class="postbox">
					<h3 class="hndle">Settings</h3>
					<div class="inside">
						<form name="settingsForm" class="looksee-settings" data-ng-submit="saveSettings()">

							<fieldset>
								<label class="checkbox"><input type="checkbox" value="1" data-ng-true-value="1" data-ng-false-value="0" data-ng-model="settings.onlyCore"> Core Only</label>

								<i class="looksee-info-icon" data-ng-class='{"is-active" : info === "onlyCore"}' data-ng-click="toggleInfo('onlyCore')"></i>

								<div class="looksee-info" data-ng-class='{"is-active" : info === "onlyCore"}'>
									When enabled, Look-See will perform a limited scan, focusing only on core WordPress files.
								</div>
							</fieldset>

							<fieldset data-ng-hide="settings.onlyCore">
								<label class="checkbox"><input type="checkbox" value="1" data-ng-true-value="1" data-ng-false-value="0" data-ng-model="settings.skipCache"> Skip Cache</label>

								<i class="looksee-info-icon" data-ng-class='{"is-active" : info === "skipCache"}' data-ng-click="toggleInfo('skipCache')"></i>

								<div class="looksee-info" data-ng-class='{"is-active" : info === "skipCache"}'>
									This option will ignore files located in <code>wp-content/cache</code>. The short-lived nature of cache makes it a little fruitless to bury attack code here, so it is usually recommended to leave this enabled. (When in doubt, you can always just clear your cache.)
								</div>
							</fieldset>

							<fieldset>
								<label class="checkbox"><input type="checkbox" value="1" data-ng-true-value="1" data-ng-false-value="0" data-ng-model="settings.skipMedia"> Skip Media</label>

								<i class="looksee-info-icon" data-ng-class='{"is-active" : info === "skipMedia"}' data-ng-click="toggleInfo('skipMedia')"></i>

								<div class="looksee-info" data-ng-class='{"is-active" : info === "skipMedia"}'>
									This option will ignore common media types such as JPEGs and MP3s. For most sites, this will dramatically speed up scans and improve readability by filtering out all those cat pictures you've been hording.
								</div>
							</fieldset>

							<fieldset data-ng-hide="settings.onlyCore">
								<label for="looksee-settings-size">Max Size</label>

								<i class="looksee-info-icon" data-ng-class='{"is-active" : info === "skipSize"}' data-ng-click="toggleInfo('skipSize')"></i>

								<input type="number" id="looksee-settings-size" data-ng-model="settings.skipSize" data-ng-trim min="0" max="50" />

								<div class="append">MB</div>

								<div class="looksee-info" data-ng-class='{"is-active" : info === "skipSize"}'>
									Most attacks are going to focus on modifying your web scripts, which are comparatively tiny text files. For performance reasons, you probably don't want to scan overly large files. The default 2MB size is probably good enough for most cases. To disable this filter, set a value of <code>0</code>.
								</div>
							</fieldset>

							<fieldset>
								<button type="submit" data-ng-disabled="isProcessing || isScanning || !canScan" class="button button-large button-primary" data-ng-class='{"is-processing" : isProcessing, "is-good" : settingsSaved}'>Save</button>
							</fieldset>

						</form>
					</div><!--.inside-->
				</div><!--.postbox-->

				<!-- About Us -->
				<div class="postbox">
					<div class="inside">
						<a href="https://blobfolio.com/donate.html" title="Blobfolio, LLC" target="_blank"><img src="<?php echo plugins_url('img/blobfolio.png', __FILE__); ?>" class="looksee-logo" alt="Blobfolio logo"></a>

						<p>We hope you find this plugin useful!  If you do, you might be interested in our other plugins, which are also completely free (and useful).</p>
						<ul>
							<li><a href="https://wordpress.org/plugins/apocalypse-meow/" target="_blank" title="Apocalypse Meow">Apocalypse Meow</a>: a simple, light-weight collection of tools to help protect wp-admin, including password strength requirements and brute-force log-in prevention.</li>
							<li><a href="https://wordpress.org/plugins/sockem-spambots/" target="_blank" title="Sock'Em SPAMbots">Sock'Em SPAMbots</a>: a more seamless approach to deflecting the vast majority of SPAM comments.</li>
						</ul>
					</div>
				</div><!--.postbox-->

			</div><!--#postbox-container-1-->

			<div class="postbox-container" id="postbox-container-2">

				<!--scan results-->
				<div class="postbox" data-ng-show="scan.status === 'Finished' && canScan">
					<h3 class="hndle">Results</h3>
					<div class="inside">

						<div data-ng-repeat="(key, item) in scan.summary" class="looksee-results-section">
							<a class="button button-small looksee-results-view" data-ng-show="item.count && key !== 'ok'" data-ng-click="getResults(key)" data-ng-disabled="isProcessing" data-ng-class='{"is-processing" : isProcessing && result === key}'>
								<span data-ng-hide="result === key">Show Files</span>
								<span data-ng-show="result === key">Hide Files</span>
							</a>

							<h4 class="{{item.level}}" data-count="{{item.count}}" data-ng-class='{"has-files" : item.count}'>{{item.name}}</h4>

							<i class="looksee-info-icon" data-ng-class='{"is-active" : info === item.name}' data-ng-click="toggleInfo(item.name)" data-ng-show="item.info"></i>

							<div class="looksee-info" data-ng-class='{"is-active" : info === item.name}'>{{item.info}}</div>

							<div class="looksee-results" data-ng-class='{"is-active" : result === key && results[key] !== undefined}'>

								<p class="description" data-ng-show="item.action">{{item.action}}</p>

								<table class="looksee-results-table">
									<thead>
										<tr>
											<th>File</th>
											<th>Type</th>
											<th>Modified</th>
											<th>Size</th>
										</tr>
									</thead>
									<tbody>
										<tr data-ng-repeat="file in results[key]">
											<td data-label="File:">
												{{file.file}}
												<span data-ng-show="file.wp && key !== 'badCore'">(Core)</span>
											</td>
											<td data-label="Type:">{{file.type}}</td>
											<td data-label="Modified:">{{file.modified}}</td>
											<td data-label="Size:">{{file.size | byteSize}}</td>
										</tr>
									</tbody>
								</table>

							</div><!--.looksee-results-->
						</div><!--.looksee-results-section-->

					</div><!--.inside-->
				</div><!--.postbox-->

				<!--new scan-->
				<div class="postbox">
					<h3 class="hndle">File Scan</h3>
					<div class="inside">

						<a class="looksee-scan-button" data-ng-click="toggleScan()" data-ng-disabled="isProcessing || isAborting || !canScan">
							<div class="progress" style="width: {{scanProgress()}}%;"></div>
							<div class="label" data-ng-show="scan.status !== 'Scanning'">Start Scan</div>
							<div class="label" data-ng-show="scan.status === 'Scanning'">Abort</div>
						</a>

						<p data-ng-show="isScanning && canScan" class="looksee-scan-status is-processing">
							<span data-ng-show="scan.files.total > 0 && !isAborting"><strong>Scanning</strong> {{scan.files.pending}} of {{scan.files.total}} remaining</span>

							<span data-ng-show="isAborting"><strong>Aborting</strong> waiting to cancel the scan</span>

							<span data-ng-show="scan.files.total === 0"><strong>Pre-Scan</strong> building a list of files to scan
						</p>

						<p data-ng-show="!isScanning && scan.status === 'Finished'" class="looksee-scan-status"><strong>{{scan.date}} Finished</strong> scanned {{scan.files.total}} in {{scan.duration | round:3}} seconds</p>

					</div><!--.inside-->
				</div><!--.postbox-->

			</div><!--#postbox-container-2-->

		</div><!--#post-body-->
	</div><!--#poststuff-->
</div><!--.wrap-->