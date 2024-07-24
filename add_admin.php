
<?php

include 'auth.php';
include 'dbconfig.php';
if(isset($_REQUEST['email']))
{
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

	$query="INSERT INTO admin (f_name,m_name,l_name,a_designation,a_dob,a_gender,a_doj,email,password,phone) VALUES ('$f_name','$m_name','$l_name','$a_designation','$a_dob','$a_gender','$a_doj','$email','$password','$phone')";
	
	$res=mysqli_query($conn,$query);
	if($res){
		$_SESSION['success'] = "Admin added succesfully";
		header('Location: manage_admin.php');
	}else{
		$_SESSION['status'] = "Admin not added!!";
		header('Location: manage_admin.php');
	}
}
?>