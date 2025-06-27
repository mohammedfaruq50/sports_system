<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-brand">Admin Dashboard</span>
    <a href="logout.php" class="btn btn-outline-light">Logout</a>
  </nav>

  <div class="container mt-5">
    <h2 class="text-primary">Welcome, Admin!</h2>
    <p>.</p>
    
    <div class="row mt-4">
      <div class="col-md-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Manage Events</h5>
            <a href="view_events.php" class="btn btn-sm btn-primary">Go</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Manage Students</h5>
            <a href="view_student.php" class="btn btn-sm btn-success">Go</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Manage Coaches</h5>
            <a href="view_coach.php" class="btn btn-sm btn-warning">Go</a>
          </div>
        </div>
      </div>


  <div class="col-md-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Manage Booking Details</h5>
            <a href="view_booking_list.php" class="btn btn-sm btn-warning">Go</a>
          </div>
        </div>
      </div>



       <div class="col-md-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Manage Training Session</h5>
            <a href="view_training_session.php" class="btn btn-sm btn-warning">Go</a>
          </div>
        </div>
      </div>




       <div class="col-md-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Manage Equipment</h5>
            <a href="view_equipment.php" class="btn btn-sm btn-warning">Go</a>
          </div>
        </div>
      </div>



        <div class="col-md-4 mb-3">
        <div class="card shadow">
          <div class="card-body">
            <h5>Manage Court</h5>
            <a href="view_court.php" class="btn btn-sm btn-warning">Go</a>
          </div>
        </div>
      </div>


    </div>
  </div>

</body>
</html>
