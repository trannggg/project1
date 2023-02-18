<?php
$servername = "localhost";
$database = "test3";
$username = "root";
$password = "";
// Create connection
global $conn;
global $tong;
$conn = mysqli_connect($servername, $username, $password, $database);
SESSION_START();