<?php 
	require_once("includes/conn.php");

	$list_name = $_POST['list_name'];
	$new_list_name = $_POST['new_list_name'];

	$sql = "
		UPDATE `domainer_elite`.`lists` SET `list_name`='$new_list_name' WHERE `list_name`='$list_name';
	";

	$conn->query($sql);

?>