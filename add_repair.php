<?php
include_once 'auth.php';
include_once 'dbconfig.php';
if(isset($_POST['save']))
{	 
    $sql="INSERT INTO repairschedule(coachid,date,type,schedule,comments,status,adminid)
    VALUES ('$_POST[coachid]','$_POST[date]','$_POST[type]','$_POST[schedule]','$_POST[comments]','$_POST[status]','$_SESSION[adminid]')";
	$result=mysqli_query($conn,$sql);
	if($result){
		$_SESSION['added']="Repair Scheduled successfully!";
		header ("Location: schedule_repair.php");
	 } else {
		$_SESSION['notadded']="Repair not scheduled!";
		header ("Location: schedule_repair.php");
	 }
	 mysqli_close($conn);
}
?>