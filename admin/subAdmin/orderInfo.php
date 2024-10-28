<?php
    include '../../config/conn.php';
    $user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Information</title>
</head>
<body>
    <div>
        <h2>Pending Orders</h2>
        <?php
            $sql = "SELECT * FROM orders WHERE status='ordered' AND publisher='$user'";
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
        ?>
        <p>Pending Orders: <?php echo $count; ?></p>
        <?php
            $sql2 = "SELECT * FROM orders WHERE status='On Delivery' AND publisher='$user'";
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
        ?>
        <p>Pending Deliveries: <?php echo $count2; ?></p>
        <?php
            $sql3 = "SELECT * FROM orders WHERE status='On Processing' AND publisher='$user'";
            $res3 = mysqli_query($conn,$sql3);
            $count3 = mysqli_num_rows($res3);
        ?>
        <p>Pending On-Processing: <?php echo $count3; ?></p>
    </div>
    <div>
        <h2>Today's Orders</h2>
        <?php
            $sql4 = "SELECT * FROM orders WHERE order_date=$date AND status='ordered' AND publisher='$user'";
            $res4 = mysqli_query($conn,$sql4);
            $count4 = mysqli_num_rows($res4);
        ?>
        <p>Today's Orders: <?php echo $count4; ?></p>
        <?php
            $sql5 = "SELECT * FROM orders WHERE order_date=$date AND status='On Delivery' AND publisher='$user'";
            $res5 = mysqli_query($conn,$sql5);
            $count5 = mysqli_num_rows($res5);
        ?>
        <p>Today's Deliveries: <?php echo $count5; ?></p>
        <?php
            $sql6 = "SELECT * FROM orders WHERE order_date=$date AND status='On Delivery' AND publisher='$user'";
            $res6 = mysqli_query($conn,$sql6);
            $count6 = mysqli_num_rows($res6);
        ?>
        <p>Today's On-Processing: <?php echo $count6; ?></p>
    </div>
    <div>
        <h2>Monthly Orders</h2>
        <?php
            $sql7 = "SELECT * FROM orders WHERE MONTH(order_date) = '$month' AND YEAR(order_date) = '$year' AND publisher='$user'";
            $res7 = mysqli_query($conn,$sql7);
            $count7 = mysqli_num_rows($res7);
        ?>
        <p>This Month's Orders: <?php echo $count7; ?></p>
        <?php
            $sql8 = "SELECT * FROM orders WHERE MONTH(order_date) = '$month' AND YEAR(order_date) = '$year' AND status='On Delivery' AND publisher='$user'";
            $res8 = mysqli_query($conn,$sql8);
            $count8 = mysqli_num_rows($res8);
        ?>
        <p>This Month's Deliveries: <?php echo $count8; ?></p>
        <?php
            $sql9 = "SELECT * FROM orders WHERE MONTH(order_date) = '$month' AND YEAR(order_date) = '$year' AND status='On Processing' AND publisher='$user'";
            $res9 = mysqli_query($conn,$sql9);
            $count9 = mysqli_num_rows($res9);
        ?>
        <p>This Month's On-Processing: <?php echo $count9; ?></p>
    </div>
</body>
</html>