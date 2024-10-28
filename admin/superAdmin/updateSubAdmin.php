<?php include_once('partials/header.php'); ?> 
<link rel="stylesheet" href="/specsbazaar/css/style1.css">
<div class="main-content">
    <div class="wrapper">
        

        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM subAdmin WHERE id=$id";
            $res = mysqli_query($conn, $sql);

            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                    $branch_name=$row['branch_name'];
                    $branch_location = $row['branch_location'];
                    $current_image = $row['branch_image'];

                }
                else
                {
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php'</script>;
                    <?php
                }
            }
            
        
        ?>

        <section class="registration">

        <div class="signup-form-container">
 

        <form action=""method="POST">

            <h2>Update Admin</h2>  
            <table class="tbl-30">
                <tr>
                    <td><p>Full Name: </p></td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td><p>Username: </p></td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
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
                            <img src="<?php echo SITEURL; ?>images/branch/<?php echo $current_image; ?>" width="150px">
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
                <td><p>Branch Name: </p></td>
                <td><input type="text" name="branch_name" value="<?php echo $branch_name; ?>"></td>
            </tr>

            <tr>
                <td><p>Branch Location: </p></td>
                <td><input type="text" name="branch_location" value="<?php echo $branch_location ?>"></td>
            </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </td>
                </tr>
            </table>

            <input type="submit" name="submit" value="Update Admin" class="addButton btn">
        </form>

    </div>

</section>

    </div>
</div>




<?php 

    if(isset($_POST['submit']))
    {
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $branch_name = $_POST['branch_name'];
        $branch_location = $_POST['branch_location'];

        if(isset($_FILES['image']['name'])){
            $image_name = $_FILES['image']['name'];

            if($image_name!=""){
                $ext = end(explode('.', $image_name));
                $image_name = "Product-".rand(0000, 9999).'.'.$ext; 
                $src_path = $_FILES['image']['tmp_name'];
                $dest_path = "../../images/branch/".$image_name; 
                $upload = move_uploaded_file($src_path, $dest_path);

                if($upload==false)
                {
                    $_SESSION['upload'] = "<div class='error'>Failed to Upload new Image.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL; ?>admin/superAdmin/manageProducts.php';</script>
                    <?php
                    die();
                }
                if($current_image!="")
                {
                    $remove_path = "../../images/products/".$current_image;
                    $remove = unlink($remove_path);
                    if($remove==false)
                    {
                        $_SESSION['remove-failed'] = "<div class='error'>Faile to remove current image.</div>";
                        ?>
                        <script>window.location.href='<?php echo SITEURL; ?>admin/superAdmin/subAdmin.php';</script>
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

        $sql = " UPDATE subAdmin SET
        full_name = '$full_name',
        username = '$username',
        branch_name = '$branch_name',
        branch_location = '$branch_location',
        branch_image = '$image_name'
        WHERE id='$id'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
            ?>
            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php'</script>;
            <?php
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Failed to Update Admin</div>";
            ?>
            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php'</script>;
            <?php
        }
    }


?>


<?php include_once('partials/footer.php'); ?>
