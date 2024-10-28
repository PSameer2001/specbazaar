<?php
    include '../../config/conn.php';
    if(isset($_GET['submit'])){
            $userid = $_GET['user'];
            $sql11 = "SELECT * FROM subadmin WHERE id='$userid'";
            $res11 = mysqli_query($conn,$sql11);
            $row11 = mysqli_fetch_assoc($res11);
            $user = $row11['username'];
    }
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
    <form action="" method="get">
        <select name="user" id="">
        <?php 
                                $sql10 = "SELECT * FROM subadmin";
                                $res10 = mysqli_query($conn, $sql10);
                                $count10 = mysqli_num_rows($res10);

                                if($count10>0)
                                {
                                    while($row10=mysqli_fetch_assoc($res10))
                                    {
                                        $id2 = $row10['id'];
                                        $title = $row10['username'];

                                        ?>

                                        <option <?php echo 'selected' ?> value="<?php echo $id2; ?>"><?php echo $title; ?></option>

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
        <input type="submit" value="Get Data" name="submit">
    </form>
    <a href="<?php echo SITEURL; ?>admin/superAdmin/orderInfo.php"><button>See Everyone's Data</button></a>
    <div>
        <h1><?php if(isset($user)){echo "$user's";}else{ echo "EVERYONE'S"; } ?> DATA</h1>
        <h2>Pending Orders</h2>
        <?php
        if (isset($user)) {
            $sql = "SELECT * FROM orders WHERE status='ordered' AND publisher='$user'";
        } else {
            $sql = "SELECT * FROM orders WHERE status='ordered'";
        }
            $res = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
        ?>
        <p>Pending Orders: <?php echo $count; ?></p>
        <?php
        if (isset($user)) {
            $sql2 = "SELECT * FROM orders WHERE status='On Delivery' AND publisher='$user'";
        }else{
            $sql2 = "SELECT * FROM orders WHERE status='On Delivery'"; 
        }
            $res2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($res2);
        ?>
        <p>Pending Deliveries: <?php echo $count2; ?></p>
        <?php
        if (isset($user)) {
            $sql3 = "SELECT * FROM orders WHERE status='On Processing' AND publisher='$user'";
        }else{
            $sql3 = "SELECT * FROM orders WHERE status='On Processing'";
        }
            $res3 = mysqli_query($conn,$sql3);
            $count3 = mysqli_num_rows($res3);
        ?>
        <p>Pending On-Processing: <?php echo $count3; ?></p>
    </div>
    <div>
        <h2>Today's Orders</h2>
        <?php
        if (isset($user)) {
            $sql4 = "SELECT * FROM orders WHERE order_date=$date AND status='ordered' AND publisher='$user'";
        }else{
            $sql4 = "SELECT * FROM orders WHERE order_date=$date AND status='ordered'";
        }
            $res4 = mysqli_query($conn,$sql4);
            $count4 = mysqli_num_rows($res4);
        ?>
        <p>Today's Orders: <?php echo $count4; ?></p>
        <?php
        if (isset($user)) {
            $sql5 = "SELECT * FROM orders WHERE order_date=$date AND status='On Delivery' AND publisher='$user'";
        }else{
            $sql5 = "SELECT * FROM orders WHERE order_date=$date AND status='On Delivery'";
        }
            $res5 = mysqli_query($conn,$sql5);
            $count5 = mysqli_num_rows($res5);
        ?>
        <p>Today's Deliveries: <?php echo $count5; ?></p>
        <?php
        if (isset($user)) {
            $sql6 = "SELECT * FROM orders WHERE order_date=$date AND status='On Delivery' AND publisher='$user'";
        }else{
            $sql6 = "SELECT * FROM orders WHERE order_date=$date AND status='On Delivery'";
        }
            $res6 = mysqli_query($conn,$sql6);
            $count6 = mysqli_num_rows($res6);
        ?>
        <p>Today's On-Processing: <?php echo $count6; ?></p>
    </div>
    <div>
        <h2>Monthly Orders</h2>
        <?php
        if (isset($user)) {
            $sql7 = "SELECT * FROM orders WHERE MONTH(order_date) = '$month' AND YEAR(order_date) = '$year' AND publisher='$user'";
        }else{
            $sql7 = "SELECT * FROM orders WHERE MONTH(order_date) = '$month' AND YEAR(order_date) = '$year'";
        }
            $res7 = mysqli_query($conn,$sql7);
            $count7 = mysqli_num_rows($res7);
        ?>
        <p>This Month's Orders: <?php echo $count7; ?></p>
        <?php
        if (isset($user)) {
            $sql8 = "SELECT * FROM orders WHERE MONTH(order_date) = '$month' AND YEAR(order_date) = '$year' AND status='On Delivery' AND publisher='$user'";
        }else{
            $sql8 = "SELECT * FROM orders WHERE MONTH(order_date) = '$month' AND YEAR(order_date) = '$year' AND status='On Delivery'";
        }
            $res8 = mysqli_query($conn,$sql8);
            $count8 = mysqli_num_rows($res8);
        ?>
        <p>This Month's Deliveries: <?php echo $count8; ?></p>
        <?php
        if (isset($user)) {
            $sql9 = "SELECT * FROM orders WHERE MONTH(order_date) = '$month' AND YEAR(order_date) = '$year' AND status='On Processing' AND publisher='$user'";
        }else{
            $sql9 = "SELECT * FROM orders WHERE MONTH(order_date) = '$month' AND YEAR(order_date) = '$year' AND status='On Processing'";
        }
            $res9 = mysqli_query($conn,$sql9);
            $count9 = mysqli_num_rows($res9);
        ?>
        <p>This Month's On-Processing: <?php echo $count9; ?></p>
    </div>
</body>
</html>