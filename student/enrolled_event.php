<?php
session_start();
include 'db.php';




$student_id = $_SESSION['student_id'];
$success = $error = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $event_id = $_POST['event_id'];

  // Check if already applied
  $check = $conn->prepare("SELECT * FROM bookings WHERE student_id = ? AND event_id = ?");
  $check->bind_param("ii", $student_id, $event_id);
  $check->execute();
  $result = $check->get_result();

  if ($result->num_rows > 0) {
    $error = "You have already applied for this event.";
  } else {
    $stmt = $conn->prepare("INSERT INTO bookings (student_id, event_id, status) VALUES (?, ?, 'pending')");
    $stmt->bind_param("ii", $student_id, $event_id);

    if ($stmt->execute()) {
      $success = "Successfully applied for the event!";
    } else {
      $error = "Error: " . $conn->error;
    }
  }
}

// Fetch event list
$events = $conn->query("SELECT id, event_name FROM events ORDER BY event_date ASC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Apply for Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('one.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center;">


<div class="container mt-5">
  <h2 class="text-white">Apply for an Event</h2>

  <?php if ($success): ?>
    <div class="alert alert-success"><?= $success ?></div>
  <?php endif; ?>

  <?php if ($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST">
    <div class="mb-3">
      <label for="event_id" class="form-label">Select Event</label>
      <select name="event_id" id="event_id" class="form-select" required>
        <option value="">-- Select an event --</option>
        <?php while($row = $events->fetch_assoc()): ?>
          <option value="<?= $row['id'] ?>"><?= htmlspecialchars($row['event_name']) ?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <button type="submit" class="btn btn-primary">Apply</button>
  </form>
</div>

</body>
</html>
