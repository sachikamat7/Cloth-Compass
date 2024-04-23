<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="http://localhost/project/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
</head>
<body>
<?php
    // session_destroy();
    session_start();
    include('dbcon.php');
    // if($_SESSION['authenticated']== TRUE)
    // {
    //   echo "<script>alert('You are already logged in.')</script>";
            
    //         $user_id = $_SESSION['user_id'];
    //         $query="SELECT* FROM user WHERE ID='$user_id' LIMIT 1";
    //         $login_query_run = mysqli_query($con, $query);
    //         $row = mysqli_fetch_array($login_query_run, MYSQLI_ASSOC);
    //         if($row['Mode']=="A")
    //         {
    //             echo "<script>window.open('http://localhost/project/admin/dashboardA.php','_self')</script>";
    //         }
    //         else
    //         {
    //             echo "<script>window.open('http://localhost/project/user/dashboardU.php','_self')</script>";
    //         }
    //   exit(0);
    // }
    $_SESSION['authenticated']=FALSE;
    // include('C:\xampp\htdocs\Project\home\authentication.php');
    ?>
    

    <!-- <header class="Header">
        <form action="logincode.php" method="POST">
        <div class="form">
            <i class="fa-regular fa-envelope"></i>
            ENTER EMAIL: <input type="email" name="email" id="email"  >
        </div>
        <div class="form">
            ENTER PASSWORD: <input type="password" name="password" id="password" >
            <i class="fa-solid fa-eye"></i>
        </div>
        <div class='pass'>
            <a class='pass' href="http://localhost/project/forgot_password/reset_password.php">Forgot password?</a>
        </div>
        <div class="btn">
            <input type="submit"name="log_btn"value="LOGIN" id="b" >
        </div>
        </form>

        <h5 class='dis'>
            Did not recieve your verification email?
            <a class='dis' href="http://localhost/project/resend_email_verification/resend_email_verification.php">RESEND</a>
        </h5>

        <h5 class='dis'>
            Did not register?
            <a class='dis' href="register.php">REGISTER</a>
        </h5>
    </header> -->

    <div class="container-fluid p-0">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#">Cloth Compass</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
    <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">About</a>
          </li>

        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost/project/home/register.php">Register</a>
          </li>
</ul>
    </div>
  </div>
</nav>

</div>

   <div class="container my-5 p-3 w-50 bg-light ">

   <div class=" form-outline row mb-3  m-auto " >

            <!-- <h3 class="text-center">Register</h3> -->
            <p class="text-center fw-bolder fs-3 text-secondary mb-0">LOGIN</p>
        </div>

    <form action="logincode.php" method="post">

            
        <div class="form-outline row mb-3 m-auto">

            <label for="email" class="col-sm-1 col-form-label">Email: </label>
            <div class="col-sm-10">
            <input type="email" class="form-control" name="email" placeholder="enter your emailID" required="required" id="email">
            </div>
            
        </div>

        <div class="form-outline row mb-3 m-auto">

            <label for="password" class="col-sm-2 col-form-label pe-0">Password: </label>
            <div class="col-sm-9">
            <input type="password" class="form-control" name="password" placeholder="enter password" required="required" id="password">
            </div>
            
        </div>

        <div class="form-outline row md-4 m-auto ">
            <div class="col-sm-10 my-1">
            <p class="mb-0">
            <a href="http://localhost/project/forgot_password/reset_password.php" style="text-decoration:none" class="text-secondary">Forgot password?</a></p>
            </div>
        </div>

        <div class="form-outline row md-4 m-auto mb-0 ">
            <div class="col-sm-10 my-2">
            <p class="mb-0">Did not recieve verification email?
            <a href="http://localhost/project/resend_email_verification/resend_email_verification.php" style="text-decoration:none" class="text-secondary">RESEND</a></p>
            </div>
        </div>
        

        <div class="form-outline row md-2 m-auto text-center ">
            <div class="col-sm-12">
            <input type="submit" class="btn btn-secondary mx-1 my-2" name="log_btn" value="LOGIN" id="b">
            <input type="reset" class="btn btn-secondary mx-1 my-2"  value="RESET" id="b">
            </div>
        </div>

        <div class="form-outline row md-4 m-auto text-center">
            <div class="col-sm-12 my-2">
            <p class="mb-0">Did not register?
            <a href="register.php" style="text-decoration:none" class="text-secondary my-2">REGISTER</a></p>
            </div>
            
        </div>

    </form>
   </div>

</body>
</html>