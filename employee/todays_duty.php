
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Today's Duty</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/dash_style.css">

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
                        <h4>Duty Assigned</h4>
                        <?php
                            $sql = "SELECT * FROM duty WHERE empid = '$_SESSION[empid]'";
                            $result = $conn->query($sql);
                            $count = mysqli_num_rows($result);
                            if($count > 0){
                                $row = mysqli_fetch_assoc($result);
                                echo "
                                    Duty Type- $row[dutytype] <br>
                                    Duty Shift- $row[shift] <br>
                                    From Date- $row[frm] <br>
                                    Upto Date- $row[upto] 
                                ";
                            } else {
                                echo "No duty available.";
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