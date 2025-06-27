<?php
include 'db.php';
$id = $_GET['id'];

$conn->query("DELETE FROM training_sessions WHERE training_id = $id");
header("Location: training_session.php");
exit();
