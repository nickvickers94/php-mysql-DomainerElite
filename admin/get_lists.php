<?php

	require_once("includes/conn.php");

	$sql = "SELECT list_name FROM lists";
	$result = $conn->query($sql);

	while (list($list_name) = mysqli_fetch_array($result)) {
		$lists[] = $list_name;
	}

	echo(json_encode($lists));

?>