<?php
include 'db.php';

// Sorting logic
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
$order = isset($_GET['order']) && strtolower($_GET['order']) === 'desc' ? 'DESC' : 'ASC';

$allowed_columns = ['id', 'event_name', 'event_date', 'location'];
if (!in_array($sort, $allowed_columns)) {
    $sort = 'id';
}

$sql = "SELECT * FROM events ORDER BY $sort $order";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Events</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('one.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center;">


<!-- ✅ Navbar -->
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

<!-- ✅ Main Content -->
<div class="container mt-4">
  <h2 class="mb-4 text-white">Event List</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><a href="?sort=id&order=<?= $sort == 'id' && $order == 'ASC' ? 'desc' : 'asc' ?>">ID</a></th>
        <th><a href="?sort=event_name&order=<?= $sort == 'event_name' && $order == 'ASC' ? 'desc' : 'asc' ?>">Name</a></th>
        <th><a href="?sort=event_date&order=<?= $sort == 'event_date' && $order == 'ASC' ? 'desc' : 'asc' ?>">Date</a></th>
        <th><a href="?sort=location&order=<?= $sort == 'location' && $order == 'ASC' ? 'desc' : 'asc' ?>">Location</a></th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['event_name']) ?></td>
        <td><?= $row['event_date'] ?></td>
        <td><?= htmlspecialchars($row['location']) ?></td>
        <td>
          <a href="enrolled_event.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Apply</a>
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
