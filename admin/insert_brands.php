<?php

include('../includes/connect.php');
if(isset($_POST['insert_brand']))//if the submit button is clicked
{
    $brand_title=$_POST['Brand_title'];

    //select data from database to avoid duplicate entries
    $select_query="select * from brands where brand_title='$brand_title'";
    $result_select=mysqli_query($con,$select_query);
    $count=mysqli_num_rows($result_select);
    if($count>0)
    {
        echo "<script>alert('This brand already exists.')</script>";
        exit();
    }
    else
    {
      $insert_query="insert into brands (brand_title) values ('$brand_title')";
      $result=mysqli_query($con,$insert_query);
      if($result)
      {
          echo "<script>alert('New brand has been inserted successfully!')</script>";
          // echo "<script>window.open('index.php?view_cats','_self')</script>";
      }
  }
}
?>

<h2 class="text-center p-1">Insert Brands</h2>
<form action="" method="post" class="md-2">
<div class="input-group w-50 m-auto">
  <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="Brand_title" placeholder="Enter brand name" aria-label="Brands" aria-describedby="basic-addon1">
</div>

<div class="input-group w-50 m-auto">
  <input type="submit" class=" bg-light border-0 p-2 my-2" name="insert_brand" value="Insert brand" >
  
</div>

</form>