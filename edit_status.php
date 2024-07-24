
<?php
    include("auth.php");
    include("dbconfig.php");
    if(isset($_POST['edit'])){

		$status=$_POST['status'];
		$comments=$_POST['comments'];

        $sql = "UPDATE repairschedule SET status='$status',comments='$comments' WHERE id = '$_POST[id]'";
        $result = mysqli_query($conn,$sql);
		if($result){
			$_SESSION['success']="Status updated successfully!";
            header("location: change_status.php");
		} else {
			$_SESSION['status']="Status not updated!";
			header("location: change_status.php");
		}
    }
?>