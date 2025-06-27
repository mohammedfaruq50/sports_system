<?php
session_start();
include 'db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['student_email'] = $email; // ✅ Corrected session variable name
            $_SESSION['student_id'] = $user['student_id']; // ✅ Stores student ID

            header("Location: student_dashboard.php");
            exit();
        }
    }

    echo "<script>alert('Invalid credentials'); window.location.href='login.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Login - Sports Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="min-width: 350px;">
      <h3 class="text-center text-success mb-3">Student Login</h3>
      <form method="POST">
        <div class="mb-3">
          <label>Email address</label>
          <input type="email" name="email" class="form-control" required placeholder="student@example.com">
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-success w-100"  name="Login">Login</button>
        <div class="mt-3 text-center">
          <a href="student_signup.php" class="text-decoration-none">Student Registration</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
