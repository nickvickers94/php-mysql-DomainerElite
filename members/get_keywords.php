<?php 
	require_once("includes/conn.php");

	$list_name = $_POST["list_name"];

	$sql = "SELECT keywords FROM lists WHERE list_name = '$list_name'";

	$result = $conn->query($sql);

	if($result->num_rows > 0){
		list($keywords) = $result -> fetch_array(MYSQLI_BOTH);
	}

	$arr_keywords = explode(",", str_replace(" ", "", $keywords));

	echo(json_encode($arr_keywords));

?>