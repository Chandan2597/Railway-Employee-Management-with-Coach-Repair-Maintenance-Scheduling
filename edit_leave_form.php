<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Leave Details</title>
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

<!-- ***************************************************************************************************************** -->
<form action="edit_leave.php" method="post" onsubmit="return TDate();">
		<div class="modal-header">						
			<h4 class="modal-title">Edit Leave Details</h4>
		</div>
		<?php
			include 'dbconfig.php';
			$sql = "SELECT * FROM leaves WHERE id = '$_GET[id]'";
			$query = mysqli_query($conn,$sql);
			$result = mysqli_fetch_array($query);
		?>
		<div class="modal-body">					
			<div class="form-group">
				<input type='hidden' name='id' value='<?php echo $result['id']; ?>'>
				<label>Employee ID</label>
				<input type="text" class="form-control" name="empid" value="<?php echo $result['empid']; ?>">
			</div>
			<div class="form-group">
				<label>From Date</label>
				<input type="date" id="fromdate" class="form-control" name="fromdate" value="<?php echo $result['fromdate']; ?>" required>
			</div>
			<div class="form-group">
				<label>To Date</label>
				<input type="date" id="todate" class="form-control" name="todate" value="<?php echo $result['todate']; ?>" required>
			</div>									
			<div class="form-group">
			<?php
                include "dbconfig.php";
                $sql2="SELECT * FROM leavetype";
                $result2=$conn->query($sql2);
                if($result2->num_rows > 0){
                echo"
                <label for='select_leave'>Select Leave type</label>
                <select class='form-control' name='leaveid' id='leaveid'>";
                while($row2 = $result2->fetch_assoc()){
                    echo "<option value='$row2[leaveid]'>$row2[leaveid]-$row2[leavetype]-$row2[description]</option>";
                }
                echo "</select>";
                }
                else{
                    echo" 0 result";
                }
            ?>
			</div>																		
			<div class="form-group">
				<label>Admin Remark</label>
				<input type="text" class="form-control" name="adminremark" value="<?php echo $result['adminremark']; ?>" required>
			</div>																		
			<div class="form-group">
				<input type="hidden" class="form-control" name="adminid" value="<?php $_SESSION['adminid'] ?>">
			</div>																		
		</div>
		<div class="modal-footer">
			<a href="assign_leave.php" class="btn btn-default">Cancel</a>
			<input type="submit" class="btn btn-success" name="edit" value="Save">
		</div>
	</form>
</body>
</html>