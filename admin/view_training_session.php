<?php
include 'db.php';

// Fetch all training sessions ordered by ID (ascending)
$result = $conn->query("SELECT * FROM training_sessions ORDER BY training_id ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Training</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('one.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center;">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sports Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="admin_dashboard.php">Home</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link btn btn-danger text-white px-3" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container mt-4">
  <h2 class="mb-4 text-white">Training List</h2>

  <?php if (isset($_GET['message'])): ?>
    <div class="alert alert-success"><?= htmlspecialchars($_GET['message']) ?></div>
  <?php endif; ?>

  <table class="table table-bordered table-striped align-middle bg-white">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Coach ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Location</th>
        <th>Schedule</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($session = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $session['training_id'] ?></td>
        <td><?= htmlspecialchars($session['coach_id']) ?></td>
        <td><?= htmlspecialchars($session['title']) ?></td>
        <td><?= htmlspecialchars($session['description']) ?></td>
        <td><?= htmlspecialchars($session['location']) ?></td>
        <td><?= htmlspecialchars($session['schedule']) ?></td>
        <td><?= htmlspecialchars($session['status']) ?></td>
        <td>
          <?php if ($session['status'] === 'Pending'): ?>
            <a href="update_status_training.php?id=<?= $session['training_id'] ?>&status=Approved" class="btn btn-success btn-sm">Approve</a>
            <a href="update_status_training.php?id=<?= $session['training_id'] ?>&status=Rejected" class="btn btn-danger btn-sm">Reject</a>
          <?php else: ?>
            <span class="badge bg-secondary"><?= $session['status'] ?></span>
          <?php endif; ?>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
