<?php
session_start();
include("../includes/connect.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products - Admin dashboard</title>
    <link rel="stylesheet" href="http://localhost/project/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
    //   window.location=anchor.attr("href");
    return true;
}
        </script>
</head>
<body class ="bg-light">

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
<!-- <div>
<p class="text-center w-50 p-3">Products
<?php
        echo "
        <div style='width:25%'><form class='d-flex' action='http://localhost/project/admin/search_product_title.php' method='get' role='search'>
            <input class='form-control me-2' type='search' placeholder='Search product title' aria-label='Search' name='search_data'>
            <input type='submit' value='Search' class='btn btn-outline-light' name='search_data_product'>
          </form>
          </div>";
      ?>
      </p>
      </div> -->

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
<table class="table table-bordered text-center w-100 justify-content-center">
    <thead>
        <tr>
        <th scope="col" class="table-info text-center-align">Number</th>
        <th scope="col" class="table-info">Product Name</th>
        <th scope="col" class="table-info " style="width:400px;">Image</th>
        <th scope="col" class="table-info">Product price</th>
        <th scope="col" class="table-info">Product status</th>
        <th scope="col" class="table-info">Edit</th>
        <th scope="col" class="table-info">Delete</th>
        
        </tr>
    </thead>
    <tbody>
        <?php
        $admin_id = $_SESSION['user_id'];
        $get_products="select * from products where admin_ID='$admin_id'";
        $run_products=mysqli_query($con,$get_products);
        $i=0;
        while($row=mysqli_fetch_array($run_products))
        {
            $product_id=$row['product_ID'];
            $product_title=$row['product_title'];
            $product_image=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $product_image3=$row['product_image3'];
            $product_price=$row['product_price'];
            if($row['status']=='true ')
                $status="Available";
            else
                $status="Not Available";
            $i++;
        ?>
        <tr>
        <th scope="row"><?php echo $i; ?></th>
        <td><?php echo $product_title; ?></td>
        <td>

            <div class="popup">
                <div class="popup-content">
                <?php echo "<img src='http://localhost/project/admin/product_images/$product_image' class='card-img-top my-1' alt='$product_title'> "; ?>
                </div>
            </div>
            
        
        </td>
        <td><?php echo $product_price; ?></td>
        <td><?php echo $status; ?></td>
        <td><a href="edit_products.php?product_id=<?php echo $product_id?>" class="text-dark"> <i class="bi bi-pencil-square"></i></a></td>
        <!-- <td><a href="delete_product.php?delete_product=<?php echo $product_id?>" class="text-dark"><i class="bi bi-trash"></i></a></td> -->
        <td><a onclick="return confirm('Are you sure?')" href="delete_product.php?delete_product=<?php echo $product_id?>" class="text-dark"><i class="bi bi-trash"></i></a></td>
        
        </tr>
        <?php } ?>
    </tbody>
</table>
        </div>
</div>  


    <?php
include("../includes/footer.php");
?>

</body>
</html>