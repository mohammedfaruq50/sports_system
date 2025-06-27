<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM training_sessions WHERE training_id = $id");
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $coach_id = $_POST['coach_id'];
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $location = $_POST['location'];
  $schedule = $_POST['schedule'];
  $status = $_POST['status'];

  $stmt = $conn->prepare("UPDATE training_sessions SET coach_id=?, title=?, description=?, location=?, schedule=?, status=? WHERE training_id=?");
  $stmt->bind_param("isssssi", $coach_id, $title, $desc, $location, $schedule, $status, $id);
  $stmt->execute();

  header("Location: view_training.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Training</title>
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
  <h2 class="text-white">Edit Training Session</h2>
  <form method="POST">
    <div class="mb-2">
      <label>Coach ID</label>
      <input type="number" name="coach_id" class="form-control" value="<?= $row['coach_id'] ?>" required>
    </div>
    <div class="mb-2">
      <label>Title</label>
      <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($row['title']) ?>" required>
    </div>
    <div class="mb-2">
      <label>Description</label>
      <textarea name="description" class="form-control" required><?= htmlspecialchars($row['description']) ?></textarea>
    </div>
    <div class="mb-2">
      <label>Location</label>
      <input type="text" name="location" class="form-control" value="<?= htmlspecialchars($row['location']) ?>" required>
    </div>
    <div class="mb-2">
      <label>Schedule</label>
      <input type="datetime-local" name="schedule" class="form-control" value="<?= date('Y-m-d\TH:i', strtotime($row['schedule'])) ?>" required>
    </div>
    <div class="mb-2">
      <label>Status</label>
      <select name="status" class="form-control">
        <option value="pending" <?= $row['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
        
      </select>
    </div>
    <button class="btn btn-primary">Update Training</button>
  </form>
</div>
</body>
</html>
