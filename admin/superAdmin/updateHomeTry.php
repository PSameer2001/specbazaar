<?php
    include_once('./partials/header.php');
?>
<link rel="stylesheet" href="/specsbazaar/css/style.css">
<div class="main-content">
    <div class="wrapper">


        <?php 
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM home_try_on WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $username = $row['username'];
                    $email = $row['email'];
                    $contact = $row['contact'];
                    $wcontact = $row['whatsapp_contact'];
                    $address = $row['address'];
                    $visited = $row['visited'];
                    $description = $row['description'];
                    $current_tester = $row['tester'];
                }
                else
                {
                    $_SESSION['no-coupon-found'] = "<div class='error'>Data not Found.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Hometryon.php'</script>;
                    <?php
                }
 
            }
            else
            {
                ?>
                <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Hometryon.php'</script>;
                <?php
            }
        
        ?>

     <section class="registration">

     <div class="signup-form-container">
        <form action="" method="POST">
            <h3>Home Try On</h3>
            <table class="tbl-30">
                <tr>
                    <td><p>Username:  </p></td>
                    <td>
                        <p><?php echo $username ?></p>
                    </td>
                </tr>

                <tr>
                    <td><p>Email:  </p></td>
                    <td>
                        <p><?php echo $email ?></p>
                    </td>
                </tr>
                <tr>
                <td><p>Contact </p></td>
                    <td>
                        <p><?php echo $contact ?></p>
                    </td>
                </tr>
                <tr>
                    <td><p>Whatsapp Contact:    </p></td>
                    <td>
                        <p><?php echo $wcontact ?></p>
                    </td>
                </tr>

                <tr>
                    <td><p>Address:  </p></td>
                    <td>
                        <p><?php echo $address ?></p>
                    </td>
                </tr>

                <tr>
                    <td><p>Description:  </p></td>
                    <td><input type="text" value="<?php echo $description; ?>" name="description"></td>
                </tr>

                <tr>
                <td><p>Visited:  </p></td>
                <td>
                    <input <?php if($visited=="Yes") {echo "checked";} ?> type="radio" name="visited" id="cmpo" value="Yes"> Yes 
                    <input <?php if($visited=="No") {echo "checked";} ?> type="radio" name="visited" id="cmpo" value="No"> No 
                </td>
                </tr>

                <tr>
                    <td><p>Tester:  </p></td>
                    <td>
                        <select name="tester">
                        <?php 
                                $sql3 = "SELECT * FROM subadmin";
                                $res3 = mysqli_query($conn, $sql3);
                                $count3 = mysqli_num_rows($res3);

                                if($count3>0)
                                {
                                    while($row3=mysqli_fetch_assoc($res3))
                                    {
                                        $id2 = $row3['id'];
                                        $title = $row3['username'];

                                        ?>

                                        <option <?php if($current_tester==$id2){echo "selected";} ?> value="<?php echo $id2; ?>"><?php echo $title; ?></option>

                                        <?php
                                    }
                                }
                                else
                                {
                                    ?>
                                    <option value="0">No Sub-Admin Found</option>
                                    <?php
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $id?>">
                    </td>
                </tr>
                    </table>
                        <input type="submit" name="submit" value="UPDATE" class="addButton btn">

            </form>

        </div>

    </section>
    

        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $tester = $_POST['tester'];
                $description = $_POST['description'];
                $visited = $_POST['visited'];

                $sql2 = "UPDATE home_try_on SET 
                    visited = '$visited',
                    description = '$description',
                    tester = '$tester'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/HomeTryOn.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/HomeTryOn.php'</script>;
                    <?php
                }

            }
        
        ?>

    </div>
</div>