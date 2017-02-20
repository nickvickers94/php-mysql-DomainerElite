<?php
	include 'membercontrol/auth.php';
	$link = mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname);
	$firstname = mysql_real_escape_string($_POST['firstname']);
	$lastname = mysql_real_escape_string($_POST['lastname']);
	$about = mysql_real_escape_string($_POST['about']);
	$contactemail = mysql_real_escape_string($_POST['contactemail']);
	$website = mysql_real_escape_string($_POST['website']);
	$facebook = mysql_real_escape_string($_POST['facebook']);
	$twitter = mysql_real_escape_string($_POST['twitter']);
	$id = $_SESSION['id'];
	$query = "UPDATE members SET firstname='$firstname', lastname='$lastname', about='$about', contactemail='$contactemail', website='$website', facebook='$facebook', twitter='$twitter' WHERE id='$id'";
	$result = mysql_query($query);
	if (mysql_affected_rows($link) > 0) {
		echo json_encode(array('status' => 'success'));
		exit;
	} else {
		echo json_encode(array('status' => 'failed', 'query' => $query));
		exit;
	}
?>