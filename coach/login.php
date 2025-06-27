<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM coaches WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $user = $res->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['coach_email'] = $email;
            $_SESSION['coach_id'] = $user['coach_id'];
            header("Location: coach_dashboard.php");
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
  <title>Coach Login - Sports Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-warning-subtle">

  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="min-width: 350px;">
      <h3 class="text-center text-warning mb-3">Coach Login</h3>
      <form method="POST">
        <div class="mb-3">
          <label>Email address</label>
          <input type="email" name="email" class="form-control" required placeholder="coach@example.com">
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required placeholder="Enter password">
        </div>
        <button type="submit" class="btn btn-warning w-100">Login</button>
        <div class="mt-3 text-center">
          <a href="coach_signup.php" class="text-decoration-none">Coach Registration</a>
        </div>
      </form>
    </div>
  </div>

</body>
</html>
