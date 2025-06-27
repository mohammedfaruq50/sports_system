<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $admin = $res->fetch_assoc();
       
            $_SESSION['admin_email'] = $email;
            header("Location: admin_dashboard.php");
            exit();
         
    }

    echo "<script>alert('Invalid credentials'); window.location.href='login.php';</script>";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login - Sports Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="min-width: 350px;">
      <h3 class="text-center text-primary mb-3">Admin Login</h3>
      <form method="POST">
        <div class="mb-3">
          <label>Email address</label>
          <input type="email" name="email" class="form-control" required placeholder="admin@example.com">
        </div>
        <div class="mb-3">
          <label >Password</label>
          <input type="password" name="password" class="form-control" required placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
        <div class="mt-3 text-center">
          <a href="../index.html" class="text-decoration-none">← Back to Home</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
