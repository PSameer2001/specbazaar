<?php
    include 'config/conn.php';

    $sql = "SELECT * FROM shipping_charge";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $shippingCharge = $row['charge'];

    if(isset($_SESSION['coupon_id'])){
        $coupon_id = $_SESSION['coupon_id'];
        $coupon_code = $_SESSION['coupon_code'];
        $coupon_value = $_SESSION['coupon_value'];
    }else{
        $coupon_id ='';
        $coupon_code = '';
        $coupon_value = '';
        $final_price = '';
    }

    foreach($_SESSION['product'] as $values){
        if(isset($_SESSION['coupon_id'])){
            $product_total = $coupon_value;
            $product_quantity_total = $product_total*$values['quantity'];
        }else{
            $product_total = $values['price'];
            $product_quantity_total = $product_total*$values['quantity'];
        }
        $status="ordered";
        $customer_email = $_SESSION['email'];
        $consumer_address=$_POST['address'];
        $consumer_contact=$_POST['contact'];
        $consumer_wcontact=$_POST['wcontact'];
        $product_name = $values['product_name'];
        $product_category = $values['category'];
        $product_brand = $values['brand'];
        $product_image_name = $values['image_name'];
        $product_color = $values['color'];
        $product_quantity = $values['quantity'];
        $product_price = $values['price'];
        $product_publisher = $values['publisher'];
        $invoice_no = $_SESSION['invoice_no'];
        $name = $_SESSION['username'];

        $sql2 = "INSERT into orders SET
        product_name = '$product_name',
        category = '$product_category',
        brand = '$product_brand',
        image_name = '$product_image_name',
        color = '$product_color',
        price = $product_price,
        quantity = $product_quantity,
        total = $product_quantity_total,
        order_date = '$date',
        shipping_charge = $shippingCharge,
        status = '$status',
        publisher = '$product_publisher',
        customer_name = '$name',
        invoice_no = '$invoice_no',
        coupon_id = '$coupon_id',
        coupon_code = '$coupon_code',
        coupon_value = '$coupon_value',
        customer_contact = $consumer_wcontact,
        customer_email = '$customer_email',
        customer_address = '$consumer_address'
            
        ";
        $res2 = mysqli_query($conn,$sql2);
        if($res2){
            header('location:invoice.php');
        }else{
            header('location:cart.php');
        }           
    }
?>