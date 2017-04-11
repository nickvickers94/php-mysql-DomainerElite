<?php
	session_start();
	include 'membercontrol/settings.php';
	$id = $_POST['id'];
	$link = mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname);
	$query = "UPDATE marketplace_domains SET votes=votes+1 WHERE id='$id'";
	mysql_query($query);
	if ($_SESSION['id'] != '22') {
	$query = "INSERT INTO marketplace_domains_likes SET domain_id='$id', user_id='{$_SESSION['id']}'";
	mysql_query($query);
	}
	$query = "SELECT votes FROM marketplace_domains WHERE id='$id'";
	$result = mysql_query($query);
	list($votes) = mysql_fetch_array($result);
	echo json_encode(array('votes' => $votes));
	exit;
?>