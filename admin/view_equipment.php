<?php
include 'db.php';

// Fetch all equipment records in ascending order by ID
$stmt = mysqli_query($conn, "SELECT * FROM equipment ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Equipments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('one.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center;">

<!-- ✅ Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sports Management</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="admin_dashboard.php">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="view_events.php">Event</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link btn btn-danger text-white px-3" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- ✅ Main Content -->
<div class="container mt-4">
  <h2 class="mb-4 text-white">Equipment List</h2>

  <a href="add_equipment.php" class="btn btn-success mb-3">Add Equipment</a>

  <table class="table table-bordered table-striped bg-white">
    <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Date</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = mysqli_fetch_array($stmt)): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= htmlspecialchars($row['name']) ?></td>
          <td><?= $row['quantity'] ?></td>
          <td>
            <?php
              $status = $row['status'];
              $badgeClass = match ($status) {
                'Available' => 'success',
                'In Use' => 'primary',
                'Damaged' => 'danger',
                'Under Maintenance' => 'warning',
                default => 'secondary',
              };
            ?>
            <span class="badge bg-<?= $badgeClass ?>"><?= htmlspecialchars($status) ?></span>
          </td>
          <td><?= htmlspecialchars($row['created_at']) ?></td>
          <td>
            <a href="delete_equipment.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this equipment?')">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>

<!-- ✅ Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
