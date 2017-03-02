<?php

	require_once("includes/conn.php");

	$lists = $_POST;

	$sql = "";

	foreach ($lists as $list_name => $keywords) {
		$sql .= "UPDATE `domainer_elite`.`lists` SET keywords = '$keywords' WHERE list_name = '$list_name';";
	}

	$conn->multi_query($sql);
	
?>