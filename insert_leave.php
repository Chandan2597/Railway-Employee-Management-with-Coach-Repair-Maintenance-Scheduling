<?php
include_once 'auth.php';
include_once 'dbconfig.php';
if(isset($_REQUEST['fromdate']))
{	 
	$empid=$_POST['empid'];
	$fromdate=$_POST['fromdate'];
	$todate=$_POST['todate'];
	$adminremark=$_POST['adminremark'];
	$leaveid=$_POST['leaveid'];
	$adminid=$_SESSION['adminid'];

    $query="INSERT INTO leaves(empid,fromdate,todate,adminremark,leaveid,adminid) VALUES ('$empid','$fromdate','$todate','$adminremark','$leaveid','$adminid')";
	 if (mysqli_query($conn, $query)) {
		$_SESSION['added']="Leave assigned successfully!";
		header ("Location: assign_leave.php");
        exit();
	 } else {
		$_SESSION['notadded']="Leave not assigned!";
		header ("Location: assign_leave.php");
	}
	 mysqli_close($conn);
}
?>