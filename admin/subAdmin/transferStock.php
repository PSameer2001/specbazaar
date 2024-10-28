<?php
    include_once('partials/header.php');
    $user = $_SESSION['subAdmin'];
?>

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
        <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/stockTransfer.php';</script>
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
                    <p><?php echo $stock_code; ?></p>
                </td>
            </tr>
            <tr>
                <td><p>Stock Name:  </p></td>
                <td>
                    <p><?php echo $stock_name; ?></p>
                </td>
            </tr>

            <tr>
                <td><p>Quantity:  </p></td>
                <td>
                    <p><?php echo $quantity; ?></p>
                </td>
            </tr>

            <tr>
                <td><p>Price:  </p></td>
                <td>
                    <p><?php echo $price; ?></p>
                </td>
            </tr>
            <tr>
                <td>Transfer To:</td>
                <td>
                    <select name="transfer" id="">
                        <?php
                            $sql5 = "SELECT * FROM subadmin";
                            $res5 = mysqli_query($conn,$sql5);
                            while($row5 = mysqli_fetch_assoc($res5)){
                                $sub_id = $row5['id'];
                                $user = $row5['username'];
                                ?>
                                    <option value="<?php echo $sub_id; ?>"><?php echo $user ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        </table>

         <input type="submit" name="submit" value="Update Stock" class="btn-secondary btn">
        
        </form>

    </div>

</section>

        <?php
            if(isset($_POST['submit']))
            {
                $id = $_POST['id'];
                $transfer_id = $_POST['transfer'];
                $sql4 = "SELECT * FROM subadmin WHERE id='$transfer_id'";
                $res4 = mysqli_query($conn,$sql4);
                while($row4 = mysqli_fetch_assoc($res4)){
                    $supplier_name = $row4['username'];
                }
                $sql3 = "UPDATE stock_records SET 
                    supplier_name = '$supplier_name',
                    previous_owner = previous_owner +', '+'$user'
                    WHERE id=$id
                ";
                $res3 = mysqli_query($conn, $sql3);

                if($res3==true)
                {
                    $_SESSION['update'] = "<div class='success'>product Updated Successfully.</div>";
                    ?>
                    <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/stockTransfer.php';</script>
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