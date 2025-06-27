<?php
// db.php
$host = "localhost";
$user = "root";
$pass = "faruq01";
$dbname = "sports_management";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
