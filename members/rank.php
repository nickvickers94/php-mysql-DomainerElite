<?php 
//phpinfo();
require_once("includes/conn.php");
$table = $_GET['table'];
$domain = $_GET['domain'];
$conn->query("UPDATE $table SET rank=rank+1 WHERE domain='$domain'");
exit;
?>