<?php

	require_once("includes/conn.php");

	$domain_lists = $_POST;

	foreach ($domain_lists as $domain_list_name => $domains) {

		$arr_domains = explode(",", str_replace("\r\n", ",", str_replace(" ", "", trim(strtolower($domains)))));
		$sql = "
			CREATE TABLE IF NOT EXISTS $domain_list_name
			(
				id int NOT NULL AUTO_INCREMENT,
				domain varchar(255) NOT NULL,
				rank int NOT NULL,
				PRIMARY KEY (ID)
			);
		";

		$conn->query($sql);

		$sql = "";
		foreach ($arr_domains as $domain) {
			$sql = "
				INSERT INTO $domain_list_name (domain, rank)
				SELECT * FROM (SELECT '$domain', '0') AS tmp
				WHERE NOT EXISTS (
					SELECT domain FROM $domain_list_name WHERE domain = '$domain'
				) LIMIT 1;
			";
			$conn->query($sql);
		}
	}

?>