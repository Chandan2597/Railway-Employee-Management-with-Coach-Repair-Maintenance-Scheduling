<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Change Status</title>
</head>
<body>

<?php include 'admin_dash.php' ?>

		<!-- ***************************************************************************************************************** -->
        <form action="edit_status.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Change Status</h4>
				</div>
                <?php
                    include "dbconfig.php";
                    $sql = "SELECT * FROM repairschedule WHERE id = '$_GET[id]'";
                    $query = mysqli_query($conn,$sql);
                    $res = mysqli_fetch_array($query);
                ?>
				<div class="modal-body">					
					<div class="form-group">
						<input type='hidden' name='id' value='<?php echo $res['id']; ?>'>
					</div>
                    <div class="form-group">
						<label>Comments</label>
						<input type="text" class="form-control" name="comments" value="<?php echo $res['comments']; ?>">
					</div>								
					<div class="form-group">
                    <label for="select schedule type">Status</label>
						<select class="form-control" name="status" id="status">
						<option value="Pending">Pending</option>
						<option value="Repaired">Repaired</option>
					</div>									
				</div>
				<div class="modal-footer">
                <a href="change_status.php" class="btn btn-default">Cancel</a>
					<input type="submit" class="btn btn-success" name="edit" value="Save">
				</div>
			</form>
</body>
</html>