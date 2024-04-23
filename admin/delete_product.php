<?php

include("../includes/connect.php");

//confirm pop up box to ask to delete or not
if(isset($_GET['delete_product']))
{
    $delete_id=$_GET['delete_product'];
    $delete_product="select * from products where product_ID='$delete_id'";
    $run_delete=mysqli_query($con,$delete_product);
    $row_delete=mysqli_fetch_array($run_delete);
    $product_image1=$row_delete['product_image1'];
    $product_image2=$row_delete['product_image2'];
    $product_image3=$row_delete['product_image3'];
    $delete_query="delete from products where product_ID='$delete_id'";
    if(mysqli_query($con,$delete_query))
    {
        unlink("./product_images/$product_image1");
        unlink("./product_images/$product_image2");
        unlink("./product_images/$product_image3");
        echo "<script>alert('Product has been deleted!')</script>";
        echo "<script>window.open('view_products.php','_self')</script>";
    }
    else
    {
        echo "<script>alert('Product has not been deleted!')</script>";
        echo "<script>window.open('view_products.php','_self')</script>";
    }
}
?>