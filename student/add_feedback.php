<?php
session_start();
include 'db.php';
$student_id = $_SESSION['student_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id1 = $_POST['student_id'];
    $coach_id = $_POST['coach_id'];
    $message = $_POST['message'];
    $rating = $_POST['rating'];

    // Insert query
    $sql = "INSERT INTO feedback (student_id, coach_id, message, rating)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisi", $student_id1, $coach_id, $message, $rating);

    if ($stmt->execute()) {
        header("Location: feedback.php"); // redirect to feedback list page
        exit();
    } else {
        $error = "Error inserting feedback: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Feedback</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Dark overlay behind the form for readability */
      body {
        background: url('one.jpeg') no-repeat center center fixed;
        background-size: cover;
        position: relative;
        min-height: 100vh;
      }
      body::before {
        content: "";
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.7); /* dark overlay */
        z-index: 0;
      }

      /* Put form content above the overlay */
      .container {
        position: relative;
        z-index: 1;
      }

      label {
        color: white;
      }

      input.form-control,
      textarea.form-control {
        color: white !important;
        background-color: #222 !important; /* solid dark background */
        border: 1px solid #555 !important;
        padding: 10px;
        border-radius: 5px;
      }

      input.form-control::placeholder,
      textarea.form-control::placeholder {
        color: #bbb !important;
      }

      /* Optional: make the navbar more opaque for readability */
      .navbar.bg-dark {
        background-color: rgba(0, 0, 0, 0.85) !important;
      }
    </style>
</head>
<body>

<!-- Navbar -->
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

<div class="container mt-5">
    <h2 class="text-white mb-4">Add Feedback</h2>

    <?php if (!empty($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST" autocomplete="off">
        <div class="mb-3">
            <label for="student_id" class="form-label">Student ID</label>
            <input type="number" class="form-control" value="<?php echo htmlspecialchars($student_id); ?>" name="student_id" id="student_id" required readonly>
        </div>
        <div class="mb-3">
            <label for="coach_id" class="form-label">Coach ID</label>
            <input type="number" class="form-control" name="coach_id" id="coach_id" required placeholder="Enter Coach ID">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Feedback Message</label>
            <textarea class="form-control" name="message" id="message" rows="4" required placeholder="Write your feedback here..."></textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating (1 to 5)</label>
            <input type="number" class="form-control" name="rating" id="rating" min="1" max="5" required placeholder="Rate 1 to 5">
        </div>
        <button type="submit" class="btn btn-success">Submit Feedback</button>
        <a href="view_feedback.php" class="btn btn-secondary ms-2">Back</a>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
