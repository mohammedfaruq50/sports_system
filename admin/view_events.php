<?php
include 'db.php';

// Sanitize and whitelist sort parameters
$allowedSorts = ['id', 'event_name', 'event_date', 'location'];
$allowedOrders = ['ASC', 'DESC'];

// Get sort & order from URL or use defaults
$sort = $_GET['sort'] ?? 'id';
$order = strtoupper($_GET['order'] ?? 'ASC');

// Validate values
$sort = in_array($sort, $allowedSorts) ? $sort : 'id';
$order = in_array($order, $allowedOrders) ? $order : 'ASC';

// Search input
$search = $_GET['search'] ?? '';
$searchParam = "%$search%";

// Prepare and execute query
$stmt = $conn->prepare("SELECT * FROM events WHERE event_name LIKE ? ORDER BY $sort $order");
$stmt->bind_param("s", $searchParam);
$stmt->execute();
$result = $stmt->get_result();
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
  <h2 class="mb-4 text-white">Event List</h2>

  <form method="GET" class="row mb-3">
    <div class="col-md-4">
      <input type="text" name="search" class="form-control" placeholder="Search by event name..." value="<?= htmlspecialchars($search) ?>">
    </div>
    <div class="col-md-2">
      <button class="btn btn-primary">Search</button>
    </div>
    <div class="col-md-2">
      <a href="view_events.php" class="btn btn-secondary">Reset</a>
    </div>
  </form>

  <a href="add_event.php" class="btn btn-success mb-3">Add Event</a>

  <table class="table table-bordered bg-white">
    <thead>
      <tr>
        <th><a href="?sort=id&order=<?= $sort == 'id' && $order == 'ASC' ? 'DESC' : 'ASC' ?>">ID</a></th>
        <th><a href="?sort=event_name&order=<?= $sort == 'event_name' && $order == 'ASC' ? 'DESC' : 'ASC' ?>">Name</a></th>
        <th><a href="?sort=event_date&order=<?= $sort == 'event_date' && $order == 'ASC' ? 'DESC' : 'ASC' ?>">Date</a></th>
        <th><a href="?sort=location&order=<?= $sort == 'location' && $order == 'ASC' ? 'DESC' : 'ASC' ?>">Location</a></th>
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
            <a href="edit_event.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete_event.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this event?')">Delete</a>
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
