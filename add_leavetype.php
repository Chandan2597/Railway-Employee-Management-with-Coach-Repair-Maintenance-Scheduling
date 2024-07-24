
<?php
include 'auth.php';
include 'dbconfig.php';
if(isset($_REQUEST['leavetype']))
{
	$leavetype=$_POST['leavetype'];
	$description=$_POST['description'];

	$query="INSERT INTO leavetype (leavetype,description) VALUES ('$leavetype','$description')";
	
	$res=mysqli_query($conn,$query);
	if($res){
		$_SESSION['success']="LeaveType added successfully!";
		header('Location: manage_leavetype.php');
	}else{
		$_SESSION['status']="LeaveType not added!";
		header('Location: manage_leavetype.php');
	}
}
?>