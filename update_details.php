<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title> 
    <link rel="stylesheet" href="http://localhost/project/styles.css">
    <!-- <link rel="stylesheet" href="http://localhost/project/style_dash.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        /* body
        {
            background: url('images/dash2.jpg') no-repeat;
            background-size: cover;
            background-position: center;
        } */
    </style>
    
</head>
<body>
    <?php
    // session_destroy();
    session_start();
    if($_SESSION['authenticated']!= TRUE)
    {
      // $_SESSION['status']="Please login to access dashboard.";
      // header("Location: http://localhost/project/home/login.php");
      echo "<script>alert('Please login to access dashboard.')</script>";
            echo "<script>window.open('http://localhost/project/home/login.php','_self')</script>";
      exit(0);
    }
    // include('C:\xampp\htdocs\Project\home\authentication.php');
    ?>
    <!-- </div> -->

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
        
        <?php
        if($_SESSION['mode']=='A')
        {
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='http://localhost/project/admin/dashboardA.php'>Go back</a>
          </li>";
        }
        else
        {
            echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='http://localhost/project/user/dashboardU.php'>Go back</a>
          </li>";
        }
        ?>
</ul>
    </div>
  </div>
</nav>

</div>
<?php
include('C:\xampp\htdocs\Project\includes\connect.php');

if(isset($_GET['user_id']))
{
    $user_id=$_GET['user_id'];
    $get_user="select * from user where ID='$user_id'";
    $run_user=mysqli_query($con,$get_user);
    $row_user=mysqli_fetch_assoc($run_user);
    $name=$row_user['Name'];
    $hash=$row_user['Password'];
    $email=$row_user['Email'];
    $mode = $row_user['Mode'];
    
}

// editing products
if(isset($_POST['update_btn']))
{
    $admin_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($password == "")
    {
        $update_details = "update user set Name='$name', Email='$email' , Password='$hash' where ID='$user_id' ";
        $run_update_details = mysqli_query($con,$update_details);
    }
    else
    {
        $hash_value = password_hash($password, PASSWORD_BCRYPT);
        $update_details = "update user set Name='$name', Email='$email' , Password='$hash_value' where ID='$user_id' ";
        $run_update_details = mysqli_query($con,$update_details);

    }
    if($run_update_details)
        {
            $_SESSION['user_name']= $name;
            echo "<script>alert('Details updated successfully')</script>";
            // header("Location: update_details.php");
            if($mode == "A")
            {
                // header("Location: http://localhost/project/admin/dashboardA.php");
                echo "<script>window.open('http://localhost/project/admin/dashboardA.php','_self')</script>";
            }
            else
            {
                // header("Location: http://localhost/project/user/dashboardU.php");
                echo "<script>window.open('http://localhost/project/user/dashboardU.php','_self')</script>";                
            }
        }
        else
        {
            echo "<script>alert('Product not updated successfully')</script>";
            if($mode == "A")
            {
                header("Location: http://localhost/project/admin/dashboardA.php");
            }
            else
            {
                header("Location: http://localhost/project/user/dashboardU.php");
            }
        }
    

}
?>
<script>
function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("cpassword").value;
    if(password == "")
    {
        return true;
    }
    else{
    var letters = /[a-zA-Z]/;
    var numbers = /[0-9]/;
    var mode = document.querySelector('input[name="mode"]:checked');
    if (password.length < 4 || !letters.test(password) || !numbers.test(password)) {
        alert("Password must contain at least 4 letters and at least 1 number");
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
}
</script>

<div class="container my-3 py-3 ps-5 pe-5 bg-light w-50 opacity-100">
        <h2 class="text-center mb-3 fs-4 fw-bold text-secondary" style="text-decoration:none">
            * EDIT PERSONAL DETAILS *
        </h2>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data" onsubmit=" return validatePassword(); ">
            <!--title-->
            <div class="form-outline row mb-3  m-auto ">
                <label for="name" class="col-sm-2 col-form-label ps-1">Name:</label>
                <div class="col-sm-10">
                <input type="text" name="name" id="name" class="form-control " placeholder="Enter product title" autocomplete="off" required="required" value="<?php echo $name?>">
                </div> <!-- id and for attribute should be same , autocomplete off is for not getting any suggestions-->
            </div>

            <div class="form-outline row mb-3  m-auto ">
                <label for="email" class="col-sm-2 col-form-label ps-1">Email:</label>
                <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control " placeholder="" autocomplete="off" required="required" value="<?php echo $email?>">
                </div> <!-- id and for attribute should be same , autocomplete off is for not getting any suggestions-->
            </div>

            <div class="form-outline row mb-3  m-auto ">
                <label for="password" class="col-sm-2 col-form-label pe-0 ps-1">New password:</label>
                <div class="col-sm-10">
                <input type="password" name="password" id="password" class="form-control " placeholder="at least 4 letters and 1 number" autocomplete="off"  value="">
                </div> <!-- id and for attribute should be same , autocomplete off is for not getting any suggestions-->
            </div>

            <div class="form-outline row mb-3  m-auto ">
                <label for="email" class="col-sm-2 col-form-label pe-0 ps-1">Confirm passowrd:</label>
                <div class="col-sm-10">
                <input type="password" name="cpassword" id="cpassword" class="form-control mt-1" placeholder="re-enter password" autocomplete="off"  value="">
                </div> <!-- id and for attribute should be same , autocomplete off is for not getting any suggestions-->
            </div>

            <!--sumbit-->
            <div class="form-outline mb-2 mt-1 text-center m-auto">
                <input type="submit" name = "update_btn" class="btn btn-secondary md-3 px-3 w-25" value="Update details">
            </div>

        </form>
    </div>  

<!--last child-->
<?php
include('C:\xampp\htdocs\Project\includes\footer.php');
?>



</div>

</body>
</html>