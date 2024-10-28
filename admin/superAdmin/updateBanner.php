<?php include_once('partials/header.php'); ?>
<link rel="stylesheet" href="/specsbazaar/css/style1.css">
<div class="main-content">
    <div class="wrapper">


        <?php 
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM banner WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $super_heading = $row['banner_super_text'];
                    $current_image = $row['banner_image'];
                    $sub_heading = $row['banner_sub_text'];
                    $active = $row['active'];
                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/manageCategory.php'</script>;
                    <?php
                }
 
            }
            else
            {
                ?>
                <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/manageCategory.php'</script>;
                <?php
            }
        
        ?>

        <section class="registration">

        <div class="signup-form-container">

        <form action="" method="POST" enctype="multipart/form-data">

            <h2>Update Banner</h2>

            <table class="tbl-30">
                <tr>
                    <td><p>Top Heading:  </p></td>
                    <td>
                        <input type="text" name="super_heading" value="<?php echo $super_heading; ?>">
                    </td>
                </tr>

                <tr>
                    <td><p>Current Image:  </p></td>
                    <td>
                        <?php 
                            if($current_image != "")
                            {
                                ?>
                                <img src="<?php echo SITEURL; ?>images/banner/<?php echo $current_image; ?>" width="150px">
                                <?php
                            }
                            else
                            {
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td><p>New Image:  </p></td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td><p>Sub Heading:  </p></td>
                    <td>
                        <input type="text" name="sub_heading" value="<?php echo $sub_heading; ?>">
                    </td>
                </tr>

                <tr>
                    <td><p>Active:  </p></td>
                    <td>
                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" id="cmpo" name="active" value="Yes"> Yes 

                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" id="cmpo" name="active" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </td>
                </tr>

            </table>

            <input type="submit" name="submit" value="Update Banner" class="addButton btn">

        </form>

    </div>

</section>

        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $super_heading = $_POST['super_heading'];
                $current_image = $_POST['current_image'];
                $sub_heading = $_POST['sub_heading'];
                $active = $_POST['active'];

                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];

                    if($image_name != "")
                    {
                        $ext = end(explode('.', $image_name));
                        $image_name = "Specs_Category_".rand(000, 999).'.'.$ext; 
                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "images/banner/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false)
                        {
                            
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            ?>
                            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Banner.php'</script>;
                            <?php
                            
                            die();
                        }

                        if($current_image!="")
                        {
                            $remove_path = "images/banner/".$current_image;

                            $remove = unlink($remove_path);

                            if($remove==false)
                            {
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                ?>
                                <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Banner.php'</script>;
                                <?php
                                die();
                            }
                        }
                        

                    }
                    else
                    {
                        $image_name = $current_image;
                    }
                }
                else
                {
                    $image_name = $current_image;
                }

                $sql2 = "UPDATE banner SET 
                    banner_super_text = '$super_heading',
                    banner_image = '$image_name',
                    banner_sub_text = '$sub_heading',
                    active = '$active' 
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Banner Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Banner.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Banner.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Banner.php'</script>;
                    <?php
                }

            }
        
        ?>

    </div>
</div>

<?php include_once('partials/footer.php'); ?>