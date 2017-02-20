<?php

	require_once("includes/conn.php");

	$sql = "DESCRIBE domains";
	$result = $conn->query($sql);

	$fields = array();

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			if ($row["Field"] != "id" && $row["Field"] != "date") {
				array_push($fields, $row["Field"]);
			}
		}
	} else {
		echo "0 results";
	}

	echo(json_encode($fields));

?>