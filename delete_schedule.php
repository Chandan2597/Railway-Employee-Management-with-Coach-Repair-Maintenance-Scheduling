<?php
    include("auth.php");
    include("dbconfig.php");
    if(isset($_GET['id'])){
        $sql = "DELETE FROM repairschedule WHERE id = '$_GET[id]'";
        $result = mysqli_query($conn,$sql);
        if($result){
            $_SESSION['deleted'] = "Schedule deleted succesfully";
            header("location: schedule_repair.php");
            }
            else{
            $_SESSION['notdeleted'] = "Schedule not deleted!";
            header("location: schedule_repair.php");
        }
    }

    if(isset($_POST['delete_btn_set']))
{
    $del_id = $_POST['delete_id'];
    $sql = "DELETE FROM repairschedule WHERE id = '$del_id'";
    $result = mysqli_query($conn,$sql);
}
?>