var lookseeAngular = angular.module('lookseeAngular', ['ngSanitize'])

//sanitize responses
.factory('sanitizeResponse', function(){
	var genericError = 'A server error ruined the last request. :(',
		responseTemplate = {
			"success" : false,
			"data" : [],
			"errors" : [],
			"malformed" : false
		};

	//this should be a JSON object compiled by Angular
	return {
		//a generic server error message
		getGenericError: function(){
			return genericError;
		},

		//sanitize ajax response
		parse: function(response){
			var filtered = responseTemplate;

			try {
				response = response.data;

				//successful or no, we expect an object
				if(typeof response.success !== undefined)
					filtered.success = Boolean(response.success);
				else
					filtered.malformed = true;

				//errors?
				if(typeof response.errors !== undefined)
					filtered.errors = response.errors;

				//data?
				if(typeof response.data !== undefined)
					filtered.data = response.data;

				if(filtered.malformed && !filtered.errors.length)
					filtered.errors.push(genericError);
			}
			catch(e){
				filtered.malformed = true;
				filtered.success = false;
				filtered.errors = [genericError];
			}

			return filtered;
		}
	};
})

//the file scanner!
.controller('lookseeAngularScan', function($scope, $http, $window, $timeout, sanitizeResponse){

	//-------------------------------------------------
	// VARIABLES

	//form settings and data
	$scope.ajaxurl = $window.lookseeENV.ajaxurl;
	$scope.scan = $window.lookseeENV.scan;
	$scope.nonce = $window.lookseeENV.nonce;
	$scope.settings = $window.lookseeENV.settings;
	$scope.settingsSaved = false;

	//action and privilege indicators
	$scope.isProcessing = false;
	$scope.isScanning = $scope.scan.status === "Scanning";
	$scope.isAborting = false;
	$scope.canScan = true;

	//some misc session stuff
	$scope.errors = [];
	$scope.info = $scope.scan.status !== 'Finished' && !$scope.isScanning ? 'about' : '';
	$scope.scanFails = 0;

	//there can be a lot of results, so they are
	//only populated as requested
	$scope.results = {};
	$scope.result = '';



	//-------------------------------------------------
	// TOGGLE INFO
	//
	// toggle display of explanations so they don't
	// clutter the interface

	$scope.toggleInfo = function(value){
		if($scope.info === value)
			$scope.info = '';
		else
			$scope.info = value;
	};



	//-------------------------------------------------
	// SCAN PROGRESS

	$scope.scanProgress = function(){
		if($scope.scan.status !== 'Scanning' || !$scope.scan.files.total || !$scope.scan.files.scanned)
			return 0;

		return Math.round($scope.scan.files.scanned / $scope.scan.files.total * 100000) / 1000;
	};



	//-------------------------------------------------
	// SAVE SETTINGS

	$scope.saveSettings = function(){
		//don't double-run
		if($scope.isProcessing || $scope.isScanning)
			return false;

		$scope.isProcessing = true;
		$scope.errors = [];

		$http.post($scope.ajaxurl, $scope.settings)
		.then(
			//200
			function(r){
				//clean response
				r = sanitizeResponse.parse(r);

				//success
				if(r.success){
					//unset conflicting options for onlyCore
					if($scope.settings.onlyCore){
						$scope.settings.skipSize = 0;
						$scope.settings.skipCache = 0;
					}

					//add a flicker effect so the user knows something happened
					$scope.settingsSaved = true;
					$timeout(function(){ $scope.settingsSaved = false; }, 1000);
				}
				else
					$scope.errors = r.errors;

				$scope.isProcessing = false;
			},
			//server error
			function(r){
				$scope.errors.push(sanitizeResponse.getGenericError());
				$scope.isProcessing = false;
			}
		);
	};



	//-------------------------------------------------
	// START/STOP SCAN

	$scope.toggleScan = function(){
		//can't do anything while processing
		if($scope.isProcessing)
			return false;

		//abort?
		if($scope.isScanning)
			$scope.isAborting = true;
		//start scan!
		else
			$scope.runScan();
	};



	//-------------------------------------------------
	// SCAN

	$scope.runScan = function(){

		var scanRetries = 2;

		if(!$scope.canScan)
			return false;

		//aborting?
		if($scope.isAborting || $scope.scanFails === scanRetries){
			$scope.isAborting = true;

			$http.post($scope.ajaxurl, {"action" : "looksee_ajax_scan_abort", "n" : $scope.nonce})
			.then(
				//200
				function(r){
					$scope.errors = [];

					//clean response
					r = sanitizeResponse.parse(r);

					//success
					if(r.success){
						$scope.scan = r.data;

						if($scope.scanFails === scanRetries)
							$scope.errors.push('The server returned consecutive errors so the scan was aborted.');
						else
							$scope.errors.push('The scan was aborted.');
					}
					//error
					else{
						$scope.errors = r.errors;
						$scope.canScan = false;
					}

					$scope.isScanning = false;
					$scope.isAborting = false;
					$scope.scanFails = 0;

					return true;
				},
				//server error
				function(r){
					$scope.errors = [sanitizeResponse.getGenericError()];
					$scope.isScanning = false;
					$scope.isAborting = false;
					$scope.scanFails = 0;
					$scope.canScan = false;

					return true;
				}
			);

			return true;
		}

		var data = {
			"action" : "looksee_ajax_scan",
			"n" : $scope.nonce
		};

		//new scan
		if(!$scope.isScanning){
			data.start = 1;
			$scope.isScanning = true;
			$scope.scanFails = 0;
			$scope.scan.files.total = 0;
			$scope.scan.files.pending = 0;
			$scope.scan.files.scanned = 0;
		}

		//scan!
		$http.post($scope.ajaxurl, data)
		.then(
			function(r){
				$scope.errors = [];

				//clean response
				r = sanitizeResponse.parse(r);

				try {
					//if the file count hasn't changed, we want to treat this as an error
					if(!r.malformed && (typeof r.data.files === undefined || r.data.files.pending === $scope.scan.files.pending))
						r.success = false;
				} catch(e) {
					r.success = false;
				}

				//success
				if(r.success){
					$scope.scanFails = 0;
					$scope.scan = r.data;

					//can't have a false status
					if(!$scope.scan.status || !$scope.scan.files.total){
						$scope.isScanning = false;
						return true;
					}

					//are we finished?
					if($scope.scan.status === 'Finished'){
						$scope.isScanning = false;
						$scope.results = {};
						$scope.result = '';
						return true;
					}
				}
				//error
				else {
					//it is bad if the prescan fails
					if(data.start){
						$scope.errors = r.errors;
						$scope.errors.push('The pre-scan could not complete.');
						$scope.isScanning = false;
						return false;
					}

					//controlled errors are bad as they indicate
					//something like an authentication problem
					if(!r.malformed){
						$scope.errors = r.errors;
						$scope.isScanning = false;
						$scope.scanFails = 0;
						$scope.canScan = false;
						return false;
					}

					//for anything else, we can just increase our
					//loop variable and push on
					$scope.scanFails++;
					$scope.errors.push('The last request met with an error. The scan is entering a Safe Mode that might help.');
				}

				//rerun the scan
				return $scope.runScan();
			},
			function(r){
				$scope.errors = [];

				//can't really do anything if prescan failed
				if(data.start){
					$scope.errors.push('The pre-scan could not complete.');
					$scope.isScanning = false;
					return false;
				}

				//server errors we'll ignore for a little while
				$scope.scanFails++;
				$scope.errors.push('The last request met with an error. The scan is entering a Safe Mode that might help.');
				return $scope.runScan();
			}
		);
	};



	//-------------------------------------------------
	// GET RESULTS

	$scope.getResults = function(key){

		if($scope.isProcessing || !$scope.scan.summary[key].count)
			return false;

		//toggle off?
		if($scope.result === key){
			$scope.result = '';
			return true;
		}

		$scope.result = key;

		//already pulled?
		if($scope.results[key] !== undefined)
			return true;

		$scope.isProcessing = true;

		$http.post($scope.ajaxurl, {"action" : "looksee_ajax_scan_results", "n" : $scope.nonce, "status" : key})
		.then(
			function(r){
				$scope.errors = [];

				//clean response
				r = sanitizeResponse.parse(r);

				//success
				if(r.success)
					$scope.results[key] = r.data;
				//error
				else {
					$scope.errors = r.errors;
					$scope.result = '';
				}

				$scope.isProcessing = false;
			},
			function(r){
				$scope.errors = [];
				$scope.errors.push(sanitizeResponse.getGenericError());
				$scope.result = '';
				$scope.isProcessing = false;
			}
		);
	};



	//-------------------------------------------------
	// RESUME A SCAN ALREADY IN PROGRESS

	$timeout(function(){
		if($scope.isScanning)
			return $scope.runScan();
	});

})

//the plugin/theme scanner!
.controller('lookseeAngularScanPlugins', function($scope, $http, $window, $timeout, sanitizeResponse){

	//-------------------------------------------------
	// VARIABLES

	//form settings and data
	$scope.ajaxurl = $window.lookseeENV.ajaxurl;
	$scope.nonce = $window.lookseeENV.nonce;
	$scope.plugins = $window.lookseeENV.plugins;
	$scope.themes = $window.lookseeENV.themes;

	//action and privilege indicators
	$scope.isProcessing = true;

	//some misc session stuff
	$scope.errors = [];
	$scope.info = '';



	//-------------------------------------------------
	// TOGGLE INFO
	//
	// toggle display of explanations so they don't
	// clutter the interface

	$scope.toggleInfo = function(value){
		if($scope.info === value)
			$scope.info = '';
		else
			$scope.info = value;
	};



	//-------------------------------------------------
	// CHECK FOR VULNERABILITIES

	$scope.getVulnerabilities = function(item, type){
		//don't double-run
		if(item.checked)
			return false;

		var data = {
			"action" : "looksee_ajax_scan_plugins",
			"n" : $scope.nonce,
			"slug" : item.slug,
			"method" : type
		};

		$http.post($scope.ajaxurl, data)
		.then(
			//success
			function(r){
				$scope.errors = [];

				//clean response
				r = sanitizeResponse.parse(r);

				//success
				if(r.success){
					item.checked = true;
					item.vulnerabilities = r.data;
				}
				else
					$scope.errors = r.errors;
			},
			//error
			function(r){
				$scope.errors.push(sanitizeResponse.getGenericError());
			}
		);
	};



	//-------------------------------------------------
	// CHECK IT ALL

	$timeout(function(){
		//stagger these a bit so we don't run into trouble
		//with flood-protection or anything
		var timeout = -1500;
		angular.forEach($scope.plugins, function(v,k){
			if(!v.checked && !$scope.errors.length){
				timeout += 1500;
				$timeout(function(){
					$scope.getVulnerabilities($scope.plugins[k], 'plugins');
				}, timeout);
			}
		});
		angular.forEach($scope.themes, function(v,k){
			if(!v.checked && !$scope.errors.length){
				timeout += 1500;
				$timeout(function(){
					$scope.getVulnerabilities($scope.themes[k], 'themes');
				}, timeout);
			}
		});
	});

})

//configuration analysis
.controller('lookseeAngularScanConfig', function($scope, $window, $sanitize){

	//-------------------------------------------------
	// VARIABLES

	//form settings and data
	$scope.tests = $window.lookseeENV.tests;
	$scope.info = '';



	//-------------------------------------------------
	// TOGGLE INFO
	//
	// toggle display of explanations so they don't
	// clutter the interface

	$scope.toggleInfo = function(value){
		if($scope.info === value)
			$scope.info = '';
		else
			$scope.info = value;
	};
})

//a nice rounding function
.filter('round', function($filter){
	return function(num, places){
		if(isNaN(num) || isNaN(places) || places < 0)
			return num;
		return +num.toFixed(places);
	};
})

//url hostname
.filter('hostname', function($filter){
	return function(url){
		var tmp = document.createElement('a');
		tmp.href = url;
		return tmp.hostname || url;
	};
})

//pretty byte units
.filter('byteSize', function($filter){
	return function(size){
		if(isNaN(size))
			return size;

		//bytes
		if(size < 1024)
			return size + 'B';
		//kilobytes
		else if(size < 1024 * 1024)
			return +(size / 1024).toFixed(1) + 'KB';
		//megabytes
		else if(size < 1024 * 1024 * 1024)
			return +(size / 1024 / 1024).toFixed(1) + 'MB';
		//gigabytes
		else
			return +(size / 1024 / 1024 / 1024).toFixed(1) + 'GB';
	};
})

//angularjs sends JSON data by default, but we want more typical querystring
.config(function($httpProvider){
	//update data
	$httpProvider.defaults.transformRequest = function(data){
		if(data === undefined){ return data; }
		return jQuery.param(data);
	};

	//set content-type
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
});