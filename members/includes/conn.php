<?php 
$conn= new mysqli("localhost", "domainer_elite", "Jonopo123!", "domainer_elite");

/* check connection */
if ($conn->connect_errno) {
    die($conn->connect_error);
}

?>