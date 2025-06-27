<?php
session_start();
 




$student_id = $_SESSION['student_id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('one.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center;">


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
    <h2 class="text-white">Welcome, <?php  echo $student_id; ?>!</h2>
    <p class="text-white">View upcoming events, training sessions, and performance metrics.</p>
    
    <div class="row mt-4">
      <div class="col-md-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Events</h5>
            <a href="event_list.php" class="btn btn-sm btn-success">Check</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Training Sessions</h5>
            <a href="training_session.php" class="btn btn-sm btn-info">Check</a>
          </div>
        </div>
      </div>


      <div class="col-md-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Equipments</h5>
            <a href="equipments.php" class="btn btn-sm btn-info">Check</a>
          </div>
        </div>
      </div>


       <div class="col-md-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Coach </h5>
            <a href="coach_list.php" class="btn btn-sm btn-info">Check</a>
          </div>
        </div>
      </div>



      <div class="col-md-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Feedback </h5>
            <a href="feedback.php" class="btn btn-sm btn-info">Apply</a>
          </div>
        </div>
      </div>


      <div class="col-md-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Court </h5>
            <a href="court.php" class="btn btn-sm btn-info">Check</a>
          </div>
        </div>
      </div>



    </div>
  </div>

</body>
</html>
