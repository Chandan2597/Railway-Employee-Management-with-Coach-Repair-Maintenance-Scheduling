<?php
    include 'security.php';
    include("dbconfig.php");
    if(isset($_POST['edit'])){

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

        $sql = "UPDATE employee SET fname='$fname',mname ='$mname',lname='$lname',designation='$designation',dob='$dob',gender= '$gender',doj= '$doj',bgroup='$bgroup',
		email='$email',password='$password',contact='$contact',address='$address',district='$district',state='$state',country='$country', pin='$pin' WHERE empid = '$_POST[id]'";
        $result = mysqli_query($conn,$sql);
		if($result){
            $_SESSION['success'] = "Profile Updated Successfully";
			header("location: my_profile.php");
		} else {
            $_SESSION['msg1'] = "Profile not updated please try again!!";
			header("location: my_profile.php");
		}
    }
?>