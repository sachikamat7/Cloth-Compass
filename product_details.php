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
    // session_start();
    include('C:\xampp\htdocs\Project\home\authentication.php');
    ?>
            <?php
                if(isset($_SESSION['status']))
                {
                    // echo "<h4 style=\"
                    // font-size: 17px;
                    // padding: 1%;
                    // display: block;
                    // width: 300px;
                    // background-color: rgb(226, 226, 125);;
                    // margin: 100px 30px;
                    // font-family: 'Nanum Myeongjo', serif;
                    // color:rgb(61, 68, 6);
                    // float: left\">" .$_SESSION['status']."</h4>";
                    unset($_SESSION['status']);
                }
            ?>
    <!-- <div class="wel">
        <h4>WELCOME TO THE DASHBOARD</h4>

    </div> -->

    <!-- <h5>Username: <?=$_SESSION['auth_user']['username'];?></h5>
    <h5>Email: <?=$_SESSION['auth_user']['email'];?></h5> -->

<div class="container-fluid p-0 ">
    <!-- first child -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cloth Compass</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/project/user/dashboardU.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/project/display_all.php">Products</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href=""><span class='bi bi-star'></span> <sup><?php fav_items(); ?></sup></a>
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
      <?php
        echo "<form class='d-flex' action='http://localhost/project/search_product.php' method='get' role='search'>
            <input class='form-control me-2' type='search' placeholder='Search' aria-label='Search' name='search_data'>
            <input type='submit' value='Search' class='btn btn-outline-light' name='search_data_product'>
          </form>";
      ?>
      <!-- <form class="d-flex" action="http://localhost/project/search_product.php" method="get" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form> -->
    </div>
  </div>
</nav>

<!-- calling fav function -->
<?php
fav();
?>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary" >
    <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle mx-2" type="button" id="dropdownMenu" data-bs-toggle="dropdown">
  <?php
                        echo" Welcome " .$_SESSION['user_name']. " "
                    ?></button>
  <ul class="dropdown-menu mx-2" aria-labelledby="dropdownMenu">
    <li><a class="dropdown-item" href="#">Update details</a></li>
    <div class="dropdown-divider"></div>
    <li><a class="dropdown-item" href="http://localhost/project/home/logout.php">Log out</a></li>
      </ul>
</div>
      </nav>
      
<!--third child-->
<div class="row mx-1">
    <div class="col-md-10">
        <!--products-->
        <div class="row ">

            
                <!--fetching products-->
                <?php
                view_details();
                    get_unique_categories();
                    get_unique_brands();

                ?>
            
            <!--row end-->
        </div>
        <!--column end-->
    </div>
    <div class="col-md-2 bg-secondary p-0">
        <!--side bar-->
            <ul class="navbar-nav me-auto text-center" >
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h6>Brands</h6></a>
                </li>
                <?php
                    get_brands();

?>
            
            </ul>

            <ul class="navbar-nav me-auto text-center" >
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h6>Categories</h6></a>
                </li>
                <?php
                    get_categories();

?>
            </ul>

    </div>
</div>

<!--last child-->
<?php
include('C:\xampp\htdocs\Project\includes\footer.php');
?>




</div>


</body>
</html>