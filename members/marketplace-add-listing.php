<?php
	include 'membercontrol/auth.php';
	$id = $_SESSION['id'];
	$connection = mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname);
	$domain = mysql_real_escape_string($_POST['domain']);
	$description = mysql_real_escape_string(strip_tags($_POST['description']));
	$type =  mysql_real_escape_string($_POST['type']);
	$category =  mysql_real_escape_string($_POST['category']);
	$link =  mysql_real_escape_string($_POST['link']);
	$price =  mysql_real_escape_string(str_replace('$','',$_POST['price']));
	if ($_SESSION['marketplace_unlimited'] != 'Y') {
		$query = "SELECT count(*) FROM marketplace_domains WHERE user_id='$id'";
		$result = mysql_query($query);
		list($count) = mysql_fetch_array($result);
		if ($count >= 3) {
			$error = "You have reached your maximum number of listings. <a href='http://www.domainerelite.com/marketplace/'>Upgrade</a> or delete existing listings.";
			echo json_encode(array('status' => 'failed', 'error' => $error));
			exit;
		}
	}
	$query = "INSERT INTO marketplace_domains SET user_id='$id', domain='$domain', description='$description', type='$type', category='$category', link='$link', price='$price', listingdate=CURDATE()";
	$result = mysql_query($query);
	if (mysql_affected_rows($connection) > 0) {
		echo json_encode(array('status' => 'success'));
		exit;
	} else {
		if (mysql_errno($connection) == '1062') {
			$error = "Domain is already listed.";
		} else {
			$error = "Your listing could not be added.";
		}
		echo json_encode(array('status' => 'failed', 'error' => $error));
		exit;
	}
?>