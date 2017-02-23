<?php
	include 'includes/conn.php';
	require('includes/AvailabilityService.php');
	$service = new AvailabilityService(true);
	$ed = "loginloans.com";
	if(checkavailability($ed)) {
		echo($ed);
	} else {
		echo "not available";
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