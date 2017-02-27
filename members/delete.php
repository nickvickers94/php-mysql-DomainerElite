<?php 
	require_once("includes/conn.php");

	$member_id = $_POST['member_id'];
	$domain = $_POST['domain'];

	file_put_contents("delete.txt", $member_id." ".$domain);

	$sql = "DELETE FROM member_domains WHERE member_id = '" .$member_id. "' AND domain = '" .$domain. "'";
	$conn->query($sql);

	echo("Deleted");
?>