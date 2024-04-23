<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <link rel="stylesheet" href="http://localhost/project/style.css">
    <script src="http://localhost/project/home/script.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nanum+Myeongjo&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 

</head>
<body>
    <?php
        session_start();
    ?>

    <!-- <header class="Header">
        <form action="code.php" method="POST">
        <div class="form">
            ENTER NAME: <input type="text" name="name" id="name">
        </div>
        <div class="form">
            ENTER EMAIL: <input type="email" name="email" id="email">
        </div>
        <div class="form">
            SET PASSWORD: <input type="password" name="password" id="password">
        </div>
        <div class="mode">
            Admin <input type="radio" name="mode" id="admin" value="A" style="width:50px;">
            User <input type="radio" name="mode" id="user"value="U" style="width:50px;">
        </div>
        <div class="dis">
            A verification link will be sent to the entered email
        </div>
        <div class="btn">
            <input type="submit"name="reg_btn"value="REGISTER" id="b" >
        </div>
        <div class="dis">
            Already registered?
            <a class="dis" href="login.php">LOGIN</a>
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
            <p class="text-center fw-bolder fs-3 text-secondary mb-0">REGISTRATION FORM</p>
        </div>
<!-- <script>
function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cpassword").value;
    var letters = /[a-zA-Z]/;
    var numbers = /[0-9]/;
    if (password.length < 4 || !letters.test(password) || !numbers.test(password)) {
        alert("Password must contain at least 4 letters and at least 1 number");
        return false;
    }
    else{
        if (password != confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }
    else
    {
    return true;
    }
    }
}
</script> -->
<script>
function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cpassword").value;
    var letters = /[a-zA-Z]/;
    var numbers = /[0-9]/;
    var mode = document.querySelector('input[name="mode"]:checked');
    if (password.length < 4 || !letters.test(password) || !numbers.test(password)) {
        alert("Password must contain at least 4 letters and at least 1 number");
        return false;
    } else if (!mode) {
        alert("Please select a mode");
        return false;
    } else {
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        } else {
            return true;
        }
    }
}
</script>



    <form action="code.php" method="post" id="form" onsubmit=" return validatePassword(); ">


        <div class=" form-outline row mb-3  m-auto ">

            <label for="name" class="col-sm-1 col-form-label">Name: </label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="enter your name" required="required" id="name" autocomplete="off">
            <!-- <small >error message will be displayed her</small> -->
        </div>
            
        </div>
            
        <div class="form-outline row mb-3 m-auto">

            <label for="email" class="col-sm-1 col-form-label">Email: </label>
            <div class="col-sm-10">
            <input type="email" class="form-control" name="email" placeholder="enter your emailID" required="required" id="email">
            </div>
            
        </div>

        <div class="form-outline row mb-3 m-auto">

            <label for="password" class="col-sm-2 col-form-label pe-0">Set password: </label>
            <div class="col-sm-9">
            <input type="password" class="form-control" name="password" placeholder="at least 4 letters and 1 number" required="required" id="password">


            
         <!-- <?php
            if(isset($_POST['password']) && strlen($_POST['password']) < 4) {
                echo "<small class='text-danger'>Password must have at least 4 letters</small>";
            }
        ?> -->
            </div>
            
        </div>

        <div class="form-outline row mb-3 m-auto">

            <label for="cpassword" class="col-sm-2 col-form-label pe-0">Confirm password: </label>
            <div class="col-sm-9">
            <input type="password" class="form-control my-2" name="cpassword" placeholder="re-enter password" required="required" id="cpassword" >
            </div>
            
        </div>

        <div class="form-outline row md-4 m-auto">

        <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="mode" id="admin" value="A" >
        <label class="form-check-label" for="admin">
          Admin
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="mode" id="user" value="U">
        <label class="form-check-label" for="user">
          User
        </label>
      </div>
        </div>
        </div>

        <div class="form-outline row mt-2 mb-0 m-auto">
            <div class="col-sm-12">
            <p class="mb-0 my-2">A verification link will be sent to the entered email</p>
            </div>

            </div>  
        <div class="form-outline row md-2 m-auto">
            <div class="col-sm-12">
            <input type="submit" class="btn btn-secondary mx-1 my-3" name="reg_btn" value="REGISTER" id="b">
            <input type="reset" class="btn btn-secondary mx-1 my-3"  value="RESET" id="b">
            </div>
        </div>


        <div class="form-outline row md-4 m-auto ">
            <div class="col-sm-12">
            <p class="">Already registered?
            <a href="login.php" style="text-decoration:none" class="text-secondary">LOGIN</a></p>
            </div>
            
        </div>
    </form>
   </div>
</body>
</html>