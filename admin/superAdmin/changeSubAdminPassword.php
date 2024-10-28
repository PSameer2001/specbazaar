<?php include('partials/header.php'); ?> 

<link rel="stylesheet" href="/specsbazaar/css/style1.css">

<section class="registration">

<div class="signup-form-container">

        
        <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }
        ?>


        <form action=""method="POST">

            <h2>Change Password</h2>

        <table class="tbl-30">
            <tr>
                <td class="sppc">Current Password</td>
                <td>
                    <input type="password" name="current_password" placeholder="Current password">
                </td>
            </tr>

            <tr>
                <td class="sppc" >New Password</td>
                <td>
                    <input type="password" name="new_password" placeholder="New Password">
                </td>
            </tr>

            <tr>
                <td>Confirm Password</td>
                <td>
                    <input type="password" name="confirm_password" placeholder="Confirm Pssword">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id?>">
                </td>
            </tr>
            
        </table>

         <input type="submit" name="submit" value="Change Password" class="btn-secondary btn">

        </form>

    </div>
</section>

    <?php 
            if(isset($_POST['submit']))
            {
                $id=$_POST['id'];
                $current_password = $_POST['current_password'];
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];
                $hash_new_password = password_hash($new_password,PASSWORD_DEFAULT);

                $sql = "SELECT * FROM subadmin WHERE id=$id";
                $res = mysqli_query($conn, $sql);

                if($res==true)
                {
                    $count=mysqli_num_rows($res);

                    if($count==1)
                    {
                        while($row = mysqli_fetch_assoc($res)){
                            if(password_verify($current_password,$row['password'])){
                                if($new_password==$confirm_password)
                                {
                                    $sql2 = "UPDATE subadmin SET 
                                        password='$hash_new_password' 
                                        WHERE id=$id
                                    ";

                                    $res2 = mysqli_query($conn, $sql2);

                                    if($res2==true)
                                    {
                                        $_SESSION['change-pwd'] = "<div class='success'>Password Changed Successfully. </div>";
                                        ?>
                                        <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php';</script>
                                        <?php
                                    }
                                    else
                                    {
                                        $_SESSION['change-pwd'] = "<div class='error'>Failed to Change Password. </div>";
                                        ?>
                                        <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php';</script>
                                        <?php
                                    }
                                }
                                else
                                {
                                    $_SESSION['pwd-not-match'] = "<div class='error'>Password Did not Match. </div>";
                                    ?>
                                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php';</script>
                                    <?php
                                }
                    }
                }
            }
                    else
                    {
                        $_SESSION['user-not-found'] = "<div class='error'>Old Password did not match.</div>";
                        ?>
                        <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/subAdmin.php';</script>
                        <?php
                    }
                }

               
            }

?>



<?php include('partials/footer.php'); ?>







