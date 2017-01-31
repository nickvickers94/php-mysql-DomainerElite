<?php
session_start();
include 'settings.php';
if ($_POST['email']) {
	if ($_SESSION['id']) {
		$id = $_SESSION['id'];
	}
	$email = $_POST['email'];
	$link = mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname);
	$query = "SELECT id, software, webinars, assistance FROM members WHERE email='$email' AND active='Y'";
	$result = mysql_query($query);
	list($id, $software, $webinars, $assistance) = mysql_fetch_array($result);
	if ($id) {
		$_SESSION['id'] = $id;
		$_SESSION['webinars'] = $webinars;
		$_SESSION['software'] = $software;
		$_SESSION['assistance'] = $assistance;
	}
}

if (!isset($_SESSION['id'])) {
	if (!preg_match('/login|logout|forget-password/', $_SERVER['PHP_SELF'])) {
		$_SESSION['uri'] = $_SERVER['REQUEST_URI'];
		header("Location: $baseuri" . "login.php");
		exit(0);
	}
} else {
	$link = mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname);
	$query = "SELECT id, software, webinars, assistance FROM members WHERE id='{$_SESSION['id']}' AND active='Y'";
	$result = mysql_query($query);
	list($id, $software, $webinars, $assistance) = mysql_fetch_array($result);
	if ($id) {
		$_SESSION['id'] = $id;
		$_SESSION['webinars'] = $webinars;
		$_SESSION['software'] = $software;
		$_SESSION['assistance'] = $assistance;
	}
}
?>
