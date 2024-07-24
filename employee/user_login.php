<?php
    session_start();
    include 'dbconfig.php';
   
  if(isset($_POST['email']))
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $query="SELECT * FROM employee WHERE email='$email' AND password='$password'";
    $res=mysqli_query($conn,$query);
    $count=mysqli_num_rows($res);
    $row=$res->fetch_assoc();
    if($count==1)
    {
        $_SESSION['email'] = $email;
        $_SESSION['empid'] = $row['empid'];
        header("Location:my_profile.php");
    }else{
        //  echo ("Your Email or Password is invalid");
        $_SESSION['status'] = 'Email or password is wrong';
      }
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>
    <link rel="stylesheet" href="css/adminlogin_style.css">
<script>
    function formvalidation(){
    var email=$('#email').val();
    var password=$('#password').val();
    if(email==''){
        alert("Please Enter your Email");
        return false;
    }
    if(password==''){
        alert("Please Enter your Password");
        return false;
    }
    }
</script>
</head>
<body>
<header>
    <?php include 'navbar.php' ?>
</header>
    <div class="center">

        <h2>Employee Login</h2>
        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
            echo '<h5 class="bg-danger text-white"><center>' . $_SESSION['status'] . '</center> </h5>';
            unset($_SESSION['status']);
        }
        ?>
        <form action="user_login.php" method="post" onsubmit="return formvalidation();">
            <div class="txt_field">
                <input type="email" name="email" id="email">
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password">
                <label>Password</label>
                <span></span>
            </div>
            <input type="submit" name="submit" value="Login">
        </form>
    </div>
</body>
</html>