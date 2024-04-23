


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products - Admin dashboard</title>
    <link rel="stylesheet" href="http://localhost/project/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body class ="bg-light">

<?php
session_start();
include("../includes/connect.php");
?>

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

<?php
include("../includes/connect.php");
if(isset($_GET['product_id']))
{
    $product_id=$_GET['product_id'];
    $get_product="select * from products where product_ID='$product_id'";
    $run_product=mysqli_query($con,$get_product);
    $row_product=mysqli_fetch_assoc($run_product);
    $product_title=$row_product['product_title'];
    $product_description=$row_product['product_description'];
    $product_keywords=$row_product['product_keywords'];
    $product_price=$row_product['product_price'];
    $product_image1_p=$row_product['product_image1'];
    $product_image2_p=$row_product['product_image2'];
    $product_image3_p=$row_product['product_image3'];
    $category_id=$row_product['category_ID'];
    $brand_id=$row_product['brand_ID'];
    $store_name=$row_product['store_name'];
    $store_address=$row_product['store_address'];
    $status = $row_product['status'];

    //fetching category title
    $select_category="select * from categories where category_ID='$category_id'";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];

    //fetching brand title
    $select_brand="select * from brands where brand_ID='$brand_id'";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
}

//editing products
if(isset($_POST['edit_btn']))
{
    $admin_id = $_SESSION['user_id'];
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_categories=$_POST['product_categories'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $store_name=$_POST['store_name'];
    $store_address = $_POST['store_address'];
    $product_status=$_POST['product_status'];

    //accessing names
    $product_image1 =$_FILES['product_image1']['name'];
    $product_image2 =$_FILES['product_image2']['name'];
    $product_image3 =$_FILES['product_image3']['name'];

     //accessing temp names
     $tmp_image1=$_FILES['product_image1']['tmp_name'];
     $tmp_image2=$_FILES['product_image2']['tmp_name'];
     $tmp_image3=$_FILES['product_image3']['tmp_name'];

    if($product_image1=='')
    {
        $product_image1=$product_image1_p;
    }
    if($product_image2=='')
    {
        $product_image2=$product_image2_p;
    }
    if($product_image3=='')
    {
        $product_image3=$product_image3_p;
    }

     if( $product_title=='' or $product_description=='' or $product_keywords=='' or $product_categories=='' or $product_brands=='' or  $product_price=='' or $store_name=='' or $store_address=='')
    {
        echo "<script>alert('Please fill all the fields.')</script>";
        exit();
    }

    else
    {
        //uploading images to its folder
        move_uploaded_file($tmp_image1,"./product_images/$product_image1");
        move_uploaded_file($tmp_image2,"./product_images/$product_image2");
        move_uploaded_file($tmp_image3,"./product_images/$product_image3");

        $update_product="update products set product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',category_ID='$product_categories',brand_ID='$product_brands',product_price='$product_price',store_name='$store_name',store_address='$store_address',status='$product_status', date=NOW() where product_ID='$product_id' and admin_ID='$admin_id'";
        $run_update=mysqli_query($con,$update_product);
        if($run_update)
        {
            echo "<script>alert('Product updated successfully')</script>";
            // echo "<script>window.open('view_products.php','_self')</script>";
            header("Location: view_products.php");
            
        }
        else
        {
            echo "<script>alert('Product not updated successfully')</script>";
            echo "<script>window.open('view_products.php','_self')</script>";
        }
    
    }

}
?>

<div class="container my-3 py-3 ps-5 pe-5 bg-light w-50 opacity-100">
        <h2 class="text-center mb-3 fs-4 fw-bold text-secondary" style="text-decoration:none">
            * EDIT PRODUCT DETAILS *
        </h2>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!--title-->
            <div class="form-outline row mb-3  m-auto ">
                <label for="product_title" class="col-sm-2 col-form-label ps-1">Product title:</label>
                <div class="col-sm-10">
                <input type="text" name="product_title" id="product_title" class="form-control " placeholder="Enter product title" autocomplete="off" required="required" value="<?php echo $product_title?>">
                </div> <!-- id and for attribute should be same , autocomplete off is for not getting any suggestions-->
            </div>

            <div class="form-outline row mb-3 m-auto ">
            <div class="col-6 ">
                <!--description-->
                <label for="product_description" class="row form-label ps-1">Product description:</label>
                <div class="row">
                <textarea name="product_description" id="product_description" class="form-control me-1" autocomplete="off" required="required"><?php echo $product_description?></textarea>
                </div> <!-- id and for attribute should be same , autocomplete off is for not getting any suggestions-->
            </div>
            <div class="col-6">
                <!--keyword-->
            <label for="product_keywords" class="row form-label ps-2">Product keywords:</label>
            <div class="row">
            <textarea name="product_keywords" id="product_keywords" class="form-control ms-1"  autocomplete="off" required="required"><?php echo $product_keywords?></textarea>
                </div><!-- id and for attribute should be same , autocomplete off is for not getting any suggestions-->
            </div>
            </div>

            <div class="form-outline row mb-3 m-auto ">
            <div class="col-6 p-0">
                <!--category-->
            <select name="product_categories" id="" class="form-select me-1 text">
                    <option value="<?php echo $category_id?>"><?php echo $category_title?></option>
                    <?php
                        $select_query="select * from categories";
                        $result=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_array($result))
                        {
                            $category_id=$row['category_ID'];
                            $category_title=$row['category_title'];
                            echo "<option value='$category_id'>$category_title</option>";// value will be stored in the database
                        }

                    ?>
                    <!-- <option value="">category 1</option> -->
                </select>
                </div>
                <div class="col-6 p-0 ">
                    <!--brands-->
                <select name="product_brands" id="" class="form-select ms-1">
                    <option value="<?php echo $brand_id?>"><?php echo $brand_title?></option>
                    <?php
                        $select_query="select * from brands";
                        $result=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_array($result))
                        {
                            $brand_id=$row['brand_ID'];
                            $brand_title=$row['brand_title'];
                            echo "<option value='$brand_id'>$brand_title</option>";// value will be stored in the database
                        }

                    ?>
                </select>
                    </div>
                </div>

                <div class="form-outline row mb-3 m-auto ">
            <div class="col-6 p-0">
                <!--store name-->
                <label for="store_name" class="form-label ps-1">Store name:</label>
                <input type="text" name="store_name" id="store_name" class="form-control me-1" placeholder="Enter store name" autocomplete="off" required="required"value="<?php echo $store_name?>"> <!-- id and for attribute should be same , autocomplete off is for not getting any suggestions-->
                </div>
                <div class="col-6 p-0">
                    <!--store_address-->
                    <label for="store_address" class="form-label ps-2">Store_address:</label>   
                <textarea name="store_address" id="store_address" class="form-control ms-1" placeholder="Enter store address" autocomplete="off" required="required" ><?php echo $store_address?></textarea>
                    </div>
                </div>

                <div class="form-outline row mb-3 m-auto ">
            <div class="col-12 p-0 ">
            <!--image 1-->
                <label for="product_image1" class="form-label ps-1">Product image 1:</label>
                <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control me-2 w-50 my-auto" > 
                <img class="product_img float-end "src="http://localhost/project/admin/product_images/<?php echo $product_image1_p?>" alt="">
                </div>
            </div>
                    </div>

                    <div class="form-outline row mb-3 m-auto ">
            <div class="col-12 p-0 ">
            <!--image 2-->
                <label for="product_image2" class="form-label ps-1">Product image 2:</label>
                <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control me-1 w-50 my-auto" >
                <img class="product_img float-end "src="http://localhost/project/admin/product_images/<?php echo $product_image2_p?>" alt="">
                </div>
            </div>
            </div>
            
            <div class="form-outline row mb-3 m-auto ">
            <div class="col-12 p-0 ">
            <!--image 3-->
                <label for="product_image3" class="form-label ps-1">Product image 3:</label>
                <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" class="form-control me-1 w-50 my-auto"> 
                <img class="product_img float-end "src="http://localhost/project/admin/product_images/<?php echo $product_image3_p?>" alt="">
                </div>
            </div>
                    </div>
            <div class="form-outline row mb-3 m-auto ">
            <div class="col-6 p-0 ">
            <!--price-->
                <label for="product_price" class="form-label ps-2">Product price:</label>
                <input type="text" name="product_price" id="product_price" class="form-control me-1" placeholder="Enter product price" autocomplete="off" required="required" value="<?php echo $product_price?>"> 
            </div>

            <div class="col-6 p-0 ">
            <!--status-->
            <label for="product_status" class="form-label ps-2">Product status:</label>
            <?php 
            if($status =='true ')
            $status_print="Available";
            else
            $status_print="Not Available";
            ?>

            <select name="product_status" id="product_status" class="form-select ms-1 text">
                    <option value="<?php echo $status?>"><?php echo $status_print?></option>
                    <option value="true">Available</option>
                    <option value="false">Not available</option>
                    
                </select>

            </div>

            <!--sumbit-->
            <div class="form-outline mb-2 mt-1 text-center m-auto">
                <input type="submit" name = "edit_btn" class="btn btn-secondary md-3 px-3 w-25" value="Update product">
            </div>

        </form>
    </div>  

</body>
</html>