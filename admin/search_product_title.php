<?php
include('C:\xampp\htdocs\Project\includes\connect.php');
include('C:\xampp\htdocs\Project\functions\common_functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title> 
    <!-- <link rel="stylesheet" href="http://localhost/project/style_dash.css"> -->
    <link rel="stylesheet" href="http://localhost/project/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

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
<body d-flex flex-column min-vh-100>
    <?php
    // session_destroy();
    session_start();
    // include('C:\xampp\htdocs\Project\home\authentication.php');
    ?>
            

<div class="container-fluid p-0 ">
    <!-- first child -->
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
            <a class="nav-link active" aria-current="page" href="http://localhost/project/admin/dashboardA.php">Dashboard</a>
          </li>
</ul>
    </div>
  </div>
</nav>
</div>

<div class="form-outline row mb-0 m-auto mt-3">
            <!-- <div class="col-6 ">
            <h2 class="text-center w-50 p-3">Products</h2>
            </div> -->
            <div class="col-12 d-flex justify-content-center">
            <h2 class="text-center pe-4">All products</h2>
            
            </div>
            </div>

      <div class="form-outline row mb-2 m-auto mt-0 w-75">
            <!-- <div class="col-6 ">
            <h2 class="text-center w-50 p-3">Products</h2>
            </div> -->
            <div class="col-12 d-flex justify-content-end ">
            <!-- <h2 class="text-center pe-4">Products</h2>  -->
            <div class="w-25">
            <?php
            
        echo "
        <form class='d-flex' action='http://localhost/project/admin/search_product_title.php' method='get' role='search'>
            <input class='form-control me-2' type='search' placeholder='Search product title' aria-label='Search' name='search_title'>
            <input type='submit' value='Search' class='btn btn-outline-light' name='search_product_title'>
          </form>
          ";
      ?>
      </div>
            </div>
            </div>



    <div class="container-fluid px-5 pb-5 w-75 mt-0">
    <?php
                    search_products_title()

                ?>
        </div>


<!--last child-->
<!-- <?php
include('C:\xampp\htdocs\Project\includes\footer.php');
?> -->


<!-- <footer class="fixed-bottom w-100 pt-2 text-center bg-body-tertiary mt-auto footer" data-bs-theme="dark">
            <p class="text-secondary">All rights reserved </p>
            </footer>     -->

</div>


</body>
</html>