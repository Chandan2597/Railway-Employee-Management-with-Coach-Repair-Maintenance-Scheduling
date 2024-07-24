<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Repaired Coaches</title>
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
						<h2>Repaired Coaches</h2>
					</div>
					<div>
					<form action="search.php" method="GET" class="search_bar">
					<input type="text" required placeholder="search by coachid" class="search-here" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
					<button type="submit" class="btn btn-success btn-lg">Search</button>
					<style>
					.search-here {
						border: 1px solid #ccc;
						outline: none;
						background-size: 22px;
						background-position: 13px;
						border-radius: 10px;
						margin-left: 150px;
						width: 250px;
						height: 30px;
						padding: 17px;
						}
					</style>
					</form>
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
					<th>Comments</th>
				</tr>
				</thead>
				<tbody>
					
				<?php
				include("dbconfig.php");

				$sql = "SELECT * FROM repairschedule JOIN coach ON repairschedule.coachid = coach.coachid WHERE status = 'Repaired'";
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
                        <td>$row[schedule]</td>
                        <td>$row[comments]</td>
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