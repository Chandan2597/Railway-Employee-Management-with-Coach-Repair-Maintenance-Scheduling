<?php
    include("auth.php");
    include("dbconfig.php");
    if(isset($_GET['id'])){
        
        if($result){
        $_SESSION['deleted'] = "Leave deleted succesfully";
        header("location: assign_leave.php");
        }
        else{
        $_SESSION['notdeleted'] = "Leave not deleted!";
        header("location: assign_leave.php");
        }
    }
    if(isset($_POST['delete_btn_set']))
    {
        $del_id = $_POST['delete_id'];
        $sql = "DELETE FROM leaves WHERE id = '$del_id'";
        $result = mysqli_query($conn,$sql);
    }
?>