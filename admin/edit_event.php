<?php
include 'db.php';
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['event_name'];
  $desc = $_POST['description'];
  $date = $_POST['event_date'];
  $loc = $_POST['location'];

  $stmt = $conn->prepare("UPDATE events SET event_name=?, description=?, event_date=?, location=? WHERE id=?");
  $stmt->bind_param("ssssi", $name, $desc, $date, $loc, $id);
  $stmt->execute();

  header("Location: view_events.php");
  exit();
}

$result = $conn->query("SELECT * FROM events WHERE id=$id");
$event = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Event</title>
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
  <h2 class="text-white">Edit Event</h2>
  <form method="POST">
    <div class="mb-2">
      <label class="text-white">Event Name</label>
      <input type="text" name="event_name" class="form-control" value="<?= $event['event_name'] ?>" required>
    </div>
    <div class="mb-2">
      <label class="text-white">Description</label>
      <textarea name="description" class="form-control" required><?= $event['description'] ?></textarea>
    </div>
    <div class="mb-2">
      <label class="text-white">Date</label>
      <input type="date" name="event_date" class="form-control" value="<?= $event['event_date'] ?>" required>
    </div>
    <div class="mb-2">
      <label class="text-white">Location</label>
      <input type="text" name="location" class="form-control" value="<?= $event['location'] ?>" required>
    </div>
    <button class="btn btn-primary">Update Event</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
