<?php
session_start();
include('dbcon.php');
include('bt.php');

if(isset($_POST['log_btn']))//if clicked on login button
{
    //if the box is empty and still clicked on the button
    if(!empty(trim($_POST['email'])) && !empty(trim($_POST['password'])))
    {
        // $email = mysqli_real_escape_string($con, $_POST['email']);
        // $password = mysqli_real_escape_string($con, $_POST['password']);
        
        $email = $_POST['email'];
        $password = $_POST['password'];

        //login query
        // $hash = password_hash($password, PASSWORD_DEFAULT);
        $login_query="SELECT* FROM user WHERE Email='$email' LIMIT 1";
        $login_query_run = mysqli_query($con, $login_query);

        //check if email exist
        if(mysqli_num_rows($login_query_run) > 0)
        {
            //check if verified
            $row = mysqli_fetch_array($login_query_run, MYSQLI_ASSOC);
            $hash = $row['Password'];
            $_SESSION['user_id']= $row['ID'];
            $_SESSION['user_name']= $row['Name'];
            $_SESSION['mode']= $row['Mode'];
            // echo $row['Verify_status'];
            if($row['Verify_status']=="1")
            {
                    // $roww=mysqli_fetch_assoc($login_query_run);
                    if(password_verify($password, $hash))
                    {
                        $_SESSION['authenticated']= TRUE;
                        $_SESSION['popup']= TRUE;
                        $_SESSION['status']= "You are logged in successfully!";
                        // echo"<div class='popup' style='position:absolute;
                        // top:50%; left:50%; transform:translate(-50%,-50%); width: 380px;backgorund:#fff; box-shadow:2px 2px 5px 5px rgba(0,0,0,0.15); border-radius: 10px; '>
                        // <div class='close-btn'>&times;</div>
                        // <div >
                        //     <p>You are logged in successfully!</p>
                        // </div>
                        // </div>";
                        if($row['Mode']=="A")
                        header("Location: http://localhost/project/admin/dashboardA.php");
                        else
                        header("Location: http://localhost/project/user/dashboardU.php");
                        exit(0);
                    }
                    else
                    {
                        // $_SESSION['status']= "Password incorrect, please try again.";
                        // header("Location: login.php");
                        echo "<script>alert('Password incorrect, please try again.')</script>";
                        echo "<script>window.open('login.php','_self')</script>";
                        exit(0);
                    }

                
            }
            else
            {
                // $_SESSION['status']= "Please verify your email first.";
                // header("Location: login.php");
                echo "<script>alert('Please verify your email first.')</script>";
                echo "<script>window.open('login.php','_self')</script>";
                exit(0);
            }
        }
        else
        {
            // $_SESSION['status']= "Email doesn't exist.";
            // header("Location: login.php");
            echo "<script>alert('Email does not exist, please register first.')</script>";
            echo "<script>window.open('register.php','_self')</script>";
            exit(0);
        }
    }
    else
    {
        // $_SESSION['status']="All fields are mandetory";
        // header("Location: login.php");
        echo "<script>alert('All fields are mandetory')</script>";
        echo "<script>window.open('login.php','_self')</script>";
        exit(0);
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
}


?>