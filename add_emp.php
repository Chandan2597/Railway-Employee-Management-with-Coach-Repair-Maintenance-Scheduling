
<?php
include 'auth.php';
include 'dbconfig.php';
if(isset($_REQUEST['email']))
{
	$empid=$_POST['empid'];
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$designation=$_POST['designation'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$doj=$_POST['doj'];
	$bgroup=$_POST['bgroup'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$contact=$_POST['contact'];
	$address=$_POST['address'];
	$district=$_POST['district'];
	$country=$_POST['country'];
	$state=$_POST['state'];
	$pin=$_POST['pin'];

	$query="INSERT INTO employee (empid,fname,mname,lname,designation,dob,gender,doj,bgroup,email,password,contact,address,pin,district,state,country) VALUES ('$empid','$fname','$mname','$lname','$designation','$dob','$gender','$doj','$bgroup','$email','$password','$contact','$address','$pin','$district','$state','$country')";
	
	$res=mysqli_query($conn,$query);
	if($res){
		$_SESSION['success']="Employee added successfully!";
		header('Location: manage_emp.php');
	}else{
		$_SESSION['status']="Employee not added!";
		header('Location: manage_emp.php');
	}
}
?>