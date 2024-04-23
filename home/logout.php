<?php
session_start();
// unset($_SESSION['authenticated']);
// unset($_SESSION['auth_user']);
// unset($_SESSION['user_id']);
// unset($_SESSION['user_name']);

// // session_destroy();
// $_SESSION['status']="You have logged out succesfully.";
// echo "<h4 style=\"
//                 font-size: 17px;
//                 padding: 1%;
//                 display: block;
//                 width: 300px;
//                 background-color: rgb(226, 226, 125);;
//                 margin: 50px 50px;
//                 font-family: 'Nanum Myeongjo', serif;
//                 color:rgb(61, 68, 6);
//                 float: left\">" .$_SESSION['status']."</h4>";
//                 unset($_SESSION['status']);
//                 session_destroy();
// header("Location: login.php");
// unset($_SESSION['authenticated']);
unset($_SESSION['auth_user']);
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
$_SESSION['authenticated']= FALSE;
echo "<script>alert('You have logged out successfully!')</script>";
            echo "<script>window.open('http://localhost/project/index.php','_self')</script>";

?>