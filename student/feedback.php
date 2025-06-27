<?php
include 'db.php';

// Join feedback with students to get student names
$sql = "SELECT f.feedback_id, f.message, f.rating, f.created_at, s.student_id, s.name AS student_name, f.coach_id 
        FROM feedback f
        JOIN students s ON f.student_id = s.student_id
        ORDER BY f.feedback_id DESC";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('one.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center;">

<nav class="navbar navbar-expand-lg navbar-success bg-success">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Sports Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link text-white" href="student_dashboard.php">Home</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link btn btn-danger text-white px-3" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <a href="add_feedback.php" class="btn btn-success mb-3">Add Feedback</a>
  <h2 class="mb-4 text-white">Feedback List</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Student Name (ID)</th>
        <th>Coach ID</th>
        <th>Message</th>
        <th>Rating</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['feedback_id'] ?></td>
        <td><?= htmlspecialchars($row['student_name']) ?> (<?= $row['student_id'] ?>)</td>
        <td><?= $row['coach_id'] ?></td>
        <td><?= htmlspecialchars($row['message']) ?></td>
        <td><?= $row['rating'] ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
