
<?php
	include "auth.php";
    include("dbconfig.php");
    if(isset($_POST['edit'])){

		$leavetype=$_POST['leavetype'];
		$description=$_POST['description'];

        $sql = "UPDATE leavetype SET leavetype='$leavetype',description ='$description' WHERE leaveid = '$_GET[id]'";
        $result = mysqli_query($conn,$sql);
		if($result){
			$_SESSION['success']="Leavetype updated successfully!";
			header("location: manage_leavetype.php");
		} else {
			$_SESSION['status']="Leavetype not updated!";
			header("location: manage_leavetype.php");
		}
    }
?>