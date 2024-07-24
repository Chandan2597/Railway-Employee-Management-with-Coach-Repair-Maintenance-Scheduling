<?php
    include("auth.php");
    include("dbconfig.php");
    if(isset($_GET['id'])){

        if($result){
        $_SESSION['deleted'] = "Employee deleted succesfully!";
        header("location: manage_emp.php");
        }else{
        $_SESSION['notdeleted'] = "Employee not deleted!";
        header("location: manage_emp.php");
        }
    }
    if(isset($_POST['delete_btn_set']))
    {
        $del_id = $_POST['delete_id'];
        $sql = "DELETE FROM employee WHERE empid = '$del_id'";
        $result = mysqli_query($conn,$sql);
    }
?>