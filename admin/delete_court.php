<?php
include 'db.php';
$id = $_GET['id'];

$conn->query("DELETE FROM courts WHERE id=$id");
header("Location: view_court.php");
exit();
?>