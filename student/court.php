<?php
include 'db.php';

// Fetch all courts ordered by id ascending
$result = $conn->query("SELECT * FROM courts ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Court Details</title>
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
  <h2 class="mb-4 text-white">Court List</h2>

  <table class="table table-bordered table-striped align-middle">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Location</th>
        <th>From Date</th>
        <th>To Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($court = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $court['id'] ?></td>
        <td><?= htmlspecialchars($court['court_name']) ?></td>
        <td><?= htmlspecialchars($court['location']) ?></td>
        <td><?= htmlspecialchars($court['available_from']) ?></td>
        <td><?= htmlspecialchars($court['available_to']) ?></td>
        <td><?= htmlspecialchars($court['status']) ?></td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
