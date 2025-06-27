<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['court_name'];
  $desc = $_POST['location'];
  $fdate = $_POST['available_from'];
  $tdate = $_POST['available_to'];
 $Available="Available";
 // $loc = date('Y-m-d');

  $stmt = $conn->prepare("INSERT INTO courts (court_name, location, available_from, available_to,status) VALUES (?, ?, ?, ?,?)");
  $stmt->bind_param("sssss", $name, $desc, $fdate, $tdate,$Available);
  $stmt->execute();

  header("Location: view_court.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Court</title>
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
  <h2 class="text-white">Add Court</h2>
  <form method="POST">
    <div class="mb-2">
      <label class="text-white">Name</label>
      <input type="text" name="court_name" class="form-control" required>
    </div>
    <div class="mb-2">
      <label class="text-white">Location</label>
      <input type="text" name="location" class="form-control" required/>
    </div>
    <div class="mb-2">
      <label class="text-white">From Date</label>
      <input type="date" name="available_from" class="form-control" required>
    </div>

     <div class="mb-2">
      <label class="text-white">From To</label>
      <input type="date" name="available_to" class="form-control" required>
    </div>
    
    <button class="btn btn-primary">Add Court</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
