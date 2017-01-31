<?
	session_start();
	include 'settings.php';
	unset($_SESSION['id']);
	unset($_SESSION['software']);
	unset($_SESSION['webinars']);
	unset($_SESSION['uri']);
	header("Location: ../logout.php");
	exit;
?>