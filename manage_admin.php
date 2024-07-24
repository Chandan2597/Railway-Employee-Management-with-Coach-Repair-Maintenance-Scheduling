
<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Manage Admin</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/dash_style.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/formvalidation1.js"></script>
<script>
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>

<body>
<?php include 'manage_admin_dashboard.php' ?>
<div class="container-xxl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage Administrator</h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Admin</span></a>					
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
					echo '<h5 class="bg-danger text-white">' . $_SESSION['notdeleted'] . '</h5>';
					unset($_SESSION['notdeleted']);
				}
				?> 
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Designation</th>
						<th>DOB</th>
						<th>Gender</th>
						<th>Date of Joining</th>
						<th>Email</th>
						<th>Phone</th>
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

				$sql="SELECT * FROM admin LIMIT {$offset},{$limit}";
				$result=$conn->query($sql);
				if($result->num_rows > 0){
					if($result->num_rows == 1){
						//output data of each row
						while($row=$result->fetch_assoc()){
						?>
							<tr>
							<td><?php echo $row['adminid']; ?></td>
							<td><?php echo $row['f_name']; ?>&nbsp;<?php echo $row['m_name']; ?><br><?php echo $row['l_name']; ?></td>
							<td><?php echo $row['a_designation']; ?></td>
							<td><?php echo $row['a_dob']; ?></td>
							<td><?php echo $row['a_gender']; ?></td>
							<td><?php echo $row['a_doj']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['phone']; ?></td>
							<td><?php echo 'Cannot delete if only one admin.'; ?></td>
						</tr>
						<?php
						}
					} else {
						//output data of each row
						while($row=$result->fetch_assoc()){
						?>
							<tr>
							<td><?php echo $row['adminid']; ?></td>
							<td><?php echo $row['f_name']; ?>&nbsp;<?php echo $row['m_name']; ?><br><?php echo $row['l_name']; ?></td>
							<td><?php echo $row['a_designation']; ?></td>
							<td><?php echo $row['a_dob']; ?></td>
							<td><?php echo $row['a_gender']; ?></td>
							<td><?php echo $row['a_doj']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['phone']; ?></td>
							<td>
								<input type="hidden" class="delete_id_value" value="<?php echo $row['adminid']; ?>">
								<a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger text-white">Delete</a>
							</td>
						</tr>
					<?php
						}
					}
				
				}else{
					echo "0 results";
				}	
				?>
			</tbody>
		</table>
			<?php
			$sql1="SELECT * FROM admin";
			$result1=mysqli_query($conn, $sql1) or die("Query Failed.");

			if(mysqli_num_rows($result1) > 0){
				$total_records = mysqli_num_rows($result1);
				
				$total_page = ceil($total_records / $limit);
			
				echo'<div class="clearfix">
				<ul class="pagination">';
				if($page > 1){
					echo '<li ><a href="manage_admin.php?page='.($page - 1).'">Previous</a></li>';
				}
				for($i=1; $i<= $total_page; $i++){
					if($i == $page){
						$active = "active";
					}else{
						$active = "";
					}
					echo'<li class="page-item '.$active.'"><a href="manage_admin.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
				}
				if($total_page > $page){
					echo '<li ><a href="manage_admin.php?page='.($page + 1).'">Next</a></li>';
				}
				echo'</ul>
				</div>';
			}
			?>
		</div>
	</div>        
</div>

<!-- Add new admin Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

		<!-- ***************************************************************************************************************** -->
			<form action="add_admin.php" method="post" onsubmit="return formvalidation1()";>
				<div class="modal-header">						
					<h4 class="modal-title">Add New Admin</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" name="f_name" id="fname">
					</div>
					<div class="form-group">
						<label>Middle Name</label>
						<input type="text" class="form-control" name="m_name">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" name="l_name" id="lname">
					</div>
					<div class="form-group">
						<label>Designation</label>
						<input type="text" class="form-control" name="a_designation" id="designation">
					</div>
					<div class="form-group">
						<label>DOB</label>
						<input type="date" class="form-control" name="a_dob" id="dob">
					</div>
					<div class="form-group">
					<label for="select employee">Select Gender</label>
						<select class="form-control" name="a_gender" id="gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Others">Others</option>
						</select>
					</div>
					<div class="form-group">
						<label>Date of Joining</label>
						<input type="date" class="form-control" name="a_doj" id="doj">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" id="email">
					</div>
                    <div class="form-group">
						<label>Password (atleast 6 characters)</label>
						<input type="password" class="form-control" name="password" id="password">
					</div>					
					<div class="form-group">
						<label>Phone (10 digit mobile number)</label>
						<input type="number" class="form-control" name="phone" id="contact">
					</div>										
				</div>
				<div class="modal-footer">
       				 <a href="manage_admin.php" class="btn btn-default">Cancel</a>
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
			url: "delete_admin.php",
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