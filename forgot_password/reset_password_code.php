<?php
session_start();
include('C:/xampp/htdocs/Project/home/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name, $get_email, $token)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP(); 
    $mail->SMTPAuth = true;
    
    $mail->Host = 'smtp.gmail.com';
    $mail->Username   = 'clothcompass7@gmail.com';                     //SMTP username
    $mail->Password   = 'orkqwssgqfdbwezw';

    $mail->SMTPSecure = "tls";
    $mail->Port = 587;  
    
    $mail->setFrom('clothcompass7@gmail.com', $get_name);
    $mail->addAddress($get_email);  //entered email

    $mail->isHTML(true);
    $mail->Subject = 'Reset password from Cloth Compass';

    $email_template = "
        <h2>Hello <h2>
        <h4> Click on below link to reset password. <h4>
        <br>
        <a href='http://localhost/project/forgot_password/password_change.php?token=$token&email=$get_email'> CLICK HERE </a>
    ";
    $mail->Body = $email_template;
    $mail->send();
}
//check if button is clicked
if(isset($_POST['reset_password_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    //token created after clicking on the button(random no and alpha)

    $token = md5(rand());

    $check_email = "SELECT Email FROM user WHERE Email = '$email' LIMIT 1 ";
    $check_email_run = mysqli_query($con, $check_email);
    //check if any record is available
    if(mysqli_num_rows($check_email_run) > 0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['Name'];
        $get_email = $row['Email'];

        //update token in our database table
        $update_token = "UPDATE user SET Verify_token = '$token' WHERE Email = '$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if($update_token_run)
        {
            //send mail
            send_password_reset($get_name, $get_email, $token);
            // $_SESSION['status'] = "Password reset link has been sent";
            // header("Location: reset_password.php");
            echo "<script>alert('Password reset link has been sent.')</script>";
            echo "<script>window.open('http://localhost/project/index.php','_self')</script>";
            exit(0);
        }
        else
        {
            // $_SESSION['status'] = "Something went wrong";
            // header("Location: reset_password.php");
            echo "<script>alert('Something went wrong, please try again.')</script>";
            echo "<script>window.open('reset_password.php','_self')</script>";
            exit(0);
        }

    }
    else
    {
        // $_SESSION['status'] = "Email not found";
        // header("Location: reset_password.php");
        echo "<script>alert('Email not found, please register first.')</script>";
        echo "<script>window.open('http://localhost/project/home/register.php','_self')</script>";
        exit(0);
    }
}

if(isset($_POST['password_update_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);

    $token = mysqli_real_escape_string($con, $_POST['password_token']);
    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password) && !empty($confirm_password))
        {
            //checking token is valid or not
            $check_token = "SELECT Verify_token FROM user WHERE Verify_token = '$token' LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token);

            //if token is available
            if(mysqli_num_rows($check_token_run) > 0)
            {
                if($new_password == $confirm_password)
                {
                    //update the password
                    $hash = password_hash($new_password, PASSWORD_BCRYPT);
                    $update_password = "UPDATE user SET Password = '$hash' WHERE Verify_token = '$token' LIMIT 1";
                    $update_password_run = mysqli_query($con, $update_password);

                    if($update_password_run)
                    {
                        // $_SESSION['status'] = "New password updated successfully!";
                        // header("Location: http://localhost/project/home/login.php");
                        echo "<script>alert('New password updated successfully!')</script>";
                        echo "<script>window.open(' http://localhost/project/home/login.php','_self')</script>";
                        exit(0);

                    }
                    else
                    {
                        // $_SESSION['status'] = "Did not update password, something went wrong";
                        // header("Location: http://localhost/project/forgot_password/password_change.php?token=$token&email=$email");
                        echo "<script>alert('Did not update password, something went wrong. Please try again.')</script>";
                        echo "<script>window.open('http://localhost/project/forgot_password/reset_password.php','_self')</script>";
                        exit(0);
                    }
                }
                else
                {
                    // $_SESSION['status'] = "New password and confirm password does not match.";
                    // header("Location: http://localhost/project/forgot_password/password_change.php?token=$token&email=$email");
                    echo "<script>alert('New password and confirm password does not match.')</script>";
                    echo "<script>window.open(' http://localhost/project/forgot_password/password_change.php?token=$token&email=$email','_self')</script>";
                    exit(0);
                }
            }
            else
            {
                // $_SESSION['status'] = "Invalid token.";
                // header("Location: http://localhost/project/forgot_password/password_change.php?token=$token&email=$email");
                echo "<script>alert('Invalid token, try again.')</script>";
                echo "<script>window.open('http://localhost/project/forgot_password/reset_password.php','_self')</script>";
                exit(0);
            }
        }
        else
        {
            // $_SESSION['status'] = "All fields are mandetory.";
            // header("Location: http://localhost/project/forgot_password/password_change.php?token=$token&email=$email");
            echo "<script>alert('All fields are mandetory.')</script>";
            echo "<script>window.open('http://localhost/project/forgot_password/password_change.php?token=$token&email=$email','_self')</script>";
            exit(0);
        }
    }
    else
    {
        // $_SESSION['status'] = "No token available";
        // header("Location: http://localhost/project/forgot_password/password_change.php");
        echo "<script>alert('No token available.')</script>";
        echo "<script>window.open('http://localhost/project/forgot_password/reset_password.php','_self')</script>";
        exit(0);
    }
}

?>