<?php 
	require_once("includes/conn.php");

	$list_name = $_POST['list_name'];

	$sql = "
		CREATE TABLE IF NOT EXISTS lists
		(
			id int NOT NULL AUTO_INCREMENT,
			list_name varchar(255) NOT NULL,
			PRIMARY KEY (ID)
		);

		INSERT INTO `domainer_elite`.`lists` (`list_name`) VALUES ('$list_name');
	";

	$conn->multi_query($sql);

?>