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
	$query = "SELECT cproditem FROM jvzoo_transactions where ccustemail='$email'";
	$result = mysql_query($query);
	while (list($cproditem) = mysql_fetch_array($result)) {
		$query = "SELECT count(*) as count FROM members WHERE email='$email'";
		$cresult = mysql_query($query);
		list($count) = mysql_fetch_array($cresult);
		if ($count == 0) {
			$query = "INSERT INTO members SET email='$email'";
			@mysql_query($query);
		}
		if ($cproditem == '195449' || $cproditem == '199559') {
			$query = "UPDATE members SET software='Y' WHERE email='$email'";
			@mysql_query($query);
		} 
		if ($cproditem == '195453' || $cproditem == '199567') {
			$query = "UPDATE members SET webinars='Y' WHERE email='$email'";
			@mysql_query($query);
		} 	
		if ($cproditem == '195455') {
			$query = "UPDATE members SET assistance='Y' WHERE email='$email'";
			@mysql_query($query);
		}		
		
	}
	$query = "SELECT id, software, webinars, assistance FROM members WHERE email='$email' AND active='Y'";
	$result = mysql_query($query);
	list($id, $software, $webinars, $assistance) = mysql_fetch_array($result);
	if ($id) {
		$_SESSION['id'] = $id;
		$_SESSION['webinars'] = $webinars;
		$_SESSION['software'] = $software;
		$_SESSION['assistance'] = $assistance;
		echo json_encode(array('response' => 'success'));
	} else {
		echo json_encode(array('response' => 'error'));
	}
}
?>