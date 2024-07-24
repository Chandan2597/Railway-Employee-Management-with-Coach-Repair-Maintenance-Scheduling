
<?php
    include("auth.php");
    include("dbconfig.php");
    if(isset($_POST['edit'])){

		$coachid=$_POST['coachid'];
		$age=$_POST['age'];
		$coachtype=$_POST['coachtype'];
		$color=$_POST['color'];

        $sql = "UPDATE coach SET age = '$age', coachtype = '$coachtype',color='$color'  WHERE coachid = '$_POST[id]'";
        $result = mysqli_query($conn,$sql);
		if($result){
			$_SESSION['success']="Coach Updated successfully!";
			header("location: manage_coach.php?coachid=$_POST[id]");
		} else {
			$_SESSION['status']="Coach not updated!";
			header("location: manage_coach.php?coachid=$_POST[id]");
		}
    }
?>