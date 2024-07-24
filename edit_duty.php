<?php include "auth.php" ?>
<?php
    include("dbconfig.php");
    if(isset($_POST['edit'])){

		$empid=$_POST['empid'];
		$shift=$_POST['shift'];
		$dutytype=$_POST['dutytype'];
		$frm=$_POST['frm'];
		$upto=$_POST['upto'];
		$adminid=$_SESSION['adminid'];

        $sql = "UPDATE duty SET empid='$empid',shift='$shift',dutytype='$dutytype',frm='$frm',upto='$upto',adminid='$adminid' WHERE id = '$_POST[id]'";
        $result = mysqli_query($conn,$sql);
		if($result){
			$_SESSION['success']="Duty Updated successfully!";
			header("location: manage_duty.php");
		} else {
			$_SESSION['status']="Duty not updated!";
			header("location: manage_duty.php");
		}
    }
?>