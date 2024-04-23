<?php

include('../includes/connect.php');
if(isset($_POST['insert_cat']))//if the submit button is clicked
{
    $category_title=$_POST['cat_title'];

    //select data from database to avoid duplicate entries
    $select_query="select * from categories where category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $count=mysqli_num_rows($result_select);
    if($count>0)
    {
        echo "<script>alert('This category already exists.')</script>";
        exit();
    }
    else
    {
      $insert_query="insert into categories (category_title) values ('$category_title')";
      $result=mysqli_query($con,$insert_query);
      if($result)
      {
          echo "<script>alert('New category has been inserted successfully!')</script>";
          // echo "<script>window.open('index.php?view_cats','_self')</script>";
      }
  }
}
?>

<h2 class="text-center p-1">Insert Categories</h2>
<form action="" method="post" class="md-2">
<div class="input-group w-50 m-auto">
  <span class="input-group-text bg-light" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Enter category name" aria-label="Categories" aria-describedby="basic-addon1">
</div>

<div class="input-group w-50 m-auto">
  <input type="submit" class=" bg-light border-0 p-2 my-2" name="insert_cat" value="Insert category" >
  
</div>

</form>