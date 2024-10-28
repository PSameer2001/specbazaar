<?php include('partials/header.php'); ?>
<link rel="stylesheet" href="/specsbazaar/css/style1.css">
<div class="main-content">
    <div class="wrapper">


        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];

                $sql = "SELECT * FROM orders WHERE id=$id";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $id = $row['id'];
                    $title = $row['product_name'];
                    $price = $row['price'];
                    $quantity = $row['quantity'];
                    $total = $row['total'];
                    $orderTime = $row['order_date'];
                    $publisher = $row['publisher'];
                    $status = $row['status'];
                    $invoice_no = $row['invoice_no'];
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
                }
                else
                {
                    ?>
                        <script>window.location.href='<?php echo SITEURL ?>admin/superAdmin/orders.php'</script>
                    <?php
                }
            }
            else
            {
                ?>
                        <script>window.location.href='<?php echo SITEURL ?>admin/superAdmin/orders.php'</script>
                    <?php
            }
        
        ?>

        <section class="registration">

        <div class="signup-form-container">

        <form action="" method="POST">
            <h2>Update Order</h2>
        
            <table class="tbl-30">
                <tr>
                    <td><p>Product Name </p></td>
                    <td><b> <?php echo $title; ?> </b></td>
                </tr>

                <tr>
                    <td><p>Price </p></td>
                    <td>
                        <b> &#8377; <?php echo $price; ?></b>
                    </td>
                </tr>

                <tr>
                    <td><p>Quantity </p></td>
                    <td>
                        <input type="number" name="quantity" value="<?php echo $quantity; ?>">
                    </td>
                </tr>
                <tr>
                    <td><p>Invoice No. </p></td>
                    <td>
                        <input type="text" value="<?php echo $invoice_no; ?>" readonly />
                    </td>
                </tr>

                <tr>
                    <td><p>Status </p></td>
                    <td>
                        <select name="status">
                            <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                            <option <?php if($status=="Processing"){echo "selected";} ?> value="Processing">Processing</option>
                            <option <?php if($status=="On Delivery"){echo "selected";} ?> value="On Delivery">On Delivery</option>
                            <option <?php if($status=="Delivered"){echo "selected";} ?> value="Delivered">Delivered</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td><p>Customer Name: </p></td>
                    <td>
                        <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                    </td>
                </tr>

                <tr>
                    <td><p>Customer Contact: </p></td>
                    <td>
                        <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>">
                    </td>
                </tr>

                <tr>
                    <td><p>Customer Email: </p></td>
                    <td>
                        <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                    </td>
                </tr>

                <tr>
                    <td><p>Customer Address:  </p></td>
                    <td>
                        <textarea name="customer_address" cols="30" rows="5"><?php echo $customer_address; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td clospan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                    </td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Update Order" class="btn-secondary btn">
        </form>


        <?php 
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $price = $_POST['price'];
                $qty = $_POST['quantity'];

                $total = $price * $quantity;

                $status = $_POST['status'];

                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                $sql2 = "UPDATE orders SET 
                    quantity = $quantity,
                    total = $total,
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    WHERE id=$id
                ";

                $res2 = mysqli_query($conn, $sql2);

                if($res2==true)
                {
                    $_SESSION['update'] = "<div class='success'>Order Updated Successfully.</div>";
                    ?>
                        <script>window.location.href='<?php echo SITEURL ?>admin/subAdmin/orders.php'</script>
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update Order.</div>";
                    ?>
                        <script>window.location.href='<?php echo SITEURL ?>admin/subAdmin/orders.php'</script>
                    <?php
                }
            }
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>