<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Leave types</title>
</head>
<body>

<?php include 'admin_dash.php' ?>
		<!-- ***************************************************************************************************************** -->
        
		<div><form action="edit_leavetype.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Leave Types</h4>
				</div>
                <?php
                    $sql = "SELECT * FROM leavetype WHERE leaveid = '$_GET[id]'";
                    $query = mysqli_query($conn,$sql);
                    $res = mysqli_fetch_array($query);
                ?>
				<div class="modal-body">					
					<div class="form-group">
						<input type='hidden' name='id' value='<?php echo $res['leaveid']; ?>'>
					</div>
					</div>
					<div class="form-group">
						<label>Leave Type</label>
						<input type="text" class="form-control" name="leavetype" value="<?php echo $res['leavetype']; ?>" required>
					</div>
					<div class="form-group">
						<label>Description</label>
						<input type="text" class="form-control" name="description" value="<?php echo $res['description']; ?>" required>
					</div>						
				</div>
				<div class="modal-footer">
                <a href="manage_leavetype.php" class="btn btn-default">Cancel</a>
					<input type="submit" class="btn btn-success" name="edit" value="Save">
				</div>
			</form>
			</div>
</body>
</html>