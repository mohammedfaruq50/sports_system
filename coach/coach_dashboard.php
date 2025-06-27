<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Coach Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

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

  <div class="container mt-5">
    <h2 class="text-white">Welcome, Coach!</h2>
    <p class="text-white">Manage your training schedules and monitor student progress.</p>
    
    <div class="row mt-4">
      <div class="col-md-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Training Session</h5>
            <a href="training_session.php" class="btn btn-sm btn-warning">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Event Participent Candidate</h5>
            <a href="candidate.php" class="btn btn-sm btn-dark">View</a>
          </div>
        </div>
      </div>


 <div class="col-md-6 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Candidate Feedback</h5>
            <a href="candidate_feedback.php" class="btn btn-sm btn-dark">View</a>
          </div>
        </div>
      </div>


    </div>
  </div>

</body>
</html>
