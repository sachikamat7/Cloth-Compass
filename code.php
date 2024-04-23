<?php
session.start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);
}
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    //random number:
    $varify_token=md5(rand());//will generate alphabetic and numeric numbers

    //check if email exits
    $check_email_query ="SELECT email FROM user_info WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con, $$check_email_query);

    if(mysqli_num_rows($check_email_query_run)>0)
    {
        $_SESSION['status']= "Email address already exists.";
        header("location: index.php");
    }
    else
    {
        //insert user
        $query = "INSERT INTO user_info (Name,	Password, email, verify_token) VALUES ('$name', '$email', '$password', '$varify_token)";
        $query_run =mysqli_query($con,$query);

        if($query_run)//if successfull
        {
            sendemail_verify("$name", "$email", "$verify_token");
            $_SESSION['status'] = "Registration successfull! Please verify email";
        }
        else
        {
            $_SESSION['status'] = "Registration failed";
            header('location:index.php');
        }
    }
}


?>