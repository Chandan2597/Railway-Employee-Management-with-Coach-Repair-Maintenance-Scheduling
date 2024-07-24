<?php include "auth.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Assign Leave</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
<script>
	function TDate(){
	var objFromDate = document.getElementById("fromdate").value;
	var objToDate = document.getElementById("todate").value;
	
	var date1 = new Date(objFromDate);
	var date2 = new Date(objToDate);
	
	var date3 = new Date();
	var date4 = date3.getMonth() + "/" + date3.getDay() + "/" + date3.getYear();
	var currentDate = new Date(date4);
	
		if(date1 > date2)
		{
			alert("From date should be less than todate");
			return false; 
		}
		else if (new Date(objFromDate).getTime() <= date4.getTime()) {
		alert("From date must be greater than or equal to today date");
		return false;
	}
	}
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
						<h2>Assigned Leaves</h2>
					</div>
					<div class="col-sm-6">
						<a href="#addnewModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Assign New Leave</span></a>
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
				if (isset($_SESSION['added']) && $_SESSION['added'] != '') {
					echo '<h5 class="bg-info">' . $_SESSION['added'] . '</h5>';
					unset($_SESSION['added']);
				}
				if (isset($_SESSION['notadded']) && $_SESSION['notadded'] != '') {
					echo '<h5 class="bg-danger text-white">' . $_SESSION['notadded'] . '</h5>';
					unset($_SESSION['notadded']);
				}
				if (isset($_SESSION['notdeleted']) && $_SESSION['notdeleted'] != '') {
					echo '<h5 class="bg-danger text-white">' . $_SESSION['notdeleted'] . '</h5>';
					unset($_SESSION['notdeleted']);
				}
				?>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Employee ID</th>
						<th>Name</th>
						<th>Leave Type</th>
						<th>From Date</th>
						<th>To Date</th>
						<th>Description</th>
						<th>Admin Remark</th>
						<th>Assigned By</th>
						<th>Edit</th>
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

				$curr_date = date("Y-m-d");
				$sql = "SELECT * FROM leaves JOIN employee ON leaves.empid = employee.empid JOIN leavetype ON leaves.leaveid=leavetype.leaveid JOIN admin ON leaves.adminid=admin.adminid LIMIT {$offset},{$limit}";
				$result=$conn->query($sql);
				if($result->num_rows > 0){
				//output data of each row
				while($row=$result->fetch_assoc()){
					?>
						<tr>
						<td><?php echo $row['empid']; ?></td>
						<td><?php echo $row['fname']; ?>&nbsp;<?php echo $row['mname']; ?><br><?php echo $row['lname']; ?></td>
						<td><?php echo $row['leavetype']; ?></td>
						<td><?php echo $row['fromdate']; ?></td>
						<td><?php echo $row['todate']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td><?php echo $row['adminremark']; ?></td>
						<td><?php echo $row['adminid']; ?>&#8211;<?php echo $row['f_name']; ?><br><?php echo $row['m_name']; ?> <?php echo $row['l_name']; ?></td>
						<td>
						<a href='edit_leave_form.php?id=<?php echo $row['id']; ?>' class='btn btn-info text-white'>Edit</a>
						</td>
						<td>
							<input type="hidden" class="delete_id_value" value="<?php echo $row['id']; ?>">
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
			$sql1="SELECT * FROM leaves";
			$result1=mysqli_query($conn, $sql1) or die("Query Failed.");

			if(mysqli_num_rows($result1) > 0){
				$total_records = mysqli_num_rows($result1);
				
				$total_page = ceil($total_records / $limit);
			
				echo'<div class="clearfix">
				<ul class="pagination">';
				if($page > 1){
					echo '<li ><a href="assign_leave.php?page='.($page - 1).'">Previous</a></li>';
				}
				for($i=1; $i<= $total_page; $i++){
					if($i == $page){
						$active = "active";
					}else{
						$active = "";
					}
					echo'<li class="page-item '.$active.'"><a href="assign_leave.php?page='.$i.'" class="page-link">'.$i.'</a></li>';
				}
				if($total_page > $page){
					echo '<li ><a href="assign_leave.php?page='.($page + 1).'">Next</a></li>';
				}
				echo'</ul>
				</div>';
			}
			?>
		</div>
	</div>        
</div>

<!-- Add Modal HTML -->
<div id="addnewModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <!-- *********************************************************************************************** -->
<form action="insert_leave.php" method="post" onsubmit="return TDate();">
    <div class="modal-body">					
        <div class="form-group">
            <?php
                include "dbconfig.php";
                $sql="SELECT * FROM employee order by empid";
                $result=$conn->query($sql);
                if($result->num_rows > 0){
                echo"
                <label for='select employee'>Select Employee</label>
                <select class='form-control' name='empid' id='empid'>";
                while($row = $result->fetch_assoc()){
                    echo "<option value='$row[empid]'>$row[empid]-$row[fname] $row[mname] $row[lname]-$row[designation]</option>";
                }
                echo "</select>";
                }
                else{
                    echo" 0 result";
                }
            ?>
        </div>
        <div class="form-group">
            <?php
                include "dbconfig.php";
                $sql="SELECT * FROM leavetype order by leaveid";
                $result=$conn->query($sql);
                if($result->num_rows > 0){
                echo"
                <label for='select_leave'>Select Leave type</label>
                <select class='form-control' name='leaveid' id='leaveid'>";
                while($row = $result->fetch_assoc()){
                    echo "<option value='$row[leaveid]'>$row[leaveid]-$row[leavetype]-$row[description]</option>";
                }
                echo "</select>";
                }
                else{
                    echo" 0 result";
                }
            ?>
        </div>
        <div class="form-group">
            <label>From Date</label>
            <input type="date" id="fromdate" class="form-control" name="fromdate" required>
        </div>
        <div class="form-group">
            <label>To Date</label>
            <input type="date" id="todate" class="form-control" name="todate" required>
        </div>																	
        <div class="form-group">
            <label>Admin Remark</label>
            <input type="text" class="form-control" name="adminremark" required>
        </div>																																	
        <div class="form-group">
            <input type="hidden" class="form-control" name="adminid" value="<?php $_SESSION['adminid']?>">
        </div>																																	
    </div>
    <div class="modal-footer">
        <a href="assign_leave.php" value="Cancel" class="btn btn-default">Cancel</a>
        <input type="submit" class="btn btn-success" name="save" value="Submit">
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
			url: "delete_leave.php",
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