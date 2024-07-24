
<?php
include 'auth.php';
include 'dbconfig.php';
if(isset($_POST['add']))
{	 
    $sql="INSERT INTO coach(coachid,age,coachtype,color)
    VALUES ('$_POST[coachid]','$_POST[age]','$_POST[coachtype]','$_POST[color]')";
	$result=mysqli_query($conn,$sql);
	if($result){
		$_SESSION['added']="Coach added successfully!";
		header("location: manage_coach.php");
	} else {
		$_SESSION['notadded']="Coach not added!";
		header("location: manage_coach.php");
	}
	 mysqli_close($conn);
}
?>