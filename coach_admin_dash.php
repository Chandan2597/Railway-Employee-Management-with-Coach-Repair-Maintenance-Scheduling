
<!DOCTYPE html>
<html lang="en">
  <head>
  	<title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<h1><a href="#" class="logo"><ion-icon name="train"></ion-icon></a></h1>
        <ul class="list-unstyled components mb-5">
          <li>
              <a href="dashboard2.php"><span class="fa fa-tachometer"></span>Dashboard</a>
          </li>
          <li>
              <a href="manage_coach.php"><span class="fa fa-train"></span>Manage Train Coach</a>
          </li>
          <li>
            <a href="schedule_repair.php"><span class="fa fa-calendar-check-o"></span>Schedule Repair</a>
          </li>
          <li>
              <a href="todays_task.php"><span class="fa fa-tasks"></span>Today's Tasks</a>
          </li>
          <li>
              <a href="change_status.php"><span class="fa fa-check"></span>Change Repair status</a>
          </li>
          <li>
              <a href="pending_repairs.php"><span class="fa fa-calendar-times-o"></span>Pending Repairs</a>
          </li>
          <li>
              <a href="repaired_coach.php"><span class="fa fa-print"></span>Coach repair Details</a>
          </li>
        </ul>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard1.php"><b>Employee Management</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="dashboard2.php"><b>Coach Scheduling</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin_profile.php"><b>Manage Admin</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><b>Logout</b></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>