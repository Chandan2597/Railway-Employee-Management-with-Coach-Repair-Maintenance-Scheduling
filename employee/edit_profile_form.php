<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profile</title>
	<script src="js/formvalidation.js"></script>
</head>
<body>
<?php include 'sidebar.php' ?>
		<!-- ***************************************************************************************************************** -->
        <form action="edit_profile.php" method="post" onsubmit="return formvalidation();">
				<div class="modal-header">						
					<h4 class="modal-title">Edit Profile</h4>
					<a href="my_profile.php" class="btn btn-default">Cancel</a>
				</div>
                <?php
                    $sql = "SELECT * FROM employee WHERE empid = '$_GET[id]'";
                    $query = mysqli_query($conn,$sql);
                    $res = mysqli_fetch_array($query);
                ?>
				<div class="modal-body">					
					<div class="form-group">
						<input type='hidden' name='id' value='<?php echo $res['empid']; ?>'>
						<label>Employee ID</label>
						<input type="text" class="form-control" id="empid" name="empid" value="<?php echo $res['empid']; ?>" >
					</div>
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" name="fname" id="fname" value="<?php echo $res['fname']; ?>"  >
					</div>
					<div class="form-group">
						<label>Middle Name</label>
						<input type="text" class="form-control" name="mname" id="mname" value="<?php echo $res['mname']; ?>">
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" name="lname" id="lname" value="<?php echo $res['lname']; ?>" >
					</div>
					<div class="form-group">
						<label>Designation</label>
						<input type="text" class="form-control" name="designation" id="designation"  value="<?php echo $res['designation']; ?>" >
					</div>
					<div class="form-group">
						<label>DOB</label>
						<input type="date" id="dob" class="form-control" id="dob" name="dob" value="<?php echo $res['dob']; ?>" >
					</div>
					<div class="form-group">
						<label for="select employee">Select Gender</label>
						<select class="form-control" name="gender" id="gender" value="<?php echo $res['gender']; ?>">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Others">Others</option>
						</select>
					</div>
					<div class="form-group">
						<label>Date of Joining</label>
						<input type="date" class="form-control" name="doj" id="doj" value="<?php echo $res['doj']; ?>" >
					</div>
					<div class="form-group">
						<label>Blood Group</label>
						<input type="text" class="form-control" name="bgroup" id="bgroup" value="<?php echo $res['bgroup']; ?>" >
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" name="email"  value="<?php echo $res['email']; ?>" >
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" id="password" class="form-control" id="password" name="password"  value="" >
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="number" id="contact" class="form-control" name="contact" value="<?php echo $res['contact']; ?>" >
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="address" id="address" value="<?php echo $res['address']; ?>" >
					</div>					
					<div class="form-group">
						<label>PIN code</label>
						<input type="number" id="pin" class="form-control" name="pin"  value="<?php echo $res['pin']; ?>" >
					</div>					
					<div class="form-group">
						<label>District</label>
						<input type="text" class="form-control" id="district" name="district" value="<?php echo $res['district']; ?>" >
					</div>					
					<div class="form-group">
						<label>State</label>
						<input type="text" class="form-control" id="state" name="state" value="<?php echo $res['state']; ?>" >
					</div>					
					<div class="form-group">
						<label>Country</label>
						<input type="text" class="form-control" id="country" name="country"  value="<?php echo $res['country']; ?>" >
					</div>								
				</div>
				<div class="modal-footer">
                <a href="my_profile.php" class="btn btn-default">Cancel</a>
					<input type="submit" class="btn btn-success" name="edit" value="Save">
				</div>
			</form>
</body>
</html>