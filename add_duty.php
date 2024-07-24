
<?php
include 'auth.php';
include 'dbconfig.php';
if(isset($_POST['save']))
{	 
    $sql="INSERT INTO duty(empid,dutytype,shift,frm,upto,adminid)
    VALUES ('$_POST[empid]','$_POST[dutytype]','$_POST[shift]','$_POST[frm]','$_POST[upto]','$_SESSION[adminid]')";
	$result=mysqli_query($conn,$sql);
	 if($result){
		$_SESSION['added']="Duty assigned successfully!";
		header("location: manage_duty.php");
	} else {
		$_SESSION['notadded']="Duty not assigned!";
		header("location: manage_duty.php");
	}
	 mysqli_close($conn);
}
?>
