<?php
session_start();

include('dbconfig.php');
if (!$_SESSION['email']) {
    header('location:user_login.php');
}
