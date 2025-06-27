<?php
session_start();

if (!isset($_SESSION['coach_id'])) {
    // Coach not logged in, redirect to login page or show error
    header("Location: login.php");
    exit();
}

include 'db.php';
$id = $_SESSION['coach_id'];

// Now safe to use $id
$sql = "SELECT f.feedback_id, f.message, f.rating, f.created_at, s.student_id, s.name AS student_name 
        FROM feedback f
        JOIN students s ON f.student_id = s.student_id
        WHERE f.coach_id = ?
        ORDER BY f.created_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Feedback</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body style="background-image: url('one.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sports Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="coach_dashboard.php">Home</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link btn btn-danger text-white px-3" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <h2 class="text-white">Feedback</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Message</th>
        <th>Rating</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['feedback_id'] ?></td>
          <td><?= htmlspecialchars($row['student_name']) ?> (ID: <?= $row['student_id'] ?>)</td>
          <td><?= htmlspecialchars($row['message']) ?></td>
          <td><?= $row['rating'] ?></td>
          <td><?= $row['created_at'] ?></td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
