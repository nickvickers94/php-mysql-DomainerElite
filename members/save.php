<?php 
	require_once("includes/conn.php");

	$member_id = $_POST['member_id'];
	$domain = $_POST['domain'];

	$sql = "
	CREATE TABLE IF NOT EXISTS `member_domains`
	(
		member_id INT,
		domain CHAR(100)
	);
	";

	$conn->query($sql);

	$query = "INSERT INTO member_domains SET member_id = '" .$member_id. "', domain = '" .$domain. "'";
	$conn->query($query);

	echo("Saved");
?>