<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash password
    $phone = $_POST['phone'];
   // $specialization = $_POST['specialization'];

    // Handle profile image upload
    $profile_image = null;
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $tmpName = $_FILES['profile_image']['tmp_name'];
        $filename = uniqid() . '_' . basename($_FILES['profile_image']['name']);
        $targetFile = $uploadDir . $filename;
        if (move_uploaded_file($tmpName, $targetFile)) {
            $profile_image = $targetFile;
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO students (name, email, password, phone, profile_image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $phone, $profile_image);
    if ($stmt->execute()) {
        header("Location:login.php?registered=1");
        exit();
    } else {
        $error = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('one.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center;">

<div class="container mt-5" style="max-width: 600px;">
    <h2 class="mb-4 text-white">Student Registration</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="text-white">Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Full Name">
        </div>
        <div class="mb-3">
            <label class="text-white">Email address</label>
            <input type="email" name="email" class="form-control" required placeholder="coach@example.com">
        </div>
        <div class="mb-3">
            <label class="text-white">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Enter password">
        </div>
        <div class="mb-3">
            <label class="text-white">Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
        </div>
       
        <div class="mb-3">
            <label class="text-white">Profile Image</label>
            <input type="file" name="profile_image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
        <div class="mt-3 text-center">
          <a href="login.php" class="text-decoration-none">Already have an account? Login</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
