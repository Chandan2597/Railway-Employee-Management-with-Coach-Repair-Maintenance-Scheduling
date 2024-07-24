<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Change Repair Status</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/dash_style.css">

<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
  
<?php include 'coach_admin_dash.php' ?>

<div class="container-xxl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Change Repair Status</h2>
					</div>
				</div>
			</div>
			<?php
				if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
					echo '<h5 class="bg-info">' . $_SESSION['success'] . '</h5>';
					unset($_SESSION['success']);
				}
				if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
					echo '<h5 class="bg-danger text-white">' . $_SESSION['status'] . '</h5>';
					unset($_SESSION['status']);
				}
				?>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Coach ID</th>
					<th>Coach Type</th>
					<th>Age</th>
					<th>Color</th>
					<th>Repair Date</th>
					<th>Repair Type</th>
					<th>Repair Status</th>
					<th>Change Status</th>
				</tr>
			</thead>
			<tbody>
			<?php
				include "dbconfig.php";
				$sql="SELECT * FROM coach join repairschedule on coach.coachid = repairschedule.coachid WHERE status='Pending'";
				$result=$conn->query($sql);
				if($result->num_rows > 0){
				//output data of each row
				while($row=$result->fetch_assoc()){
					echo"
					<tr>
					<td>$row[coachid]</td>
					<td>$row[coachtype]</td>
					<td>$row[age]</td>
					<td>$row[color]</td>
					<td>$row[date]</td>
					<td>$row[type]</td>
					<td><mark><b>$row[status]</b></mark></td>
					<td>
						<a href='edit_status_form.php?id=$row[id]' class='edit'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
					</td>
					</tr>";
					}
				}else{
					echo "0 results";
				}	
				?>
			</tbody>
			</table>
		</div>
	</div>        
</div>
</body>
</html>