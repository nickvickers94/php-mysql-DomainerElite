<?php
include 'includes/conn.php';
require('includes/AvailabilityService.php');
$service = new AvailabilityService(true);
$result = $conn->query("SELECT expired_domains FROM domains LIMIT 1");
if($result->num_rows>0){
	$row = $result->fetch_array(MYSQLI_BOTH);
	$expired_domains = explode(",",$row['expired_domains']);
	$jamies_domains = explode(",",$row['jamies_domains']);
	$dictionary_domains = explode(",",$row['dictionary_domains']);
	foreach ($expired_domains as $ed) {
		$ed = trim($ed);
		if(checkavailability($ed)) {
			$available_domains[] = $ed;
		} else {
			$conn->query("DELETE FROM `domainer_elite`.`expired_domains` WHERE `domain`='$ed'");
		}
	}	
	$expired_domains = implode(",\n",$available_domains);
	$conn->query("UPDATE `domainer_elite`.`domains` SET `expired_domains`='$expired_domains', `date` = NOW() WHERE `domains`.`id` = 1");	
	$available_domains = array();
	foreach ($jamies_domains as $ed) {
		$ed = trim($ed);
		if(checkavailability($ed)) {
			$available_domains[] = $ed;
		} else {
			$conn->query("DELETE FROM `domainer_elite`.`jamies_domains` WHERE `domain`='$ed'");
		}
	}	
	$jamies_domains = implode(",\n",$available_domains);
	$conn->query("UPDATE `domainer_elite`.`domains` SET `jamies_domains`='$jamies_domains', `date` = NOW() WHERE `domains`.`id` = 1");
	$available_domains = array();
	foreach ($dictionary_domains as $ed) {
		$ed = trim($ed);
		if(checkavailability($ed)) {
			$available_domains[] = $ed;
		} else {
			$conn->query("DELETE FROM `domainer_elite`.`dictionary_domains` WHERE `domain`='$ed'");
		}
	}	
	$dictionary_domains = implode(",\n",$available_domains);
	$conn->query("UPDATE `domainer_elite`.`domains` SET `dictionary_domains`='$dictionary_domains', `date` = NOW() WHERE `domains`.`id` = 1");
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
		
