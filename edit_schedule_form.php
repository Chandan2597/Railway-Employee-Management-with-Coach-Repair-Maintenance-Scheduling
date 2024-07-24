<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Repair Schedule</title>
<script>
	function TDate() {
		var UserDate = document.getElementById("date").value;
		var ToDate = new Date();
		var date1 = ToDate.getMonth() + "/" + ToDate.getDay() + "/" + ToDate.getYear();
		if (new Date(UserDate).getTime() < date1.getTime()) {
			alert("The Date must be greater or equal to today date");
			return false;
		}
	}
</script>
</head>
<body>

<?php include 'coach_admin_dash.php' ?>

		<!-- ***************************************************************************************************************** -->
        <form action="edit_schedule.php" method="post" onsubmit="return TDate();">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Repair Schedule/Change Status</h4>
				</div>
                <?php
                    include("dbconfig.php");
                    $sql = "SELECT * FROM repairschedule WHERE id = '$_GET[id]'";
                    $query = mysqli_query($conn,$sql);
                    $res = mysqli_fetch_array($query);
                ?>
				<div class="modal-body">					
					<div class="form-group">
						<input type='hidden' name='id' value='<?php echo $res['id']; ?>'>
						<label>Coach ID</label>
						<input type="text" class="form-control" name="coachid" value="<?php echo $res['coachid']; ?>" required>
					</div>
					<div class="form-group">
						<label>Schedule Date</label>
						<input type="date" class="form-control" id="date" name="date" value="<?php echo $res['date']; ?>" required>
					</div>
					<div class="form-group">
                        <label for="select schedule type">Select Schedule Type</label>
						<select class="form-control" name="schedule" id="schedule">
						<option value="monthly">Monthly</option>
						<option value="6 months">6 Month</option>
						<option value="18 months">18 Months</option>
						</select>
					</div>
					<div class="form-group">
						<label>Repair type</label>
						<input type="text" class="form-control" name="type" value="<?php echo $res['type']; ?>" required>
					</div>
					<div class="form-group">
						<input type="hidden" class="form-control" name="adminid" value="<?php $_SESSION['adminid'] ?>" required>
					</div>
				<div class="modal-footer">
                <a href="schedule_repair.php" class="btn btn-default">Cancel</a>
					<input type="submit" class="btn btn-success" name="edit" value="Save">
				</div>
			</form>
</body>
</html>