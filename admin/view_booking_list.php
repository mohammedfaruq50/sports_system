<?php
include 'db.php';

// Fetch all bookings ordered by booking_id ascending
$result = $conn->query("SELECT * FROM bookings ORDER BY booking_id ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Booking</title>
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
  <h2 class="mb-4 text-white">Booking List</h2>

  <table class="table table-bordered table-striped align-middle bg-white">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Student ID</th>
        <th>Event ID</th>
        <th>Status</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['booking_id'] ?></td>
        <td><?= htmlspecialchars($row['student_id']) ?></td>
        <td><?= htmlspecialchars($row['event_id']) ?></td>
        <td><?= htmlspecialchars($row['status']) ?></td>
        <td><?= htmlspecialchars($row['booking_date']) ?></td>
        <td>
          <?php if ($row['status'] == 'pending'): ?>
            <a href="update_status.php?id=<?= $row['booking_id'] ?>&status=Approved" class="btn btn-success btn-sm">Approve</a>
            <a href="update_status.php?id=<?= $row['booking_id'] ?>&status=Rejected" class="btn btn-danger btn-sm">Reject</a>
          <?php else: ?>
            <span class="badge bg-secondary"><?= $row['status'] ?></span>
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
