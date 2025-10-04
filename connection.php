<?php
$server   = "localhost";
$username = "root";
$password = "";
$database = "comsoc_inventory";

// create connection
$dbconn = mysqli_connect($server, $username, $password, $database);

// check connection
if (!$dbconn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>