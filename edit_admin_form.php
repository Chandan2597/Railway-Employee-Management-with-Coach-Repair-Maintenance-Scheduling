<?php include 'auth.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profile</title>
	<script src="js/formvalidation1.js"></script>
</head>
<body>

<?php include 'manage_admin_dashboard.php' ?>

		<!-- ***************************************************************************************************************** -->
        <form action="edit_admin_profile.php" method="post" onsubmit="return formvalidation1();">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Profile</h4>
					<a href="admin_profile.php" class="btn btn-default">Cancel</a>
				</div>
                <?php
					include 'dbconfig.php';
                    $sql = "SELECT * FROM admin WHERE adminid = '$_GET[id]'";
                    $query = mysqli_query($conn,$sql);
                    $res = mysqli_fetch_array($query);
                ?>
				<div class="modal-body">					
					<div class="form-group">
						<input type='hidden' name='id' value='<?php echo $res['adminid']; ?>'>
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" name="f_name" id="fname" value="<?php echo $res['f_name']; ?>" >
					</div>
					<div class="form-group">
						<label>Middle Name</label>
						<input type="text" class="form-control" name="m_name" id="mname"  value="<?php echo $res['m_name']; ?>">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" name="l_name" id="lname" value="<?php echo $res['l_name']; ?>">
					</div>
					<div class="form-group">
						<label>Designation</label>
						<input type="text" class="form-control" name="a_designation" id="designation" value="<?php echo $res['a_designation']; ?>">
					</div>
					<div class="form-group">
						<label>DOB</label>
						<input type="date" class="form-control" name="a_dob" id="dob" value="<?php echo $res['a_dob']; ?>">
					</div>
					<div class="form-group">
						<label for="select employee">Select Gender</label>
						<select class="form-control" name="a_gender" id="gender" value="<?php echo $res['a_gender']; ?>" >
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Others">Others</option>
						</select>
					</div>
					<div class="form-group">
						<label>Date of Joining</label>
						<input type="date" class="form-control" name="a_doj" id="doj" value="<?php echo $res['a_doj']; ?>">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email" id="email"  value="<?php echo $res['email']; ?>">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" id="password" class="form-control" name="password"  value="" >
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="number" id="contact" class="form-control" name="phone" value="<?php echo $res['phone']; ?>">
					</div>										
				</div>
				<div class="modal-footer">
                <a href="admin_profile.php" class="btn btn-default">Cancel</a>
					<input type="submit" class="btn btn-success" name="edit" value="Save">
				</div>
			</form>
</body>
</html>