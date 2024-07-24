<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Duty Shift</title>
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
        <form action="edit_duty.php" method="post" onsubmit="return TDate();">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Duty Shift</h4>
				</div>
                <?php
                    include 'dbconfig.php';
                    $sql = "SELECT * FROM duty WHERE id = '$_GET[id]'";
                    $query = mysqli_query($conn,$sql);
                    $res = mysqli_fetch_array($query);
                ?>
				<div class="modal-body">					
					<div class="form-group">
						<input type='hidden' name='id' value='<?php echo $res['id']; ?>'>
						<label>Employee ID</label>
						<input type="number" class="form-control" name="empid" value="<?php echo $res['empid']; ?>">
					</div>
					<div class="form-group">
						<label>Duty Shift</label>
						<select class="form-control" name="shift" id="shift" value="<?php echo $res['shift']; ?>" required>
						<option value="morning">Morning</option>
						<option value="evening">Evening</option>
						<option value="night">Night</option>
					</select>
					</div>
					<div class="form-group">
						<label>Duty Type</label>
						<select class="form-control" name="dutytype" id="dutytype" value="<?php echo $res['dutytype']; ?>" required>
						<option value="uppergear">Uppergear</option>
						<option value="undergear">UnderGear</option>
						<option value="seekline">Seekline</option>
					</select>
					</div>
					<div class="form-group">
						<label>From Date</label>
						<input type="date" id="fromdate" class="form-control" name="frm" value="<?php echo $res['frm']; ?>" required>
					</div>
					<div class="form-group">
						<label>Upto date</label>
						<input type="date" id="todate" class="form-control" name="upto" value="<?php echo $res['upto']; ?>" required>
					</div>										
					<div class="form-group">
						<input type="hidden" class="form-control" name="adminid" value="<?php echo $res['adminid']; ?>">
					</div>										
				</div>
				<div class="modal-footer">
                <a href="manage_duty.php" class="btn btn-default">Cancel</a>
					<input type="submit" id="submit" class="btn btn-success" name="edit" value="Save">
				</div>
			</form>
</body>
</html>