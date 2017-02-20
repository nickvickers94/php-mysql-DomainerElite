<?php
	include 'membercontrol/auth.php';
	$id = $_SESSION['id'];
	$listing_id = $_POST['listing_id'];
	$connection = mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname);
	$domain = mysql_real_escape_string($_POST['domain']);
	$type =  mysql_real_escape_string($_POST['type']);
	$category =  mysql_real_escape_string($_POST['category']);
	$link =  mysql_real_escape_string($_POST['link']);
	$price =  mysql_real_escape_string(str_replace('$','',$_POST['price']));
	$query = "DELETE FROM marketplace_domains WHERE id='$listing_id' AND user_id='$id'";
	$result = mysql_query($query);
	if (mysql_affected_rows($connection) > 0) {
		echo json_encode(array('status' => 'success'));
		exit;
	} else {
		echo json_encode(array('status' => 'failed'));
		exit;
	}
?>