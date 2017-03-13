<?php 
	require_once("includes/conn.php");

	$list_name = $_POST['list_name'];
	$new_list_name = $_POST['new_list_name'];
	$new_keywords = $_POST['new_keywords'];

	$sql = "
		UPDATE `domainer_elite`.`lists` SET `list_name`='$new_list_name', `keywords`='$new_keywords' WHERE `list_name`='$list_name';
	";

	$conn->query($sql);

?>