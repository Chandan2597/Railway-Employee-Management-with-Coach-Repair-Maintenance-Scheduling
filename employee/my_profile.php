
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>My Profile</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/dash_style.css">
<script src="js/formvalidation.js"></script>

</head>
<body>
<?php include 'sidebar.php' ?>
			<div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card shadow" style='width: 100%;'>
                        <div class="card-body">
                        <h4>My Profile</h4>
                        <?php
                        if (isset($_SESSION['success']) && $_SESSION['success'] != '') {
                            echo '<h5 class="bg-info">' . $_SESSION['success'] . '</h5>';
                            unset($_SESSION['success']);
                        }
                        if (isset($_SESSION['msg1']) && $_SESSION['msg1'] != '') {
                            echo '<h5 class="bg-danger text-white">' . $_SESSION['msg1'] . '</h5>';
                            unset($_SESSION['msg1']);
                        }
                        ?>  
                        <?php
                            $sql = "SELECT * FROM employee WHERE empid = '$_SESSION[empid]'";
                            $result = $conn->query($sql);
                            $count = mysqli_num_rows($result);
                            if($count > 0){
                                $row = mysqli_fetch_assoc($result);
                                echo "
                                    Employee ID -$row[empid]<br>
                                    Name - $row[fname] $row[mname] $row[lname]<br>
                                    Designation - $row[designation]<br>
                                    Date of Birth - $row[dob]<br>
                                    Gender - $row[gender]<br>
                                    Date of Joining - $row[doj]<br>
                                    Blood group - $row[bgroup]<br>
                                    Email - $row[email]<br>
                                    Contact - $row[contact]<br>
                                    Address - $row[address]<br>
                                    District - $row[district]<br>
                                    State - $row[state]<br>
                                    Country - $row[country]<br>
                                    PIN - $row[pin]<br><br>
                                    <a href='edit_profile_form.php?id=$row[empid]' class='btn btn-primary'>Edit Profile</a>
                                ";
                            } else {
                                echo "Cannot show profile due to some error!! please contact administrator";
                            }
                        ?>
					</div>
				</div>
			</div>                
		</div>
	</div>      
</div>
</body>
</html>