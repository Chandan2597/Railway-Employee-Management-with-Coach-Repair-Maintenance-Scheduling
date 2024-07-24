<?php include "auth.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Coach Details</title>
</head>
<body>

<?php include 'coach_admin_dash.php' ?>

		<!-- ***************************************************************************************************************** -->
      	  <form action="edit_coach.php" method="post">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Coach Details</h4>
					<a href="manage_coach.php" class="btn btn-default">Cancel</a>
				</div>
                <?php
                    $sql = "SELECT * FROM coach WHERE coachid='$_GET[id]'";
                    $query = mysqli_query($conn,$sql);
                    $res = mysqli_fetch_array($query);
                ?>
				<div class="modal-body">					
					<div class="form-group">
						<input type='hidden' name='id' value="<?php echo $res['coachid']; ?>">
						<label>Coach ID</label>
						<input type="number" class="form-control" name="coachid" value="<?php echo $res['coachid']; ?>" required>
					</div>
					<div class="form-group">
						<label>Coach Age</label>
						<input type="text" class="form-control" name="age" value="<?php echo $res['age']; ?>"  required>
					</div>
					<div class="form-group">
						<label>Coach Type</label>
						<input type="text" class="form-control" name="coachtype"  value="<?php echo $res['coachtype']; ?>" required>
					</div>
					<div class="form-group">
						<label>Color</label>
						<input type="text" class="form-control" name="color"  value="<?php echo $res['color']; ?>" required>
					</div>							
				</div>
				<div class="modal-footer">
               		<a href="manage_coach.php" class="btn btn-default">Cancel</a>
					<input type="submit" class="btn btn-success" name="edit" value="Save">
				</div>
			</form>
</body>
</html>