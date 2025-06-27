<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $desc = $_POST['quantity'];
  $date = $_POST['status'];
  $loc = date('Y-m-d');

  $stmt = $conn->prepare("INSERT INTO equipment (name, quantity, status, created_at) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $desc, $date, $loc);
  $stmt->execute();

  header("Location: view_equipment.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Equipment</title>
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
  <h2 class="text-white">Add Equipment</h2>
  <form method="POST">
    <div class="mb-2">
      <label class="text-white">Equipment Name</label>
      <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-2">
      <label class="text-white">Quantity</label>
      <input type="number" name="quantity" class="form-control" required/>
    </div>
    <div class="mb-2">
      <label class="text-white">Status</label>
      <input type="date" name="status" class="form-control" required>
    </div>
    
    <button class="btn btn-primary">Add Equipment</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
