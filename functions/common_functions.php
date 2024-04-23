<?php
    //incluiding connect file
    include('C:\xampp\htdocs\Project\includes\connect.php');

    //getting products
    function get_products()
    {
        global $con;

        //condition to check isset or not(is category of brand is set or not)
        if(!isset($_GET['category'])){

        if(!isset($_GET['brand']))
            {
                // $user_id = $_GET['id'];
                $select_query= "select * from products order by rand() limit 0,9";
                    //if you want to display only 9 products then use limit 0,9 in the query
                    $result=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                            $product_id = $row['product_ID'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_image1'];
                            $product_price = $row['product_price'];
                            $brand_id = $row['brand_ID'];
                            $category_id = $row['category_ID'];
                            echo "<div class='col-md-4 mb-3 mt-3'>
                            <div class='card' >
                                <img src='http://localhost/project/admin/product_images/$product_image1' class='card-img-top my-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='http://localhost/project/product_details.php?product_id=$product_id' class='btn btn-secondary'>View info</a>
                                    <a href='http://localhost/project/user/dashboardU.php?add_to_fav=$product_id' class='btn btn-secondary'>Add to favorites <span class='bi bi-star'></span></a>
                            
                                </div>
                                </div>
                            </div>";
                    }
                }
                }
    }

    function get_all_products()
    {
        global $con;

        //condition to check isset or not(is category of brand is set or not)
        if(!isset($_GET['category'])){

        if(!isset($_GET['brand']))
            {
                $select_query= "select * from products order by rand()";
                    //if you want to display only 9 products then use limit 0,9 in the query
                    $result=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                            $product_id = $row['product_ID'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_image1'];
                            $product_price = $row['product_price'];
                            $brand_id = $row['brand_ID'];
                            $category_id = $row['category_ID'];
                            echo "<div class='col-md-4 mb-3 mt-3'>
                            <div class='card' >
                                <img src='http://localhost/project/admin/product_images/$product_image1' class='card-img-top my-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='http://localhost/project/product_details.php?product_id=$product_id' class='btn btn-secondary'>View info</a>
                                    <a href='http://localhost/project/user/dashboardU.php?add_to_fav=$product_id' class='btn btn-secondary'>Add to favorites <span class='bi bi-star'></span></a>
                                </div>
                                </div>
                            </div>";
                    }
                }
                }
    }

    //getting unique categories
    function get_unique_categories()
    {
        global $con;

        //condition to check isset or not(is category of brand is set or not)
        if(isset($_GET['category'])){
            $category_id=$_GET['category'];//storing from url
                $select_query= "select * from products where category_ID='$category_id' ";
                    //if you want to display only 9 products then use limit 0,9 in the query
                    $result=mysqli_query($con,$select_query);
                    $count = mysqli_num_rows($result);
                    if($count==0)
                    {
                        echo "<h2  class=' my-3 bg-light text-center text-danger '>No products found in this category</h2>";
                    }
                    else
                    {
                    while($row=mysqli_fetch_assoc($result))
                    {
                            $product_id = $row['product_ID'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_image1'];
                            $product_price = $row['product_price'];
                            $brand_id = $row['brand_ID'];
                            $category_id = $row['category_ID'];
                            echo "<div class='col-md-4 mb-3 mt-3'>
                            <div class='card' >
                                <img src='http://localhost/project/admin/product_images/$product_image1' class='card-img-top my-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='http://localhost/project/product_details.php?product_id=$product_id' class='btn btn-secondary'>View info</a>
                                    <a href='http://localhost/project/user/dashboardU.php?add_to_fav=$product_id' class='btn btn-secondary'>Add to favorites <span class='bi bi-star'></span></a>
                                </div>
                                </div>
                            </div>";
                
                }
                }
    }
}

    //getting unique brands
    function get_unique_brands()
    {
        global $con;

        //condition to check isset or not(is category of brand is set or not)
        if(isset($_GET['brand'])){
            $brand_id=$_GET['brand'];//storing from url
                $select_query= "select * from products where brand_ID='$brand_id' ";
                    //if you want to display only 9 products then use limit 0,9 in the query
                    $result=mysqli_query($con,$select_query);
                    $count = mysqli_num_rows($result);
                    if($count==0)
                    {
                        echo "<h2  class=' my-3 bg-light text-center text-danger '>No products found in this brand</h2>";
                    }
                    else
                    {
                    while($row=mysqli_fetch_assoc($result))
                    {
                            $product_id = $row['product_ID'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_image1'];
                            $product_price = $row['product_price'];
                            $brand_id = $row['brand_ID'];
                            $category_id = $row['category_ID'];
                            echo "<div class='col-md-4 mb-3 mt-3'>
                            <div class='card' >
                                <img src='http://localhost/project/admin/product_images/$product_image1' class='card-img-top my-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='http://localhost/project/product_details.php?product_id=$product_id' class='btn btn-secondary'>View info</a>
                                    <a href='http://localhost/project/user/dashboardU.php?add_to_fav=$product_id' class='btn btn-secondary'>Add to favorites <span class='bi bi-star'></span></a>
                                </div>
                                </div>
                            </div>";
                
                }
            }
                }
    }


    function get_brands()
    {
        global $con;
        $select_brands = "select * from brands";
                    $result_brands = mysqli_query($con,$select_brands);
                    while($row_brands = mysqli_fetch_array($result_brands))
                    {
                        $brand_id = $row_brands['brand_ID'];
                        $brand_title = $row_brands['brand_title'];
                        echo "<li class='nav-item '>
                        <a href='http://localhost/project/user/dashboardU.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                    </li>";
                    }
    }

    function get_categories()
    {
        global $con;
        $select_categories = "select * from categories";
                    $result_categories = mysqli_query($con,$select_categories);
                    while($row_categories= mysqli_fetch_array($result_categories))
                    {
                        $category_id = $row_categories['category_ID'];
                        $category_title = $row_categories['category_title'];
                        echo "<li class='nav-item '>
                        <a href='http://localhost/project/user/dashboardU.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                    </li>";
                    }
    }

//searching products

function search_products()
{
    global $con;
    if(isset($_GET['search_data_product']))
    {   
                $search_data_value = $_GET['search_data'];
                $search_query ="select * from products where product_keywords like '%$search_data_value%' ";
                    //if you want to display only 9 products then use limit 0,9 in the query
                    $result=mysqli_query($con,$search_query);
                    $count = mysqli_num_rows($result);
                    if($count==0)
                    {
                        echo "<h2  class=' my-3 bg-light text-center text-danger '>No results found</h2>";
                    }
                    else
                    {
                    while($row=mysqli_fetch_assoc($result))
                    {
                            $product_id = $row['product_ID'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_image1'];
                            $product_price = $row['product_price'];
                            $brand_id = $row['brand_ID'];
                            $category_id = $row['category_ID'];
                            echo "<div class='col-md-4 mb-3 mt-3'>
                            <div class='card' >
                                <img src='http://localhost/project/admin/product_images/$product_image1' class='card-img-top my-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='http://localhost/project/product_details.php?product_id=$product_id' class='btn btn-secondary'>View info</a>
                                    <a href='http://localhost/project/user/dashboardU.php?add_to_fav=$product_id' class='btn btn-secondary'>Add to favorites <span class='bi bi-star'></span></a>
                                </div>
                                </div>
                            </div>";
                    }
                }
                }
            
}

function search_products_title()
{
    global $con;
    if(isset($_GET['search_product_title']))
    {   
                $search_data_value = $_GET['search_title'];
                $search_query ="select * from products where product_title='$search_data_value' ";
                // $search_query ="select * from products where product_keywords like '%$search_data_value%' ";
                    //if you want to display only 9 products then use limit 0,9 in the query
                    $result=mysqli_query($con,$search_query);
                    $count = mysqli_num_rows($result);
                    if($count==0)
                    {
                        echo "<h2  class=' my-3 bg-light text-center text-danger '>No results found</h2>";
                    }
                    else
                    {
                    while($row=mysqli_fetch_assoc($result))
                    {
                            // $product_id = $row['product_ID'];
                            $product_title = $row['product_title'];
                            // $product_description = $row['product_description'];
                            $product_image1 = $row['product_image1'];
                            $product_price = $row['product_price'];
                            if($row['status']=='true ')
                                $status="Available";
                                 else
                                $status="Not Available";
                            echo "<table class='table table-bordered text-center w-100 justify-content-center'>
                            <thead>
                                <tr>
                                <th scope='col' class='table-info'>Product Name</th>
                                <th scope='col' class='table-info ' style='width:400px;'>Image</th>
                                <th scope='col' class='table-info'>Product price</th>
                                <th scope='col' class='table-info'>Product status</th>
                                <th scope='col' class='table-info'>Edit</th>
                                <th scope='col' class='table-info'>Delete</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                            <td>$product_title</td>
                            <td>

                                <div class='popup'>
                                    <div class='popup-content'>
                                    <img src='http://localhost/project/admin/product_images/$product_image1' class='card-img-top my-1' alt='$product_title'>
                                    </div>
                                </div>
                                <td>$product_price</td>
                            <td> $status</td>
                            <td><a href='#' class='text-dark'> <i class='bi bi-pencil-square'></i></a></td>
                            <td><a href='#' class='text-dark'><i class='bi bi-trash'></i></a></td>
        
                            </tr>
                            </tbody>
                            </table>
                            
                            ";
                    }
                }
                }
            
}

//view details
function view_details()
{
    global $con;

    if(isset($_GET['product_id'])){
        //condition to check isset or not(is category of brand is set or not)
        if(!isset($_GET['category'])){

        if(!isset($_GET['brand']))
            {
                $product_id = $_GET['product_id'];
                $select_query= "select * from products where product_ID='$product_id'";
                $select_review_query= "select * from reviews where product_ID='$product_id'";
                // $select_query = "select products.*, reviews.comment_content, reviews.added_on, user.Name from products join user on products.admin_ID = user.ID left join reviews  on products.product_ID = reviews.product_ID where products.product_ID='$product_id'";
                $result_review = mysqli_query($con,$select_review_query);
                    $result=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                            $product_id = $row['product_ID'];
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_image1'];
                            $product_image2 = $row['product_image2'];
                            $product_image3 = $row['product_image3'];
                            $product_price = $row['product_price'];
                            $store_name = $row['store_name'];
                            $store_address = $row['store_address'];
                            $brand_id = $row['brand_ID'];
                            $category_id = $row['category_ID'];
                            // $user_name = $row['Name'];
                            // $comment_content = $row['comment_content'];
                            // $added_on = $row['added_on'];
                            
                            echo "
                            <div class='col-md-4 mb-3 mt-3 justify-content-center '>
                            <!--card-->
                            <div class='card' >
                                            <img src='http://localhost/project/admin/product_images/$product_image1' class='card-img-top my-2' alt='$product_title'>
                                            <div class='card-body'>
                                                <h5 class='card-title'>$product_title</h5>
                                                <p class='card-text'>$product_description</p>
                                                <a href='http://localhost/project/user/dashboardU.php?add_to_fav=$product_id' class='btn btn-secondary'>Add to favorites <span class='bi bi-star'></span></a>
                                            </div>
                                            </div>
                        </div>
            
                        <div class='col-md-8 mb-0 mt-3 '>
                        <div class='card' >
                            <!--related info-->
                            <div class='row'>
                                <div class='col-md-12 d-flex justify-content-center'>
                                    <h4 class='text-center m-2 text-secondary border border-secondary w-25'>Information</h4>
                                </div>
                                <div class='col-md-6'>
                                <img src='http://localhost/project/admin/product_images/$product_image2' class='card-img-top p-3 m-2' alt='$product_title'>
                                </div>
                                <div class='col-md-6'>
                                <img src='http://localhost/project/admin/product_images/$product_image3' class='card-img-top p-3 m-2' alt='$product_title'>
                                </div>
                                <div class='col-md-12'>
                                    <p class='text-center m-2 text-secondary'>Store name: $store_name </p>
                                </div><div class='col-md-12'>
                                    <p class='text-center m-2  text-secondary'>Store address: $store_address </p>
                                </div>
                                
                                <div class='col-md-12'>
                                <form action='http://localhost/project/user/comments.php?product_id=$product_id' method='post' enctype='multipart/form-data'>
                                
                                    <div class='form-outline row mb-3 m-auto '>
                                    <div class='col-12'>
                                    <select name='rating' id='' class='form-select me-1 text w-50' required='required'>
                                    <option value=''>Add a rating</option>
                                    <option value='Excellent'>Excellent</option>
                                    <option value='Very good'>Very good</option>
                                    <option value='Good'>Good</option>
                                    <option value='Average'>Average</option>
                                    <option value='Bad'>Bad</option>
                                </select>
                                    </div>
                                    </div>
                                    
                                    <div class='form-outline row mb-3 m-auto '>
                                <div class='col-10 '>
                                    <!--description-->
                                    <label for='review' class='row form-label ps-3'>Enter your review here:</label>
                                    <div class='row'>
                                    <textarea name='review' id='review' class='form-control ms-3' placeholder='Enter your review here' autocomplete='off' required='required'></textarea>
                                    </div> <!-- id and for attribute should be same , autocomplete off is for not getting any suggestions-->
                                </div>
                                <div class='col-2'>
                                    <div class='form-outline  text-center m-auto mt-5'>
                                    <input type='submit' name = 'review_btn' class='btn btn-secondary ' value='Submit' onclick='return confirm('Are you sure?')'>
                                     </div>
                                </div>
                                </div>
                                </form>
                                </div>
                            </div>
                            </div>
                            
                        ";
                    }
                   

                    $select_review_query= "select * from reviews where product_ID='$product_id'";
                    $result_review = mysqli_query($con,$select_review_query);
                    // echo "<div class='col-md-4 my-0 justify-content-center'>
                    //     </div>";
                    // echo "<div class='comments'>";
                    echo "<div class='col-md-12 d-flex justify-content-center bg-light'>
                    <h4 class='text-center m-2 mb-3 text-secondary border border-secondary w-25'>Reviews</h4>
                </div>";
                    while($row=mysqli_fetch_assoc($result_review))
                    {
                        $user_id = $row['user_ID'];
                        $comment_content = $row['comment_content'];
                        $added_on = $row['added_on'];
                        $rating = $row['rating'];
                        $select_user_query = "select * from user where ID=$user_id";
                        $result_user = mysqli_query($con,$select_user_query);
                        $row_user = mysqli_fetch_assoc($result_user);
                        $user_name = $row_user['Name'];
                        echo "
                        <div class='form-outline row mb-0 m-auto bg-light border border-bottom'>
                                    <div class='col-12'>
                                <div class='col-md-12'>
                                    <p class='text-center m-2 text-secondary'> $rating ( $user_name )</p>
                                </div>
                                <div class='col-md-12'>
                                    <p class='text-center m-2 text-secondary'>Added on: $added_on</p>
                                </div>
                                <div class='col-md-12'>
                                    <p class='text-center mb-3 text-secondary'>Review: $comment_content </p>
                                </div>
                            </div>
                            </div>
                        ";
                    }
                    echo "</div>";
                }
                }
            }
}

//cart function
function fav()
{
    if(isset($_GET['add_to_fav']))
    {
        global $con;
        $user_id = $_SESSION['user_id'];
        $product_id = $_GET['add_to_fav'];
        $select_query = "select * from favorites where user_ID='$user_id' AND product_ID='$product_id'";
        $result = mysqli_query($con,$select_query);
        $count = mysqli_num_rows($result);
                    if($count>0)
                    {
                        echo "<script>alert('Product already added to favorites.')</script>";
                        echo "<script>window.open('http://localhost/project/user/dashboardU.php','_self')</script>";
                    }
                    else
                    {
                        $insert_query = "insert into favorites (user_ID,product_ID) values ($user_id,$product_id)";
                        $result = mysqli_query($con,$insert_query);
                        if($result)
                        {
                            echo "<script>alert('Product added to favorites.')</script>";
                            echo "<script>window.open('http://localhost/project/user/dashboardU.php','_self')</script>";
                        }
                        else
                        {
                            echo "<script>alert('Product not added to favorites.')</script>";
                            echo "<script>window.open('http://localhost/project/user/dashboardU.php','_self')</script>";
                        }
                    }
    }
}

//getting nos of fav items
function fav_items()
{
    if(isset($_GET['add_to_fav']))
    {
        global $con;
        $user_id = $_SESSION['user_id'];
        $select_query = "select * from favorites where user_ID='$user_id' ";
        $result = mysqli_query($con,$select_query);
        $count = mysqli_num_rows($result);
                 
    }
    else
    {
        global $con;
        $user_id = $_SESSION['user_id'];
        $select_query = "select * from favorites where user_ID='$user_id' ";
        $result = mysqli_query($con,$select_query);
        $count = mysqli_num_rows($result);
    }
    echo $count;
}

//displaying favorites
function get_fav()
{
    global $con;
                $user_id = $_SESSION['user_id'];
                $select_query = "select * from favorites where user_ID=$user_id ";
                $result=mysqli_query($con,$select_query);
                $count = mysqli_num_rows($result);
                if($count==0)
                {
                    echo "<h2  class=' my-3 bg-light text-center text-danger '>No products found in your wishlist</h2>";
                }
                else
                {
                while($row=mysqli_fetch_assoc($result))
                    {
                            $product_id = $row['product_ID'];

                            $product_query = "select * from products where product_ID='$product_id' ";
                            $result_product_query = mysqli_query($con,$product_query);
                            if($row=mysqli_fetch_assoc($result_product_query)){
                            $product_title = $row['product_title'];
                            $product_description = $row['product_description'];
                            $product_image1 = $row['product_image1'];
                            $product_price = $row['product_price'];
                            $brand_id = $row['brand_ID'];
                            $category_id = $row['category_ID'];
                            echo "<div class='col-md-4 mb-3 mt-3'>
                            <div class='card' >
                                <img src='http://localhost/project/admin/product_images/$product_image1' class='card-img-top my-2' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    <a href='http://localhost/project/product_details.php?product_id=$product_id' class='btn btn-secondary'>View info</a>
                                    <a href='http://localhost/project/display_fav.php?remove_from_fav=$product_id' class='btn btn-secondary'>Remove from favorites <span class='bi bi-star'></span></a>
                            
                                </div>
                                </div>
                            </div>";
                    }
                    }
                }
                
}

//remove favorite function
function remove_fav()
{
    if(isset($_GET['remove_from_fav']))
    {
        global $con;
        $user_id = $_SESSION['user_id'];
        $product_id = $_GET['remove_from_fav'];
        $delete_query = "delete from favorites where user_ID='$user_id' AND product_ID='$product_id'";
        $result = mysqli_query($con,$delete_query);
        if($result)
        {
            echo "<script>alert('Product removed from favorites.')</script>";
            echo "<script>window.open('http://localhost/project/display_fav.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Product not removed from favorites.')</script>";
            echo "<script>window.open('http://localhost/project/display_fav.php','_self')</script>";
        }
        }
}

?>