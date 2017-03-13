<?php 
	require_once("includes/conn.php");

	$list_name = $_POST['list_name'];

	$sql = "
		DELETE FROM `domainer_elite`.`lists` WHERE `list_name`='$list_name';
	";

	$conn->query($sql);

?>