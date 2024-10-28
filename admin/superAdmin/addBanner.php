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
                    <td>
                        <p>Top Heading:   </p></td>
                    <td>
                        <input type="text" name="super_heading" placeholder="Top Heading">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Select Image:   </p></td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Sub Heading:   </p></td>
                        <td>
                        <input type="text" name="sub_heading" placeholder="Sub Heading">
                    </td>
                </tr>

                <tr>
                    <td>
                        <p>Active:</p>  </td>
                    <td>
                        <input type="radio" id="cmpo" name="active" value="Yes"> Yes 
                        <input type="radio" id="cmpo" name="active" value="No"> No 
                    </td>
                </tr>

                 </table>

                
                        <input type="submit" name="submit" class="addButton btn" value="Add Banner">

        </form>

    </div>

</section>

<?php 
            if(isset($_POST['submit']))
            {
                $super_heading = $_POST['super_heading'];
                $sub_heading = $_POST['sub_heading'];

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
                    
                    if($image_name != "")
                    {
                        $tmp = explode('.', $image_name);
                        $ext = end($tmp);
                        $image_name = "Banner_".rand(000, 999).'.'.$ext;
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../../images/banner/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            ?>
                            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Banner.php'</script>;
                            <?php
                            die();
                        }

                    }
                }
                else
                {
                    $image_name="";
                }

                $sql = "INSERT INTO banner SET 
                    banner_super_text='$super_heading',
                    banner_image='$image_name',
                    banner_sub_text='$sub_heading',
                    active='$active'
                ";

                $res = mysqli_query($conn, $sql);

                
                if($res==true)
                {
                    $_SESSION['add'] = "<div class='success'>Banner added successfully</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Banner.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['add'] = "Failed to add Banner,please try again";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Banner.php'</script>;
                    <?php
                }
            }
        
?>