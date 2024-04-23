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

<h2 class="text-center p-1">View Brands</h2>
<div class="container-fluid px-5 ">
<table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col" class="table-info">Number</th>
        <th scope="col" class="table-info">Brand title</th>
        <!-- <th scope="col">Edit</th>
        <th scope="col">Delete</th> -->
        
        </tr>
    </thead>
    <tbody>
        <?php
        $get_brands="select * from brands";
        $run_brands=mysqli_query($con,$get_brands);
        $i=0;
        while($row=mysqli_fetch_array($run_brands))
        {
            $brand_id=$row['brand_ID'];
            $brand_title=$row['brand_title'];
            $i++;
        ?>
        <tr>
        <th scope="row"><?php echo $i; ?></th>
        <td><?php echo $brand_title; ?></td>
        <!-- <td><a href="dashboardA.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
        <td><a href="delete_cat.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td> -->
        
        </tr>
        <?php } ?>
    </tbody>
</table>
        </div>