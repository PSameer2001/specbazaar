<?php include_once('partials/header.php'); ?>

<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM inventory WHERE id='$id'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_owner = $row2['publisher'];
        $brand = $row2['brand'];
        $color = $row2['color'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
    }
    else
    {
        ?>
        <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/manageInventoryProducts.php?id=<?php echo $id ?>';</script>
        <?php
    }
?>

<link rel="stylesheet" href="/specsbazaar/css/style1.css">

<div class="main-content">
    <div class="wrapper">

     <section class="registration">

        <div class="signup-form-container">

        <form action="" method="POST" enctype="multipart/form-data">
        <h2>Update Inventory Products</h2>
        <table class="tbl-30">

            <tr>
                <td><p>Title:  </p></td>
                <td>
                    <input type="text" name="title" value="<?php echo $title; ?>">
                </td>
            </tr>

            <tr>
                <td><p>Description:  </p></td>
                <td>
                    <textarea name="description" cols="30" rows="5"><?php echo $description; ?></textarea>
                </td>
            </tr>

            <tr>
                <td><p>Price:  </p></td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>
            <tr>
                <td><p>Brand:  </p></td>
                <td>
                    <input type="text" name="brand" value="<?php echo $brand; ?>">
                </td>
            </tr>
            <tr>
                <td><p>Color:  </p></td>
                <td>
                    <input type="text" name="color" value="<?php echo $color; ?>">
                </td>
            </tr>
            <tr>
                <td><p>Current Inventory Owner:  </p></td>
                <td>
                    <p><?php echo $current_owner; ?></p>
                </td>
            </tr>

            <tr>
                <td><p>New Inventory Owner:  </p></td>
                <td>
                    <select name="new_owner">
                        <?php
                            $user = $_SESSION['subAdmin'];
                            $sql4 = "SELECT * FROM subadmin WHERE NOT username='$user'";
                            $res4 = mysqli_query($conn,$sql4);
                            $count4 = mysqli_num_rows($res4);
                            if($count4>0){
                                while($row4 = mysqli_fetch_assoc($res4)){
                                    $id2 = $row4['id'];
                                    $username = $row4['username'];
                                    ?>
                                        <option <?php if($username==$id2){echo 'selected';} ?> value="<?php echo $id2; ?>"><?php echo $username; ?></option>
                                    <?php
                                }
                            }else{
                                echo 'No Sub Admins Found';
                            }
                        ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td><p>Current Image:  </p></td>
                <td>
                    <?php 
                        if($current_image == "")
                        {
                            echo "<div class='error'>Image not Available.</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/inventory/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
            </tr>

            <tr>
                <td><p>Select New Image:  </p></td>
                <td>
                    <input type="file" name="image">
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
                                    $category_title = $row['title'];
                                    $category_id = $row['id'];
                                    ?>
                                    <option <?php if($current_category==$category_id){echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                    <?php
                                }
                            }
                            else
                            {
                                echo "<option value='0'>Category Not Available.</option>";
                            }

                        ?>

                    </select>
                </td>
            </tr>
            
        
        </table>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
         <input type="submit" name="submit" value="Update Product" class="btn-secondary btn">
        
        </form>

    </div>

</section>

        <?php
            if(isset($_POST['submit']))
            {

                $new_owner = $_POST['new_owner'];
                
                $sql5 = "SELECT * FROM subadmin WHERE id='$new_owner'";
                $res5 = mysqli_query($conn,$sql5);
                $row5 = mysqli_fetch_assoc($res5);
                $new_owner_name = $row5['username'];

                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];
                $brand = $_POST['brand'];

                if(isset($_FILES['image']['name'])){
                    $image_name = $_FILES['image']['name'];

                    if($image_name!=""){
                        $ext = end(explode('.', $image_name));
                        $image_name = "Inventory-".rand(0000, 9999).'.'.$ext;
                        $src_path = $_FILES['image']['tmp_name'];
                        $dest_path = "../../images/inventory/".$image_name;
                        $upload = move_uploaded_file($src_path, $dest_path);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";
                            ?>
                            <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/updateInventoryProduct.php';</script>
                            <?php
                            die();
                        }
                        if($current_image!="")
                        {
                            $remove_path = "../../images/inventory/".$current_image;
                            $remove = unlink($remove_path);
                            if($remove==false)
                            {
                                $_SESSION['remove-failed'] = "<div class='error'>Failed to remove current image.</div>";
                                ?>
                                <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/updateInventoryProduct.php';</script>
                                <?php
                                die();
                            }
                        }
                    }else{
                        $image_name = $current_image; 
                    }
                }else{
                    $image_name = $current_image; 
                }
                $sql3 = "UPDATE inventory SET 
                    title = '$title',
                    description = '$description',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    publisher = '$new_owner_name',
                    brand = '$brand',
                    color = '$color'
                    WHERE id=$id
                ";
                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'>product Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/inventoryProducts.php';</script>
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update product.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/inventoryProducts.php';</script>
                    <?php
                }
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>