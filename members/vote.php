<?php 

	require_once("includes/conn.php");

	$table = $_POST['table'];
	$domain = $_POST['domain'];

	$sql = "UPDATE $table SET rank=rank+1 WHERE domain='$domain'";
	$conn->query($sql);

	echo("Voted");
?>