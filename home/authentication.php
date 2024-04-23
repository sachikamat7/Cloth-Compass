<?php
session_start();
if(!isset($_SESSION['authenticated']))
{
    $_SESSION['status']="Please login to access dashboard.";
    header("Location: http://localhost/project/home/login.php");
    exit(0);
}


?>