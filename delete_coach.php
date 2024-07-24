<?php
    include("auth.php");
    include("dbconfig.php");
    if(isset($_GET['id'])){
        
        if($result){
            $_SESSION['deleted'] = "Coach deleted succesfully";
            header("location: manage_coach.php");
            }
            else{
            $_SESSION['notdeleted'] = "Coach not deleted!";
            header("location: manage_coach.php");
        }
    }

if(isset($_POST['delete_btn_set']))
{
    $del_id = $_POST['delete_id'];
    $sql = "DELETE FROM coach WHERE coachid = '$del_id'";
    $result = mysqli_query($conn,$sql);
}

?>