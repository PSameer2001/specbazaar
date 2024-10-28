<?php
    include 'config/conn.php';
    $api_key="rzp_test_hMHsNNjJ";
    $num = 'order'.rand(10,1000).'SB';
    $_SESSION['invoice_no'] = $num;
    $_SESSION['total_price'] = $_POST['total'];
    if(isset($_SESSION['coupon_id'])){
        $total_price = $_SESSION['coupon_value']+50;
    }else{
        $total_price = $_SESSION['total_price'];
    }
?>
<form action="saveOrder.php" method="POST">
    <script src="https://checkout.razorpay.com/v1/checkout.js"    
    data-key="<?php echo $api_key ?>" 
    data-amount="<?php echo $total_price*100 ?>" 
    data-currency="INR"
    data-id="<?php echo $num?>"   
    data-buttontext="Pay with Razorpay"    
    data-name="SpecsBazaar"    
    data-description="One Stop Eyewear Solution"    
    data-image="https://example.com/your_logo.jpg"    
    data-prefill.name="<?php echo $_SESSION['username'] ?>"    
    data-prefill.email="<?php echo $_SESSION['email'] ?>"    
    data-theme.color="#F37254">
</script><input type="hidden" name="address" value="<?php echo $_POST['customer_address']?>">
<input type="hidden" name="contact" value="<?php echo $_POST['customer_contact']?>">
<input type="hidden" name="wcontact" value="<?php echo $_POST['customer_wcontact']?>">
</form>