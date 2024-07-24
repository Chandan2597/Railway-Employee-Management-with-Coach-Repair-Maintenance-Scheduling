<?php
    include 'auth.php';
    include("dbconfig.php");
    if(isset($_GET['id'])){
        
        if($result){
            $_SESSION['deleted'] = "Leavetype deleted succesfully";
            header("location: manage_leavetype.php");
            }
            else{
            $_SESSION['notdeleted'] = "Leavetype not deleted!";
            header("location: manage_leavetype.php");
        }
    }
    if(isset($_POST['delete_btn_set']))
    {
        $del_id = $_POST['delete_id'];
        $sql = "DELETE FROM leavetype WHERE leaveid = '$del_id'";
        $result = mysqli_query($conn,$sql);
    }
?>