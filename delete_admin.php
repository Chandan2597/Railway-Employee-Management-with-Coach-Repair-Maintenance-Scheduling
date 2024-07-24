<?php
    include("auth.php");
    include("dbconfig.php");
    if(isset($_GET['id'])){
        
        if($result){
        $_SESSION['deleted'] = "Admin deleted succesfully";
        header("location: manage_admin.php");
        }else{
            $_SESSION['notdeleted'] = "Admin not deleted";
            header("location: manage_admin.php");
        }
    }
    if(isset($_POST['delete_btn_set']))
    {
        $del_id = $_POST['delete_id'];
        $sql = "DELETE FROM admin WHERE adminid = '$del_id'";
        $result = mysqli_query($conn,$sql);
    }
?>