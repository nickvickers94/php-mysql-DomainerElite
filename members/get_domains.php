<?php

	require_once("includes/conn.php");

	$domain_list_name = $_POST["domain_list_name"];

	$sql = "SELECT domain FROM $domain_list_name ORDER BY rank DESC";

	$result = $conn->query($sql);

	while (list($domain) = mysqli_fetch_array($result)) {
		$domains[] = $domain;
	}

	echo(json_encode($domains));

?>