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
        <li class="nav-item">
        <nav class="navbar navbar-expand-lg navbar-dark bg-body-tertiary" >
    <div class="dropdown">
  <button class="btn btn-dark dropdown-toggle " type="button" id="dropdownMenu" data-bs-toggle="dropdown">
  <?php
                        echo" Welcome " .$_SESSION['user_name']. " "
                    ?></button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
    <?php 
      $user_id=$_SESSION['user_id'];
    ?>
    <li><a class="dropdown-item" href="http://localhost/project/update_details.php?user_id=<?php echo"$user_id"?>">Update details</a></li>
    <div class="dropdown-divider"></div>
    <li><a class="dropdown-item" href="http://localhost/project/home/logout.php">Log out</a></li>
      </ul>
</div>
      </nav>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>

<!--second child-->
<div class=" mt-3">
    <h3 class="text-center ">
        Manage Details
    </h3>
</div>

<!--third child-->
<div class="row ">
    <div class="col-md-12  p-4 d-flex text-center justify-content-center">
        
        <div class="button text-center">
            <button ><a href="insert_products.php" class="nav-link text-dark bg-transparent my-1 p-2">Insert products</a>
        </button>
        <button><a href="view_products.php" class="nav-link text-dark bg-transparent my-1 p-2">View/update products</a>
        </button>
        <button><a href="dashboardA.php?view_category" class="nav-link text-dark bg-transparent my-1 p-2">View categories</a>
        </button>
        <button><a href="dashboardA.php?insert_category" class="nav-link text-dark bg-transparent my-1 p-2">Insert Categories</a>
        </button>
        <button><a href="dashboardA.php?view_brand" class="nav-link text-dark bg-transparent my-1 p-2">View brands</a>
        </button>
        <button><a href="dashboardA.php?insert_brand" class="nav-link text-dark bg-transparent my-1 p-2">Insert brands</a>
        </button>
        </div>
    </div>
</div>

<!-- fourth child -->
<!-- <div class="container my-3"> -->
  <?php
    if(isset($_GET['insert_category']))
    {
      include('C:\xampp\htdocs\Project\admin\insert_categories.php');
    }
                
  ?>
<!-- </div> -->

<!-- <div class="container my-3"> -->
  <?php
    if(isset($_GET['insert_brand']))
    {
      include('C:\xampp\htdocs\Project\admin\insert_brands.php');
    }
                
  ?>
<!-- </div> -->
<!-- <div class="container my-3"> -->
  <?php
    if(isset($_GET['view_category']))
    {
      include('C:\xampp\htdocs\Project\admin\view_categories.php');
    }
                
  ?>
<!-- </div> -->
<!-- <div class="container my-3"> -->
  <?php
    if(isset($_GET['view_brand']))
    {
      include('C:\xampp\htdocs\Project\admin\view_brands.php');
    }
                
  ?>
<!-- </div> -->

<!--last child-->
<?php
include("../includes/footer.php");
?>

</div>

</body>
</html>