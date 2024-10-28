<?php    
    include ('../../config/conn.php');
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
?>

    <link rel="stylesheet" href="/specsbazaar/css/style1.css">

    <section class="registration">

    <div class="signup-form-container">

        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td><p>Select Image: </p></td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                </table>
                
                        <input type="submit" name="submit" class="addButton btn" value="Add Image">

        </form>

    </div>
</section>

<?php 
            if(isset($_POST['submit']))
            {
                if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    
                    if($image_name != "")
                    {
                        $tmp = explode('.', $image_name);
                        $ext = end($tmp);
                        $image_name = "Gallery_".rand(000, 999).'.'.$ext;
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../../images/gallery/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            ?>
                            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/gallery.php'</script>;
                            <?php
                            die();
                        }

                    }
                }
                else
                {
                    $image_name="";
                }

                $sql = "INSERT INTO gallery SET 
                    image_name='$image_name'
                ";

                $res = mysqli_query($conn, $sql);

                
                if($res==true)
                {
                    $_SESSION['add'] = "Image added Successfully";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/gallery.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['add'] = "Failed to add image,please try again";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/gallery.php'</script>;
                    <?php
                }
            }
?>