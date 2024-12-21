<?php
// Database connection file (db.php)
$host = "localhost";
$user = "root";
$password = "";
$database = "Lab_5b";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>