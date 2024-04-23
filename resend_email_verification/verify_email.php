<?php
session_start();
include('C:/xampp/htdocs/Project/home/dbcon.php');

if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $verify_query = "SELECT Verify_token, Verify_status FROM user WHERE Verify_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($con, $verify_query);

    if(mysqli_num_rows($verify_query_run) > 0)
    {
        $row = mysqli_fetch_array($verify_query_run);
        if($row['Verify_status']=="0")//if not verified
        {
            $clicked_token = $row['Verify_token'];
            // echo $row['Verify_token'];
            $update_query = "UPDATE user SET Verify_status = '1' WHERE Verify_token = '$clicked_token' LIMIT  1";
            $update_query_run = mysqli_query($con, $update_query);
            if($update_query_run) //if query is success
            {
                // $_SESSION['status'] = "Your account has been verified succesfully!";
                // header("Location: http://localhost/project/home/login.php");
                echo "<script>alert('Your account has been verified succesfully! Please login')</script>";
                echo "<script>window.open('http://localhost/project/home/login.php','_self')</script>";
                exit(0);
            }
            else
            {
                // $_SESSION['status'] = "Verification failed.";
                // header("Location: http://localhost/project/home/register.php");
                echo "<script>alert('Verification failed, please try again.')</script>";
                echo "<script>window.open('http://localhost/project/resend_email_verification/resend_email_verification.php','_self')</script>";
                exit(0);
            }
        }
        else
        {
            // $_SESSION['status'] = "Email already verified, Please login.";
            // header("Location: http://localhost/project/home/login.php");
            echo "<script>alert('Email already verified, please login.')</script>";
            echo "<script>window.open('http://localhost/project/home/login.php','_self')</script>";
            exit(0);
        }
    }
    else
    {
        // $_SESSION['status'] = "This token does not exist.";
        // header("Location: http://localhost/project/home/login.php");
        echo "<script>alert('This token does not exist, please try again.')</script>";
        echo "<script>window.open('http://localhost/project/resend_email_verification/resend_email_verification.php','_self')</script>";
    }
}
else
{
    // $_SESSION['status'] = "Not allowed.";
    // header("Location: http://localhost/project/home/register.php");
    echo "<script>alert('Not allowed.')</script>";
    echo "<script>window.open('http://localhost/project/home/register.php','_self')</script>";
}


?>