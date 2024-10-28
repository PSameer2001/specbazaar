<?php include_once('../../config/conn.php'); ?>
<link rel="stylesheet" href="/specsbazaar/css/style1.css">
<div class="main-content">
    <div class="wrapper">
        


        <?php 
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM coupon WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $coupon_code = $row['coupon_code'];
                    $coupon_value = $row['coupon_value'];
                    $min_value = $row['min_value'];
                    $coupon_type = $row['coupon_type'];
                    $active = $row['active'];
                }
                else
                {
                    $_SESSION['no-coupon-found'] = "<div class='error'>Coupon not Found.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/manageCoupon.php'</script>;
                    <?php
                }
 
            }
            else
            {
                ?>
                <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/manageCoupon.php'</script>;
                <?php
            }
        
        ?>

        <section class="registration">

        <div class="signup-form-container">

        <form action="" method="POST">

            <h2>Update Coupon</h2>

            <table class="tbl-30">
                <tr>
                    <td><p>Coupon Code:  </p></td>
                    <td>
                        <input type="text" name="coupon_code" placeholder="Coupon Code" value="<?php echo $coupon_code; ?>">
                    </td>
                </tr>

                <tr>
                    <td><p>Coupon Value:  </p></td>
                    <td>
                        <input type="number" name="coupon_value" placeholder="Coupon Value" value="<?php echo $coupon_value; ?>">
                    </td>
                </tr>
                <tr>
                <td><p>Coupon Type  </p></td>
                    <td>
                        <input <?php if($coupon_type=="Percentage"){echo "checked";} ?> type="radio" id="cmpo" name="coupon_type" value="Percentage"> Percentage
                        <input <?php if($coupon_type=="Rupee"){echo "checked";} ?> type="radio" id="cmpo" name="coupon_type" value="Rupee"> Rupee
                    </td>
                </tr>
                <tr>
                    <td><p>Coupon Minimum Value:  </p></td>
                    <td>
                        <input type="number" name="min_value" placeholder="Coupon Minimum Value" value="<?php echo $min_value; ?>">
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
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </td>
                </tr>

            </table>

            <input type="submit" name="submit" class="addButton btn" value="Add Coupon">

            </form>

        </div>

    </section>
    

        <?php 
        
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $coupon_code = $_POST['coupon_code'];
                $coupon_value = $_POST['coupon_value'];
                $min_value = $_POST['min_value'];
                $coupon_type = $_POST['coupon_type'];
                $active = $_POST['active'];

                $sql2 = "UPDATE coupon SET 
                    coupon_code = '$coupon_code',
                    coupon_value = '$coupon_value',
                    min_value = '$min_value',
                    coupon_type = '$coupon_type',
                    active = '$active'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Coupon Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/manageCoupon.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Coupon.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/manageCoupon.php'</script>;
                    <?php
                }

            }
        
        ?>

    </div>
</div>