<?php 
require_once("includes/conn.php");

$member_id = $_POST['member_id'];
$domain = $_POST['domain'];

$query = "
CREATE TABLE IF NOT EXISTS `member_domains`
(
	member_id INT,
	domain CHAR(100)
);
";

$result = $conn->query($query);

$query = "INSERT INTO member_domains SET member_id = '" .$member_id. "', domain = '" .$domain. "'";
$result = $conn->query($query);

echo("Saved");
?>