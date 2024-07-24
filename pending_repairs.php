<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Pending Repairs</title>
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

<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Pending Coach Repairs</h2>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
                <tr>
					<th>Coach ID</th>
					<th>Coach Type</th>
					<th>Age</th>
					<th>Color</th>
					<th>Repair Date</th>
					<th>Repair Type</th>
					<th>Schedule Type</th>
				</tr>
				</thead>
				<tbody>
					
				<?php
				include("dbconfig.php");

				$sql = "SELECT * FROM repairschedule JOIN coach ON repairschedule.coachid = coach.coachid WHERE status = 'Pending'";
				$result=$conn->query($sql);
				if($result->num_rows > 0){
				//output data of each row
				while($row=$result->fetch_assoc()){
					$curr_date = date("Y-m-d");
						if($row['date'] <= $curr_date){
						echo"
                        <tr>
						<td>$row[coachid]</td>
                        <td>$row[coachtype]</td>
                        <td>$row[age]</td>
                        <td>$row[color]</td>
                        <td>$row[date]</td>
                        <td>$row[type]</td>
                        <td>$row[schedule]</td>
					    </tr>";
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