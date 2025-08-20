<?php

// Database connection
$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "healthdb";
$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Could not connect to the MySQL Server");
}
