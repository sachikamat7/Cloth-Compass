<?php
session_start();//since we used session 
include('dbcon.php'); //calling dbcon file 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name, $email, $Verify_token)
{
    //download phpmailer to send email/ write code sending email
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
    $mail->Subject = 'Email verification from Cloth Compass';

    $email_template = "
        <h2>You have registered with Cloth Compass. <h2>
        <h4> Verify your email address with the below link to login. <h4>
        <br>
        <a href='http://localhost/project/resend_email_verification/verify_email.php?token=$Verify_token'> CLICK HERE </a>
    ";
    $mail->Body = $email_template;
    $mail->send();
    // echo 'Message has been sent';
}


if(isset($_POST['reg_btn']))    //if the button is clicked or not
{
    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password'])) && !empty(trim($_POST['cpassword'])) && !empty(trim($_POST['name']))&& !empty(trim($_POST['mode'])))
    {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $Verify_token = md5(rand());
    $mode = $_POST['mode'];


    //query for checking if email exists or not
    $check_email_query = "SELECT email FROM user WHERE Email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con,$check_email_query);
    // creating database file (dbcon.php)
    //check if success
    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        // $_SESSION['status'] = "Email ID already exist.";//alert message
        // header("Location: register.php");
        echo "<script>alert('Email ID already exist.')</script>";
            echo "<script>window.open('register.php','_self')</script>";
    }
    else
    {
        if($password == $cpassword)
        {
        //creating hash of password
        $hash = password_hash($password, PASSWORD_BCRYPT);
        // $hash = substr($hash, 0, 60);
        // echo "INSERT INTO user (Name,Password,Email,Verify_token) VALUES ('$name', '$hash', '$email', '$Verify_token')";
        //insert user data
        $query = "INSERT INTO user (Name,Password,Email,Verify_token, Mode) VALUES ('$name', '$hash', '$email', '$Verify_token', '$mode')"; 
        $query_run = mysqli_query($con, $query);

        if($query_run)    //If query is successful
        {
            sendemail_verify("$name", "$email", "$Verify_token");

            // $_SESSION['status'] = "Registration successful! Please verify your email before login.";
            // header("Location: register.php");
            echo "<script>alert('Registration successful! Please verify your email before login.')</script>";
            echo "<script>window.open('login.php','_self')</script>";
        }
        else
        {
            // $_SESSION['status'] = "Registration failed, please try again.";
            // header("Location: register.php");
            echo "<script>alert('Registration failed, please try again.')</script>";
            echo "<script>window.open('register.php','_self')</script>";
        }
        }
        else
        {
            // $_SESSION['status'] = "Password and confirm password does not match.";
            // header("Location: register.php");
            echo "<script>alert('Password and confirm password does not match.')</script>";
                echo "<script>window.open('register.php','_self')</script>";
        }


    }
}
    else
    {
        // $_SESSION['status'] = "Please fill all the fields.";
        // header("Location: register.php");
        echo "<script>alert('Please fill all the fields.')</script>";
            echo "<script>window.open('register.php','_self')</script>";
    }
}

?>