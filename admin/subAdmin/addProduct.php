<?php
    include ('../../config/conn.php');
?>

<link rel="stylesheet" href="/specsbazaar/css/style1.css">
<div class="main-content">
    <div class="wrapper">
        <?php 
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <section class="registration">

        <div class="signup-form-container">

        <form action="" method="POST" enctype="multipart/form-data">
        
            <table class="tbl-30">
                <tr>
                    <td><p>Product Code:  </p></td>
                    <td>
                        <input type="number" name="product_code" placeholder="Enter Product Code">
                    </td>
                </tr>

                <tr>
                    <td><p>Title:  </p></td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the Product">
                    </td>
                </tr>

                <tr>
                    <td><p>Description:  </p></td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of the Product."></textarea>
                    </td>
                </tr>

                <tr>
                    <td><p>Price:  </p></td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td><p>Discounted Price:  </p></td>
                    <td>
                        <input type="number" name="discounted_price">
                    </td>
                </tr>
                <tr>
                    <td><p>Discount:  </p></td>
                    <td>
                        <input type="number" name="discount">
                    </td>
                </tr>
                <tr>
                    <td><p>Select Image:  </p></td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td><p>Brand:  </p></td>
                    <td>
                        <input type="text" name="brand" placeholder="Brand of the Product">
                    </td>
                </tr>
                <tr>
                    <td><p>Color:  </p></td>
                    <td>
                        <input type="text" name="color" placeholder="Color of the Product">
                    </td>
                </tr>

                <tr>
                    <td><p>Category:  </p></td>
                    <td>
                        <select name="category">

                            <?php
                                $sql = "SELECT * FROM category WHERE active='Yes'";
                                $res = mysqli_query($conn, $sql);
                                $count = mysqli_num_rows($res);

                                if($count>0)
                                {
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?>

                                        <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td><p>New Arrival:  </p></td>
                    <td>
                        <input type="radio" id="cmpo" name="new_arrival" value="Yes"> Yes 
                        <input type="radio" id="cmpo" name="new_arrival" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td><p>Featured:  </p></td>
                    <td>
                        <input type="radio" id="cmpo" name="featured" value="Yes"> Yes 
                        <input type="radio" id="cmpo" name="featured" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td><p>Popular:  </p></td>
                    <td>
                        <input type="radio" id="cmpo" name="popular" value="Yes"> Yes 
                        <input type="radio" id="cmpo" name="popular" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td><p>Active:  </p></td>
                    <td>
                        <input type="radio" id="cmpo" name="active" value="Yes"> Yes 
                        <input type="radio" id="cmpo" name="active" value="No"> No
                    </td>
                </tr>
                <tr>
                    <td><p>Recommend:  </p></td>
                    <td>
                        <input type="radio" id="cmpo" name="recommend" value="Yes"> Yes 
                        <input type="radio" id="cmpo" name="recommend" value="No"> No
                    </td>
                </tr>

            </table>

            <input type="submit" name="submit" value="Add Product" class="addButton btn">

        </form>

        
        <?php 
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                $product_code = $_POST['product_code'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $discounted_price = $_POST['discounted_price'];
                $discount = $_POST['discount'];
                $category = $_POST['category'];
                $brand = $_POST['brand'];
                $color = $_POST['color'];

                if(isset($_POST['new_arrival']))
                {
                    $new_arrival = $_POST['new_arrival'];
                }
                else
                {
                    $new_arrival = "No"; 
                }
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No"; 
                }
                if(isset($_POST['recommend']))
                {
                    $recommend = $_POST['recommend'];
                }
                else
                {
                    $recommend = "No"; 
                }
                if(isset($_POST['popular']))
                {
                    $popular = $_POST['popular'];
                }
                else
                {
                    $popular = "No"; 
                }
                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No"; 
                }

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name!="")
                    {
                        $tmp =explode('.', $image_name);
                        $ext = end($tmp);

                        $image_name = "Product-".rand(0000,9999).".".$ext;
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../../images/products/".$image_name;
                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            ?>
                            <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/addProduct.php'</script>;
                            <?php
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; 
                }
                $publisher = $_SESSION['subAdmin'];
                $banner = 'No';
                $sql2 = "INSERT INTO products SET 
                    title = '$title',
                    product_code = '$product_code',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    color = '$color',
                    brand = '$brand',
                    publisher = '$publisher',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active',
                    popular = '$popular',
                    discounted_price = $discounted_price,
                    new_arrival = '$new_arrival',
                    recommend = '$recommend',
                    banner = '$banner',
                    discount = $discount
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>Product Added Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/products.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['add'] = mysqli_error($conn);
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/addProduct.php'</script>;
                    <?php
                }
            }
        ?>
    </div>
</div>