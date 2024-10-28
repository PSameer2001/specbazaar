<?php
    include('../../config/conn.php');
    if(isset($_GET['invoice_no'])){
        $invoice_no = $_GET['invoice_no'];
        
        $sql = "SELECT * FROM orders WHERE invoice_no='$invoice_no'";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count>0){
            while($row = mysqli_fetch_assoc($res)){
             $customer_name = $row['customer_name'];
             $customer_address = $row['customer_address'];
            }
        }
    }  
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Custom Style -->
    <link rel="stylesheet" href="../../css/invoice.css">
    <link rel="icon" href="../../images/logo/logo.jpeg">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <title>SpecsBazaar Invoice</title>
</head>

<body>
    <div class="my-5 page" size="A4">
        <div class="p-5">
            <section class="top-content bb d-flex justify-content-between">
                <div class="logo">
                    <img src="../../images/logo/logo.jpeg" alt="" class="img-fluid">
                    <img src="../../images/invoice/invoice.png" alt="" >
                </div>
                <div class="top-left">
                    <div class="graphic-path">
                        <p>Invoice</p>
                    </div>
                    <div class="position-relative">
                        <p>Invoice No. <span><?php echo $invoice_no; ?></span></p>
                    </div>
                </div>
            </section>

            <section class="store-user mt-5">
                <div class="col-10">
                    <div class="row bb pb-3">
                        <div class="col-7">
                            <p>Supplier,</p>
                            <h2>SpecsBazaar</h2>
                            <p class="address"> Marol, <br> Marol, <br>Marol </p>
                            <div class="txn mt-2">TXN: XXXXXXX</div>
                        </div>
                        <div class="col-5">
                            <p>Client,</p>
                            <h2><?php echo $customer_name; ?></h2>
                            <p class="address"> <?php echo $customer_address; ?> </p>
                        </div>
                    </div>
                    <div class="row extra-info pt-3">
                        <div class="col-7">
                            <p>Payment Method: <span>Cash</span></p>
                            <p>Order Number: <span>#868</span></p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product-area mt-4">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Item Description</td>
                            <td>Price</td>
                            <td>Quantity</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql2 = "SELECT * FROM orders WHERE invoice_no='$invoice_no'";
                            $res2 = mysqli_query($conn,$sql2);
                            $count2 = mysqli_num_rows($res2);
                            if($count2>0){
                                while($row2 = mysqli_fetch_assoc($res2)){
                                    $image_name = $row2['image_name'];
                                    $product_name = $row2['product_name'];
                                    $price = $row2['price'];
                                    $quantity = $row2['quantity'];
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <img class="mr-3 img-fluid" src="<?php echo SITEURL ?>images/products/<?php echo $image_name; ?>" alt="Product 01" />
                                                <div class="media-body">
                                                    <p class="mt-0 title"><?php echo $product_name; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>&#8377; <?php echo $price; ?></td>
                                        <td><?php echo $quantity; ?></td>
                                        <td>&#8377; <?php echo ($price*$quantity); ?></td>
                                    </tr>
                                    <?php
                                }
                            }else{
                                echo 'no products';
                            }
                        ?>
                        
                    </tbody>
                </table>
            </section>

            <section class="balance-info">
                <div class="row">
                    <div class="col-8">
                        <p class="m-0 font-weight-bold"> Note: </p>
                        <p>Note.</p>
                    </div>
                    <?php
                        $sql3 = "SELECT SUM(price) as total_price FROM orders WHERE invoice_no='$invoice_no'";
                        $res3 = mysqli_query($conn,$sql3);
                        while($row3 = mysqli_fetch_assoc($res3)){
                            $total = $row3['total_price'];
                        }
                        $sql4 = "SELECT SUM(discount) as discount FROM orders WHERE invoice_no='$invoice_no'";
                        $res4 = mysqli_query($conn,$sql4);
                        while($row4 = mysqli_fetch_assoc($res4)){
                            $discount = $row4['discount'];
                        }
                    ?>
                    <div class="col-4">
                        <table class="table border-0 table-hover">
                            <tr>
                                <td>Sub Total:</td>
                                <td>&#8377; <?php echo $total; ?></td>
                            </tr>
                            <tr>
                                <td>Discount :</td>
                                <td>&#8377; <?php echo $discount; ?></td>
                            </tr>
                            <tfoot>
                                <tr>
                                    <td>Total:</td>
                                    <td>&#8377; <?php echo ($total-$discount); ?></td>
                                </tr>
                            </tfoot>
                        </table>

                        <!-- Signature -->
                        <div class="col-12">
                            <img src="signature.png" class="img-fluid" alt="">
                            <p class="text-center m-0"> Owners Signature </p>
                        </div>
                    </div>
                </div>
            </section>

            <img src="cart.jpg" class="img-fluid cart-bg" alt="">
        </div>
    </div>
</body>
</html>