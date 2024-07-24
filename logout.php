<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location:admin_login.php"); // Or wherever you want to redirect
    exit();
?>


