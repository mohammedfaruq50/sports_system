<?php
include 'db.php';

// Fetch all coaches in ascending order by ID
$result = $conn->query("SELECT * FROM training_sessions ORDER BY training_id ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Training Session</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('one.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center;">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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

<!-- Main Content -->
<div class="container mt-4">
  <h2 class="mb-4 text-white">Training Session List</h2>
  
  <table class="table table-bordered table-striped align-middle bg-white">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Profile</th>
        <th>Coach ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Location</th>
        <th>Schedule</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($coach = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $coach['training_id'] ?></td>
        <td>
          <?php if ($coach['image'] && file_exists($coach['image'])): ?>
            <img src="../student/<?= htmlspecialchars($coach['image']) ?>" alt="Profile" style="width:50px; height:50px; object-fit:cover; border-radius:50%;">
          <?php else: ?>
            <span class="text-muted">No Image</span>
          <?php endif; ?>
        </td>
        <td><?= htmlspecialchars($coach['coach_id']) ?></td>
        <td><?= htmlspecialchars($coach['title']) ?></td>
        <td><?= htmlspecialchars($coach['description']) ?></td>
        <td><?= htmlspecialchars($coach['location']) ?></td>
        <td><?= htmlspecialchars($coach['schedule']) ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
