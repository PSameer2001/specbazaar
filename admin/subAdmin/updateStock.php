<?php include_once('partials/header.php'); ?>

<?php 
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $sql2 = "SELECT * FROM stock_records WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        $stock_name = $row2['stock_name'];
        $stock_code = $row2['stock_code'];
        $quantity = $row2['quantity'];
        $price = $row2['unit_price'];
    }
    else
    {
        ?>
        <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/stockRecords.php';</script>
        <?php
    }
?>

<link rel="stylesheet" href="/specsbazaar/css/style1.css">

<div class="main-content">
    <div class="wrapper">

     <section class="registration">

        <div class="signup-form-container">

        <form action="" method="POST" enctype="multipart/form-data">
        <h2>Update Stocks</h2>
        <table class="tbl-30">

            <tr>
                <td><p>Stock Code:  </p></td>
                <td>
                    <input type="text" name="stock_code" value="<?php echo $stock_code; ?>">
                </td>
            </tr>

            <tr>
                <td><p>Stock Name:  </p></td>
                <td>
                    <input type="text" name="stock_name" value="<?php echo $stock_name; ?>">
                </td>
            </tr>

            <tr>
                <td><p>Quantity:  </p></td>
                <td>
                    <input type="text" name="quantity" value="<?php echo $quantity; ?>">
                </td>
            </tr>

            <tr>
                <td><p>Price:  </p></td>
                <td>
                    <input type="number" name="price" value="<?php echo $price; ?>">
                </td>
            </tr>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        </table>

         <input type="submit" name="submit" value="Update Product" class="btn-secondary btn">
        
        </form>

    </div>

</section>

        <?php
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $stock_code = $_POST['stock_code'];
                $stock_name = $_POST['stock_name'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                $total_price = $price*$quantity;

                
                $sql3 = "UPDATE stock_records SET 
                    stock_name = '$stock_name',
                    stock_code = '$stock_code',
                    quantity = $quantity,
                    unit_price = $price,
                    total_price = '$total_price'
                    WHERE id=$id
                ";
                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'>product Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/stockRecords.php';</script>
                    <?php
                }
                else
                {
                    $_SESSION['update'] = "<div class='error'>Failed to Update product.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/stockRecords.php';</script>
                    <?php
                }
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>