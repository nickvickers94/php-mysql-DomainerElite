<?php
	require('includes/AvailabilityService.php');
	$service = new AvailabilityService(true);
	$domain = "arga.com";
	if(checkavailability($domain)) {
		echo($domain." is available.");
	} else {
		echo($domain." is not available.");
	}

	function checkavailability($domain) {
		global $service;
		$available = $service->isAvailable($domain);
		if ($available) {
			return true;
		} else {
			return false;
		}
	}
?>