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
                
                <div class="contain">
                    <p>Title: </p>
                    <input type="text" name="title" placeholder="Title of the Product">
                </div>

                <div class="contain">
                    <p>Description: </p>
                    <textarea name="description" cols="30" rows="5" placeholder="Description of the Product."></textarea>
                </div>    

               
                <div class="contain">    
                    <p>Price: </p>
                    <input type="number" name="price">
                </div>    
                 
                <div class="contain">
                    <p>Select Image: </p>
                        <input type="file" name="image">
                </div>

                <div class="contain">
                    <p>Brand: </p>
                        <input type="text" name="brand" placeholder="Brand of the Product">
                </div>
                
                <div class="contain">
                    <p>Color: </p>
                    
                     <input type="text" name="color" placeholder="Color of the Product">
                    
                </div>

                <div class="contain">
                    <p>Category: </p>
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
                </div>
                </table>

                        <input type="submit" name="submit" value="Add Product" class="addButton btn">

        </form>

        </div>

        </section>

        
        <?php 

            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $category = $_POST['category'];
                $color = $_POST['color'];
                $brand = $_POST['brand'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    if($image_name!="")
                    {
                        $tmp =explode('.', $image_name);
                        $ext = end($tmp);
                        $image_name = "Inventory-".rand(0000,9999).".".$ext; 
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../../images/inventory/".$image_name;
                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            ?>
                            <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/addInventory.php'</script>;
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
                $sql2 = "INSERT INTO inventory SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    color = '$color',
                    brand = '$brand',
                    publisher = '$publisher',
                    category_id = $category
                ";

                $res2 = mysqli_query($conn, $sql2);
                if($res2 == true)
                {
                    $_SESSION['add'] = "<div class='success'>Product Added Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/manageInventoryProducts.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['add'] = "<div class='error'>Failed to Add Product.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/manageInventoryProducts.php'</script>;
                    <?php
                }
                
                
            }

        ?>


    </div>
</div>