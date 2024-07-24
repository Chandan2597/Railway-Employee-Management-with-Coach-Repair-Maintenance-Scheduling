
<?php
    include("auth.php");
    include("dbconfig.php");
    if(isset($_POST['edit'])){

		$coachid=$_POST['coachid'];
		$date=$_POST['date'];
		$schedule=$_POST['schedule'];
		$type=$_POST['type'];
		$adminid=$_SESSION['adminid'];

        $sql = "UPDATE repairschedule SET date='$date',schedule='$schedule',type='$type',adminid='$adminid' WHERE id = '$_POST[id]'";
        $result = mysqli_query($conn,$sql);
		if($result){
			$_SESSION['success']="Schedule updated successfully!";
            header("location: schedule_repair.php");
		} else {
			$_SESSION['status']="Schedule not updated!";
            header("location: schedule_repair.php");
		}
    }
?>