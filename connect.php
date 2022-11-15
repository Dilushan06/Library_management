<?php

$dbserver = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "library_database";

$conn = mysqli_connect($dbserver,$dbuser,$dbpass,$dbname) or die("Unable to connect");

echo"Connected";


?>