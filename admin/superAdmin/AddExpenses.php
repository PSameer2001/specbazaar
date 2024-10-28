<?php
    include ('../../config/conn.php');
    if(isset($_POST['submit'])){
        $expense = $_POST['expense'];
        $purpose= $_POST['purpose'];
        $payment_mode = $_POST['payment_mode'];
        $payment_remark = $_POST['payment_remark'];

        $username = $_SESSION['superAdmin'];
        date_default_timezone_set("Asia/Kolkata");
        $date = date("Y-m-d");
        $sql = "INSERT INTO expense SET
        username='$username',
        expense=$expense,
        expense_date = '$date',
        purpose='$purpose',
        payment_mode='$payment_mode',
        payment_remark='$payment_remark'
        ";
        $res = mysqli_query($conn,$sql);
        if($res==true){
        ?>
            <script>window.location.href='<?php echo SITEURL ?>admin/superAdmin/Expenses.php'</script>
        <?php
        }else{
            ?>
            <script>window.location.href='<?php echo SITEURL ?>admin/superAdmin/addExpenses.php'</script>
            <?php
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/specsbazaar/css/style1.css">
    <title>Expenses</title>
</head>
<body>
<div class="main-content">
    <div class="wrapper">
        <section class="registration">

        <div class="signup-form-container">

        <form action="" method="POST" enctype="multipart/form-data">

        <table>
                <tr>
                    <td>Amount: </td>
                    <td>
                        <input type='number' name='expense' />
                    </td>
                </tr>
                <tr>
                <td>Purpose: </td>
                    <td>
                        <input type='text' name='purpose' />
                    </td>
                </tr>
                <tr>
                <td><p>Payment Mode:  </p></td>
                <td>
                    <input type="radio" id="cmpo" name="payment_mode"  value="CASH"> CASH 
                    <input type="radio" id="cmpo" name="payment_mode" value="UPI PAYMENT"> UPI PAYMENT 
                </td>
                </tr>

                <tr>
                    <td>Payment Remark: </td>
                    <td>
                        <input type='text' name='payment_remark' />
                    </td>
                </tr>
            </table>

            <input type="submit" value="Add Expense" name="submit" class="btn">

        </form>

        </div>

        </section>
    </div>
</div>
</body>
</html>