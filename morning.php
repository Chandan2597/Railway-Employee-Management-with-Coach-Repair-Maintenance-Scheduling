<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Morning Duty Shift</title>
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
  
<?php include 'admin_dash.php' ?>

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Morning Duty</h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Designation</th>
						<th>Gender</th>
						<th>Duty Shift</th>
						<th>Duty Type</th>
					</tr>
				</thead>
				<tbody>
					
				<?php
				include("dbconfig.php");

				$sql = "SELECT * FROM duty JOIN employee ON duty.empid = employee.empid WHERE shift = 'morning'";
				$result=$conn->query($sql);
				if($result->num_rows > 0){
				//output data of each row
				while($row=$result->fetch_assoc()){
					$curr_date = date("Y-m-d");
					// $next_date = new DateTime();
					// $next_date = $next_date->modify("+1 days")->format('Y-m-d');
					// if($row['date'] == $curr_date || $row['date'] == $next_date){
						if($row['frm'] <= $curr_date && $row['upto'] >= $curr_date){
						echo"
						<tr>
						<td>$row[empid]</td>
						<td>$row[fname] $row[mname] $row[lname]</td>
						<td>$row[designation]</td>
						<td>$row[gender]</td>
						<td>$row[shift]</td>
						<td>$row[dutytype]</td>
					</tr>";
					} else {
						// echo "0 results";
					}
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