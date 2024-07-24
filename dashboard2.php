<?php include 'auth.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Dashboard</title>
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
<?php include 'coach_admin_dash.php' ?>
<div class="container">
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
                <div class="card-body">
                    <div class="mr-8" style="text-align: center; font-size: 20px;">Total Train coaches
                    <h1 style="text-align: center; font-size: 60px;">
                    <?php
                        $sql="Select count(coachid) from coach";
                        $query_run= mysqli_query($conn,$sql); 
                        while($data = mysqli_fetch_array($query_run))
                        {
                            echo $data['count(coachid)'];
                        }
                    ?>
                    </h1>
                </div>
            </div>
          </div>    
		</div>
	</div>
</div>
</body>
</html>