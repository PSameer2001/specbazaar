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
                        <p>Title:   </p></td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
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
                        <p>Featured:   </p></td>
                    <td>
                        <input type="radio" id="cmpo" name="featured" value="Yes"> Yes 
                        <input type="radio" id="cmpo" name="featured" value="No"> No 
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

                
                        <input type="submit" name="submit" class="addButton btn" value="Add Category">

        </form>

    </div>

</section>

<?php 
            if(isset($_POST['submit']))
            {
                $title = $_POST['title'];
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No";
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
                    
                    if($image_name != "")
                    {
                        $tmp = explode('.', $image_name);
                        $ext = end($tmp);
                        $image_name = "Specs_Category_".rand(000, 999).'.'.$ext;
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../../images/category/".$image_name;
                        $upload = move_uploaded_file($source_path, $destination_path);
                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            ?>
                            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/category.php'</script>;
                            <?php
                            die();
                        }

                    }
                }
                else
                {
                    $image_name="";
                }

                $sql = "INSERT INTO category SET 
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                ";

                $res = mysqli_query($conn, $sql);

                
                if($res==true)
                {
                    $_SESSION['add'] = "<div class='success'>Category added successfully</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/category.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['add'] = "Failed to add Category,please try again";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/category.php'</script>;
                    <?php
                }
            }
        
?>