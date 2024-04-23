<?php
session_start();
include("../includes/connect.php");
if(isset($_POST['review_btn']))
{
    $admin_id = $_SESSION['user_id'];
    $product_id=$_GET['product_id'];
    $review=$_POST['review'];
    $rating=$_POST['rating'];


        //inserting data into database
        $insert_query="insert into reviews ( user_ID, product_ID , comment_content, added_on, rating) values ('$admin_id','$product_id','$review', NOW(), '$rating')";
        $result=mysqli_query($con,$insert_query);
        if($result)
        {
            echo "<script>alert('Review posted')</script>";
            echo "<script>window.open('http://localhost/project/product_details.php?product_id=$product_id','_self')</script>";
        }
        else
        {
            echo "<script>alert('Review not posted')</script>";

        }
    }

?>