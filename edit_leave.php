
<?php
	include "auth.php";
    include("dbconfig.php");
    if(isset($_POST['edit'])){
		$empid=$_POST['empid'];
		$fromdate=$_POST['fromdate'];
		$todate=$_POST['todate'];
		$leaveid=$_POST['leaveid'];
		$adminremark=$_POST['adminremark'];
		$adminid=$_SESSION['adminid'];

        $sql = "UPDATE leaves SET empid='$empid',fromdate='$fromdate', todate='$todate',leaveid='$leaveid',adminremark='$adminremark',adminid='$adminid' WHERE id = '$_GET[id]'";
        $result = mysqli_query($conn,$sql);
		if($result){
			$_SESSION['success']="Leave updated successfully!";
			header("location: assign_leave.php");
		} else {
			$_SESSION['status']="Leave not updated!";
			header("location: assign_leave.php");
		}
    }
?>
<!-- Echo sql error -->
<!-- echo "Error: " . $sql . "
" . mysqli_error($conn); -->