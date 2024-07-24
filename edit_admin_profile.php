<?php
    include("auth.php");
    include("dbconfig.php");
    if(isset($_REQUEST['email'])){

		$adminid=$_POST['adminid'];
		$f_name=$_POST['f_name'];
		$m_name=$_POST['m_name'];
		$l_name=$_POST['l_name'];
		$a_designation=$_POST['a_designation'];
		$a_dob=$_POST['a_dob'];
		$a_gender=$_POST['a_gender'];
		$a_doj=$_POST['a_doj'];
		$email=$_POST['email'];
		$password=md5($_POST['password']);
		$phone=$_POST['phone'];


        $sql = "UPDATE admin SET f_name='$f_name',m_name ='$m_name',l_name='$l_name',a_designation='$a_designation',a_dob='$a_dob',a_gender= '$a_gender',a_doj= '$a_doj',
		email='$email',password='$password',phone='$phone' WHERE adminid = '$_POST[id]'";
        $result = mysqli_query($conn,$sql);
		if($result){
            $_SESSION['success'] = "Profile Updated Successfully";
			header("location: admin_profile.php");
		} else {
            $_SESSION['status'] = "Profile not updated!!";
			header("location: admin_profile.php");
		}
    }
?>