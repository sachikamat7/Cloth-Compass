<?php
session_start();
include('C:/xampp/htdocs/Project/home/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function resend_email_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP(); 
    $mail->SMTPAuth = true;
    
    $mail->Host = 'smtp.gmail.com';
    $mail->Username   = 'clothcompass7@gmail.com';                     //SMTP username
    $mail->Password   = 'orkqwssgqfdbwezw';

    $mail->SMTPSecure = "tls";
    $mail->Port = 587;  
    
    $mail->setFrom('clothcompass7@gmail.com', $name);
    $mail->addAddress($email);  //entered email

    $mail->isHTML(true);
    $mail->Subject = 'Resend - Email verification from Cloth Compass';

    $email_template = "
        <h2>You have registered with Cloth Compass. <h2>
        <h4> Verify your email address with the below link to login. <h4>
        <br>
        <a href='http://localhost/project/resend_email_verification/verify_email.php?token=$verify_token'> CLICK HERE </a>
    ";
    $mail->Body = $email_template;
    $mail->send();
}

//if button is clicked
if(isset($_POST['verify_btn']))
{
    //if empty
    if(!empty(trim($_POST['email'])))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);

        $checkemail_query = "SELECT* FROM user WHERE Email='$email' LIMIT 1";
        $checkemail_query_run = mysqli_query($con, $checkemail_query);

        if(mysqli_num_rows($checkemail_query_run) > 0)
        {
            //check if verified
            $row = mysqli_fetch_array($checkemail_query_run);
            if($row['Verify_status']== "0")
            {
                $name = $row['Name'];
                $email = $row['Email'];
                $verify_token = $row['Verify_token'];
                resend_email_verify($name, $email, $verify_token);
                // $_SESSION['status']="Verification link has been sent to your email address.";
                // header("Location: http://localhost/project/home/login.php");
                echo "<script>alert('Verification link has been sent to your email address.')</script>";
                echo "<script>window.open('http://localhost/project/index.php','_self')</script>";
                exit(0);
            }
            else
            {
                // $_SESSION['status']="Email already verified. Please login";
                // header("Location: http://localhost/project/home/login.php");
                echo "<script>alert('Email already verified, please login.')</script>";
                echo "<script>window.open('http://localhost/project/home/login.php','_self')</script>";
                exit(0);
            }
        }
        else
        {
            // $_SESSION['status']="Email is not registered. Please register first.";
            // header("Location: http://localhost/project/home/register.php");
            echo "<script>alert('Email is not registered, please register first.')</script>";
            echo "<script>window.open('http://localhost/project/home/register.php','_self')</script>";
            exit(0);
        }
    }
    else
    {
        // $_SESSION['status']="Please enter the email address.";
        // header("Location: http://localhost/project/resend_email_verification/resend_email_verification.php");
        echo "<script>alert('Please enter the email address.')</script>";
        echo "<script>window.open('http://localhost/project/resend_email_verification/resend_email_verification.php','_self')</script>";
        exit(0);

    }
}
else
{

}


?>