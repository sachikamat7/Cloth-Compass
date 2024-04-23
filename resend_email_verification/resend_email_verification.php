<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/project/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
    <title>Email verification</title>
</head>
<body>
<!-- <?php
        session_set_cookie_params(0);
        session_start();
        // include('authentication.php');
    ?> -->
    <!-- <div class="alert">
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
    </div> -->
<!-- <header class="Header">
    <h4> Resend email verification </h4>
        <form action="resend_code.php" method="POST">
        <div class="form">
            ENTER EMAIL: <input type="email" name="email" id="email"  >
        </div>
        <div class="btn">
            <input type="submit"name="verify_btn"value="SUBMIT" id="b" >
        </div>
        </form>
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

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="http://localhost/project/home/login.php">Login</a>
          </li>
</ul>
    </div>
  </div>
</nav>

</div>

<div class="container my-5 p-3 w-50 bg-light">

<div class=" form-outline row mb-3  m-auto " >

         <!-- <h3 class="text-center">Register</h3> -->
         <p class="text-center fw-bold fs-4 text-secondary mb-0">RESEND VERIFICATION LINK</p>
     </div>

 <form action="resend_code.php" method="post">

         
     <div class="form-outline row mb-0 m-auto">

         <label for="email" class="col-sm-1 col-form-label">Email: </label>
         <div class="col-sm-10">
         <input type="email" class="form-control" name="email" placeholder="enter your emailID" required="required" id="email">
         </div>
         
     </div>
     

     <div class="form-outline row md-2 m-auto ">
         <div class="col-sm-12">
         <input type="submit" class="btn btn-secondary mx-1 w-25 text-right" name="verify_btn" value="SEND LINK" id="b">
         <input type="reset" class="btn btn-secondary mx-1 text-right"  value="RESET" id="b">
         </div>
     </div>


 </form>
</div>

</body>
</html>