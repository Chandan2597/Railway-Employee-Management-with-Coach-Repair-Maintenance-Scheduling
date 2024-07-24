<?php
    include("auth.php");
    include("dbconfig.php");
    if(isset($_GET['id'])){

        if($result){
        $_SESSION['deleted'] = "Duty deleted succesfully";
        header("location: manage_duty.php");
        }
        else{
        $_SESSION['notdeleted'] = "Duty not deleted!";
        header("location: manage_duty.php");
        }
    }
    if(isset($_POST['delete_btn_set']))
    {
        $del_id = $_POST['delete_id'];
        $sql = "DELETE FROM duty WHERE id = '$del_id'";
        $result = mysqli_query($conn,$sql);
    }
?>