<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        session_start();
        include('authentication.php');
    ?>
    <?php
        // if(!isset($_SESSION['authenticated']))
        // {
        // $_SESSION['status']="login page";
        // header("Location: login.php");
        // exit(0);
        // }
    ?>
    <div class="alert">
        <?php
            if(isset($_SESSION['status']))
            {
                echo "<h4 style=\"
                font-size: 17px;
                padding: 1%;
                display: block;
                width: 300px;
                background-color: rgb(193, 200, 139);
                margin: 50px 50px;
                font-family: 'Nanum Myeongjo', serif;
                color:rgb(61, 68, 6);
                float: left\">" .$_SESSION['status']."</h4>";
                unset($_SESSION['status']);
            }
        ?>
    </div>
    
    <header class="Header">
        <form action="logincode.php" method="POST">
        <!-- <div class="form">
            ENTER NAME: <input type="text" name="name" id="name">
        </div> -->
        <div class="form">
            ENTER EMAIL: <input type="email" name="email" id="email">
        </div>
        <div class="form">
            ENTER PASSWORD: <input type="text" name="password" id="password">
        </div>
        <div class btn>
            <input type="submit"name="log_btn"value="LOGIN" id="b" >
        </div>
        </form>
    </header>
</body>
</html>


if($row['Verify_status']=="1")
            {
                while($row=mysqli_fetch_assoc($login_query_run))
                {
                    if(password_verify($password, $row['Password']))
                    {
                        $_SESSION['authenticated']= TRUE;
                        $_SESSION['auth_user']= [
                        'username'=> $row['Name'],
                        'email'=> $row['Email'],
                        ];//to store user data and all
                        $_SESSION['status']= "You are logged in successfully!";
                        header("Location: dashboard.php");
                        exit(0);
                    }
                    else
                    {
                        $_SESSION['status']= "Invalid Email or Password.";
                        header("Location: login.php");
                        exit(0);
                    }

                }
            }