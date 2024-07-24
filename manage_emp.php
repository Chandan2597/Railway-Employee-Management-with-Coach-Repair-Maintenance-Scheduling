<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Manage Employees</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/dash_style.css">
<script src="js/formvalidation.js"></script>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
  
<?php include 'admin_dash.php' ?>

<div class="container-xxl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage Employees</h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
						<div>
						<form action="search_emp.php" method="GET" class="search_bar">
					<input type="text" required placeholder="EmployeeID or Name" class="search-here" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
					<button type="submit" class="btn btn-success btn-lg">Search</button>
					<style>
					.search-here {
						border: 1px solid #ccc;
						outline: none;
						background-size: 22px;
						background-position: 13px;
						border-radius: 10px;
						margin-left: 100px;
						width: 250px;
						height: 30px;
						padding: 17px;
						}
						button{
							border-radius;
						}
					</style>
					</form>
						</div>
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
				if (isset($_SESSION['deleted']) && $_SESSION['deleted'] != '') {
					echo '<h5 class="bg-info">' . $_SESSION['deleted'] . '</h5>';
					unset($_SESSION['deleted']);
				}
				if (isset($_SESSION['notdeleted']) && $_SESSION['notdeleted'] != '') {
					echo '<h5 class="bg-info">' . $_SESSION['notdeleted'] . '</h5>';
					unset($_SESSION['notdeleted']);
				}
				?>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Employee ID</th>
					<th>Name</th>
					<th>Designation</th>
					<th>DOB</th>
					<th>Gender</th>
					<th>Date of Joining</th>
					<th>Blood Group</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Address</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				
			<?php
				include "dbconfig.php";
				
				$limit=10;
				
				if(isset($_GET['page'])){
					$page= $_GET['page'];
				}else{
					$page= 1;
				}
				$offset = ($page - 1) * $limit;

				$sql="SELECT * FROM employee LIMIT {$offset},{$limit}";
				$result=$conn->query($sql);
				if($result->num_rows > 0){
				//output data of each row
				while($row=$result->fetch_assoc()){
					?>
					<tr>
					<td><?php echo $row['empid']; ?></td>
					<td><?php echo $row['fname']; ?>&nbsp;<?php echo $row['mname']; ?><br><?php echo $row['lname']; ?></td>
					<td><?php echo $row['designation']; ?></td>
					<td><?php echo $row['dob']; ?></td>
					<td><?php echo $row['gender']; ?></td>
					<td><?php echo $row['doj']; ?></td>
					<td><?php echo $row['bgroup']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['contact']; ?></td>
					<td><?php echo $row['address']; ?><br><?php echo $row['district']; ?>&#x2c;<?php echo $row['state']; ?><br><?php echo $row['country']; ?>&#x2c;<?php echo $row['pin']; ?></td>
					<td>
						<input type="hidden" class="delete_id_value" value="<?php echo $row['empid']; ?>">
						<a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger text-white">Delete</a>
					</td>
				</tr>
				<?php
				}
				}else{
					echo "0 results";
				}	
				?>
			</tbody>
			</table>

			<?php
			$sql1="SELECT * FROM employee";
			$result1=mysqli_query($conn, $sql1) or die("Query Failed.");

			if(mysqli_num_rows($result1) > 0){
				$total_records = mysqli_num_rows($result1);
				
				$total_page = ceil($total_records / $limit);
			
				echo'<div class="clearfix">
				<ul class="pagination">';
				if($page > 1){
					echo '<li ><a href="manage_emp.php?page='.($page - 1).'">Previous</a></li>';
				}
				for($i=1; $i<= $total_page; $i++){
					if($i == $page){
						$active = "active";
					}else{
						$active = "";
					}
					echo'<li class="page-item '.$active.'"><a href="manage_emp.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
				}
				if($total_page > $page){
					echo '<li ><a href="manage_emp.php?page='.($page + 1).'">Next</a></li>';
				}
				echo'</ul>
				</div>';
			}
			?>
		</div>
	</div>        
</div>

<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
		<!-- *********************************************************************************************** -->
			<form action="add_emp.php" method="post" onsubmit="return formvalidation();">
				<div class="modal-header">						
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Employee ID</label>
						<input type="text" class="form-control" name="empid" id="empid">
					</div>
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" name="fname" id="fname">
					</div>
					<div class="form-group">
						<label>Middle Name</label>
						<input type="text" class="form-control" name="mname" id="mname">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" name="lname" id="lname">
					</div>
					<div class="form-group">
						<label>Designation</label>
						<input type="text" class="form-control" name="designation" id="designation">
					</div>
					<div class="form-group">
						<label>DOB</label>
						<input type="date" class="form-control" name="dob" id="dob">
					</div>
					<div class="form-group">
					<label for="select employee">Select Gender</label>
						<select class="form-control" name="gender" id="gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Others">Others</option>
						</select>
					</div>
					<div class="form-group">
						<label>Date of Joining</label>
						<input type="date" class="form-control" name="doj" id="doj">
					</div>
					<div class="form-group">
						<label>Blood Group</label>
						<input type="text" class="form-control" name="bgroup" id="bgroup">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" id="email">
					</div>
					<div class="form-group">
						<label>Password (minimum 6 characters)</label>
						<input type="password" class="form-control" name="password" id="password">
					</div>
					<div class="form-group">
						<label>Confirm password</label>
						<input type="password" class="form-control" name="cpassword" id="cpassword">
					</div>
					<div class="form-group">
						<label>Phone (10 digit Mobile number)</label>
						<input type="number" class="form-control" name="contact" id="contact">
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="address" id="address">
					</div>					
					<div class="form-group">
						<label>PIN code</label>
						<input type="number" class="form-control" name="pin" id="pin">
					</div>					
					<div class="form-group">
						<label>District</label>
						<input type="text" class="form-control" name="district" id="district">
					</div>					
					<div class="form-group">
						<label>State</label>
						<input type="text" class="form-control" name="state" id="state">
					</div>					
					<div class="form-group">
						<label>Country</label>
						<input type="text" class="form-control" name="country" id="country">
					</div>										
				</div>
				<div class="modal-footer">
					<a href="manage_emp.php" class="btn btn-default">Cancel</a>
					<input type="submit" class="btn btn-success" name="add" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
</body>
<script>
	$(document).ready(function(){
	$('.delete_btn_ajax').click(function(e){
		e.preventDefault();
		var deleteid = $(this).closest("tr").find('.delete_id_value').val();
		// console.log(deleteid);
		swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover this data!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
		})
		.then((willDelete) => {
		if (willDelete) {
			$.ajax({
			type: "POST",
			url: "delete_emp.php",
			data: {
				"delete_btn_set": 1,
				"delete_id": deleteid,
			},
			success: function(response){
				swal("Data deleted successfully!",{
				icon: "success",
				}).then((result) => {
				location.reload();
				});
			}
			});
		}
		});
	});
	});
    </script>
</html>