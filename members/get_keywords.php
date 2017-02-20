<?php 
	require_once("includes/conn.php");

	$result = $conn->query("SELECT * FROM domains LIMIT 1");

	if($result->num_rows > 0){
		$row = $result -> fetch_array(MYSQLI_BOTH);		
	}

	$list_name = $_POST["list_name"];

	$keywords = explode(",", str_replace(" ", "", $row[$list_name]));

	echo(json_encode($keywords));

?>