<?php
include 'db.php';
$id = $_GET['id'];

$conn->query("DELETE FROM equipment WHERE id=$id");
header("Location: view_equipment.php");
exit();
?>