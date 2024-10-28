<?php
include '../../config/conn.php';
if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $sup_contact = $_POST['sup_contact'];
        $password = $_POST['password'];
        $branch_name = $_POST['branch_name'];
        $branch_location = $_POST['location'];
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql2 = "SELECT 1 from (
            SELECT username as username from subadmin
            union all
            SELECT username from superadmin
        ) a
        where username = '$username'";
        $res2 = mysqli_query($conn,$sql2);
        $count2 = mysqli_num_rows($res2);
        if($count2>0){
            echo 'username already taken';
        }else{
            if(isset($_FILES['image']['name']))
                {
                    $image_name = $_FILES['image']['name'];
                    if($image_name!="")
                    {
                        $tmp =explode('.', $image_name);
                        $ext = end($tmp);
                        $image_name = "Branch-".rand(0000,9999).".".$ext; 
                        $src = $_FILES['image']['tmp_name'];
                        $dst = "../../images/branch/".$image_name;
                        $upload = move_uploaded_file($src, $dst);

                        if($upload==false)
                        {
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            ?>
                            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/superAdmin.php'</script>;
                            <?php
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; 
                }
        
        $sql = "INSERT INTO superadmin SET
            full_name= '$full_name',
            username= '$username',
            sup_contact = '$sup_contact',
            branch_name = '$branch_name',
            branch_location = '$branch_location',
            branch_image = '$image_name',
            password= '$password'
        ";

        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
            ?>
            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/superAdmin.php'</script>;
            <?php
        }  
        
        else
        {
            $_SESSION['add'] = "Failed to insert data";
            ?>
            <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/superAdmin.php'</script>;
            <?php
        }
        }        
    }
?>
<link rel="stylesheet" href="/specsbazaar/css/style1.css">

<section class="registration">

<div class="signup-form-container">


<form action="" method="POST" enctype="multipart/form-data">

             <h2>Super Admin</h2>

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Name"></td>
                </tr>
        
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter Your Username"></td>
                </tr>
                <tr>
                    <td>Contact: </td>
                    <td><input type="number" name="sup_contact" placeholder="Enter Your Contact"></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter Your Password"></td>
                </tr>

                <tr>
                    <td>Branch Name:  </td>
                    <td><input type="text" name='branch_name' placeholder='Enter Branch Name'></td>
                </tr>

                <tr>
                    <td>Branch Image:  </td>
                    <td><input type="file" name="image" id=""></td>
                </tr>

                <tr>
                    <td>Branch Location: </td>
                    <td><textarea name="location" id="" cols="30" rows="10"></textarea></td>
                </tr>

            </table>

                        <input type="submit" name="submit" value="Add Super-Admin" class="addButton btn">

        </form>

    </div>

</section>