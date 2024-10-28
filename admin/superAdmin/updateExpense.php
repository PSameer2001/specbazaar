<?php include_once('../../config/conn.php'); ?>
<link rel="stylesheet" href="/specsbazaar/css/style.css">
<div class="main-content">
    <div class="wrapper">



        <?php 
        
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $sql = "SELECT * FROM expense WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res);
                    $username = $row['username'];
                    $date = $row['date'];
                    $expense = $row['expense'];
                    $purpose = $row['purpose'];
                    $payment_mode = $row['payment_mode'];
                    $payment_remark = $row['payment_remark'];
                }
                else
                {
                    $_SESSION['no-coupon-found'] = "<div class='error'>Data not Found.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Expenses.php'</script>;
                    <?php
                }
 
            }
            else
            {
                ?>
                <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Expenses.php'</script>;
                <?php
            }
        
        ?>

<section class="registration">

    <div class="signup-form-container">

        <form action="" method="POST">

            <h3>Update Expenses</h3>

            <table class="tbl-30">
                <tr>
                    <td>Username: </td>
                    <td>
                        <p><?php echo $username ?></p>
                    </td>
                </tr>

                <tr>
                    <td>Amount: </td>
                    <td>
                        <input type='number' value='<?php echo $expense ?>' name='expense' />
                    </td>
                </tr>
                <tr>
                <td>Purpose: </td>
                    <td>
                        <input type='text' name='purpose' value='<?php echo $purpose ?>' />
                    </td>
                </tr>
                <tr>
                <td><p>Payment Mode:  </p></td>
                <td>
                    <input <?php if($payment_mode=="Yes") {echo "checked";} ?> type="radio" id="cmpo" name="payment_mode"  value="CASH"> CASH 
                    <input <?php if($payment_mode=="No") {echo "checked";} ?> type="radio" id="cmpo" name="payment_mode" value="UPI PAYMENT"> UPI PAYMENT 
                </td>
            </tr>

                <tr>
                    <td>Payment Remark: </td>
                    <td>
                        <input type='text' name='payment_remark'  value='<?php echo $payment_remark ?>' />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
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
                $expense = $_POST['expense'];
                $purpose = $_POST['purpose'];
                $payment_mode = $_POST['payment_mode'];
                $payment_remark = $_POST['payment_remark'];
                date_default_timezone_set("Asia/Kolkata");
                $date = date("Y-m-d");

                $sql2 = "UPDATE eye_test SET 
                    expense = $expense,
                    purpose = '$purpose',
                    expense_date = $date,
                    payment_mode = '$payment_mode',
                    payment_remark = '$payment_remark'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Expenses.php'</script>;
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/Expenses.php'</script>;
                    <?php
                }

            }
        
        ?>

    </div>
</div>