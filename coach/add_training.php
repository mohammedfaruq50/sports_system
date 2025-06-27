<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $coach_id = $_POST['coach_id'];
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $location = $_POST['location'];
  $schedule = $_POST['schedule'];
  $status = $_POST['status'];
  $image = ''; // Optional file handling

  $stmt = $conn->prepare("INSERT INTO training_sessions (coach_id, title, description, location, schedule, image, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("issssss", $coach_id, $title, $desc, $location, $schedule, $image, $status);
  $stmt->execute();
  
  // ✅ Fixed redirect (correct spelling)
  header("Location: training_session.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Training Session</title>
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
  <h2 class="text-white">Add Training Session</h2>
  <form method="POST">
    <div class="mb-2">
      <label class="text-white">Coach ID</label>
      <input type="number" name="coach_id" class="form-control" required>
    </div>
    <div class="mb-2">
      <label class="text-white">Title</label>
      <input type="text" name="title" class="form-control" required>
    </div>
    <div class="mb-2">
      <label class="text-white">Description</label>
      <textarea name="description" class="form-control" required></textarea>
    </div>
    <div class="mb-2">
      <label class="text-white">Location</label>
      <input type="text" name="location" class="form-control" required>
    </div>
    <div class="mb-2">
      <label class="text-white">Schedule</label>
      <input type="datetime-local" name="schedule" class="form-control" required>
    </div>
    <div class="mb-2">
      <label class="text-white">Status</label>
     <select name="status" class="form-control">
      <option value="Pending">Pending</option>
      <option value="Approved">Approved</option>
      <option value="Rejected">Rejected</option>
    </select>

    </div>
    <button class="btn btn-primary">Add Training</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
