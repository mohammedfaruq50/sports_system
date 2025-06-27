<?php
include 'db.php';
$result = $conn->query("SELECT * FROM training_sessions");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Training Sessions</title>
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
  <h2 class="text-white">Training Sessions</h2>
  <a href="add_training.php" class="btn btn-success mb-3">Add Training</a>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Coach ID</th>
        <th>Title</th>
        <th>Schedule</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['training_id'] ?></td>
          <td><?= htmlspecialchars($row['coach_id']) ?></td>
          <td><?= htmlspecialchars($row['title']) ?></td>
          <td><?= date('d M Y, H:i', strtotime($row['schedule'])) ?></td>
          <td>
            <?php if($row['status'] == 'active'): ?>
              <span class="badge bg-success">Active</span>
            <?php else: ?>
              <span class="badge bg-secondary"><?= ucfirst(htmlspecialchars($row['status'])) ?></span>
            <?php endif; ?>
          </td>
          <td>
            <a href="edit_training.php?id=<?= $row['training_id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete_training.php?id=<?= $row['training_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this session?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
