

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Assigned Leaves</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
</head>
<body>
<?php include 'sidebar.php' ?>
			<div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card shadow" style='width: 100%;'>
                        <div class="card-body">
                        <h4>Leave Assigned</h4>
                        <?php
                            $sql = "SELECT * FROM leaves JOIN leavetype WHERE leaves.leaveid=leavetype.leaveid AND empid = '$_SESSION[empid]'";
                            $result = $conn->query($sql);
                            $count = mysqli_num_rows($result);
                            if($count > 0){
                                $row = mysqli_fetch_assoc($result);
                                echo "
                                    Leave Type- $row[leavetype] <br>
                                    Description- $row[description] <br>
                                    From Date- $row[fromdate] <br>
                                    Upto Date- $row[todate]<br>
                                    Admin Remark- $row[adminremark] 
                                ";
                            } else {
                                echo "Leave not assigned yet.";
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