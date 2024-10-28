<?php
    include '../../config/conn.php';
    $num = 'order'.rand(10,1000).'SB';
    if(isset($_POST['submit'])){
        $product_name = $_POST['product_name'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        $image_name = $_POST['image_name'];
        $quantity = $_POST['quantity'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $order_date = $date;
        $status = $_POST['status'];
        $_SESSION['discount'] = $_POST['discount'];
        $discount = $_POST['discount'];
        $power_left = $_POST['powerleft'];
        $power_right = $_POST['powerright'];
        $publisher = $_SESSION['subAdmin'];
        $customer_name = $_POST['customer_name'];
        $customer_email = $_POST['customer_email'];
        $customer_contact = $_POST['customer_contact'];
        $customer_address = $_POST['customer_address'];
        $invoice_no = $num;
        foreach($product_name as $key=>$id){
            $sql2 = "INSERT into orders SET
            product_name = '$product_name[$key]',
            category = '$category[$key]',
            brand = '$brand[$key]',
            image_name = '$image_name[$key]',
            color = '$color[$key]',
            price = $price[$key],
            total = $price[$key],
            quantity = $quantity[$key],
            discount = $discount[$key],
            power_left = '$power_left[$key]',
            power_right = '$power_right[$key]',
            order_date = '$date',
            status = '$status[$key]',
            publisher = '$publisher',
            customer_name = '$customer_name',
            invoice_no = '$invoice_no',
            customer_contact = $customer_contact,
            customer_email = '$customer_email',
            customer_address = '$customer_address'

            ";
            $res2 = mysqli_query($conn,$sql2);
            $invoice_data = [];
            $invoice_data['product_name'] = $_POST['product_name'];
            $invoice_data['price'] = $_POST['price'];
            $invoice_data['image_name'] = $_POST['image_name'];
            $invoice_data['quantity'] = $_POST['quantity'];
            $invoice_data['discount'] = $_POST['discount'];
            // $invoice_data['total'] = $price[$key]*$quantity[$key];
            $_SESSION['customer_name'] = $_POST['customer_name'];
            $_SESSION['customer_email'] = $_POST['customer_email'];
            $_SESSION['customer_contact'] = $_POST['customer_contact'];
            $_SESSION['customer_address'] = $_POST['customer_address'];
            $_SESSION['invoice_data'] = $invoice_data;
            ?>
                <script>window.location.href='<?php echo SITEURL; ?>admin/subAdmin/invoice.php'</script>
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
    <title>addOrder</title>
</head>
<body>

<section class="registration">

<div class="signup-form-container2">
<form action="" method="post">
    <div>
        <label>Customer Name:  </label><input type="text" name="customer_name" id="">
        <label>Customer Email:  </label><input type="text" name="customer_email" id="">
        <label>Customer Contact:  </label><input type="text" name="customer_contact" id="">
        <label>Customer Address:  </label><input type="text" name="customer_address" id="">
        <label>Total:  </label><input type="text" id="total" name="total" value="0">
        <br><br><br>
    </div>

    <div>
    <table>
        <tr>
        <td>
        <tr>
            <td>
        <label>Product code: </label><input type='text' id='id' onkeyup="GetDetail1(this.value)" name='id' value=""></td>
        <td> <label>Product Name: </label><input type='text'  name="product_name[]" id="product_name_1"></td>
         <td> <label>Product Category: </label><input type='text'  name="category[]" id="category_1"></td>
        <td> <label>Brand: </label><input type='text'  name="brand[]" id="brand_1"></td>
        <td> <label>Quantity: </label><input type='text'  name="quantity[]" id="quantity_1"></td>
         <td> <input type='hidden'  name="image_name[]" id="image_name_1"></td>
         <td><label>Color: </label><input type='text'  name="color[]" id="color_1"></td>
         <td><label>Power Left: </label><input type='text'  name="powerleft[]" id="powerleft_1"></td>
        <td><label>Power right: </label><input type='text'  name="powerright[]" id="powerright_1"></td>
         <td><label>Price: </label><input type='text'  name="price[]" class="price" id="price_1"></td>
        <td> <label>Order Status: </label><input type='text'  name="status[]" id="status_1">
         </td>
        </tr>

    <tr>
       <td> 
        <label>Product code: </label><input type='text' id='id' onkeyup="GetDetail2(this.value)" name='id' value=""></td>
        <td><label>Product Name: </label><input type='text'  name="product_name[]" id="product_name_2"></td>
        <td><label>Product Category: </label><input type='text'  name="category[]" id="category_2"></td>
        <td><label>Brand: </label><input type='text'  name="brand[]" id="brand_2"></td>
        <td><label>Quantity: </label><input type='text'  name="quantity[]" id="quantity_2"></td>
        <td> <input type='hidden'  name="image_name[]" id="image_name_2"></td>
        <td><label>Color: </label><input type='text'  name="color[]" id="color_2"></td>
        <td><label>Power Left: </label><input type='text'  name="powerleft[]" id="powerleft_2"></td>
        <td><label>Power right: </label><input type='text'  name="powerright[]" id="powerright_2"></td>
        <td><label>Price: </label><input type='text'  name="price[]" class="price" id="price_2"></td>
        <td><label>Order Status: </label><input type='text'  name="status[]" id="status_2">
        </td>
        </tr>

    <tr>
       <td> 
        <label>Product code: </label><input type='text' id='id' onkeyup="GetDetail3(this.value)" name='id' value=""></td>
        <td><label>Product Name: </label><input type='text'  name="product_name[]" id="product_name_3"></td>
        <td><label>Product Category: </label><input type='text'  name="category[]" id="category_3"></td>
        <td><label>Brand: </label><input type='text'  name="brand[]" id="brand_3"></td>
        <td><label>Quantity: </label><input type='text'  name="quantity[]" id="quantity_3"></td>
         <td><input type='hidden'  name="image_name[]" id="image_name_3"></td>
       <td> <label>Color: </label><input type='text'  name="color[]" id="color_3"></td>
       <td><label>Power Left: </label><input type='text'  name="powerleft[]" id="powerleft_3"></td>
        <td><label>Power right: </label><input type='text'  name="powerright[]" id="powerright_3"></td>
        <td><label>Price: </label><input type='text'  name="price[]" class="price" id="price_3"></td>
        <td><label>Order Status: </label><input type='text'  name="status[]" id="status_3">
        </td>
    </tr>
    
    <tr>
       <td> 
        <label>Product code: </label><input type='text' id='id' onkeyup="GetDetail4(this.value)" name='id' value=""></td>
       <td> <label>Product Name: </label><input type='text'  name="product_name[]" id="product_name_4"></td>
        <td><label>Product Category: </label><input type='text'  name="category[]" id="category_4"></td>
       <td> <label>Brand: </label><input type='text'  name="brand[]" id="brand_4"></td>
        <td><label>Quantity: </label><input type='text'  name="quantity[]" id="quantity_4"></td>
        <td> <input type='hidden'  name="image_name[]" id="image_name_4"></td>
        <td><label>Color: </label><input type='text'  name="color[]" id="color_4"></td>
        <td><label>Power Left: </label><input type='text'  name="powerleft[]" id="powerleft_4"></td>
        <td><label>Power right: </label><input type='text'  name="powerright[]" id="powerright_4"></td>
       <td> <label>Price: </label><input type='text'  name="price[]" class="price" id="price_4"></td>
        <td><label>Order Status: </label><input type='text'  name="status[]" id="status_4">
        </td>
    </tr>
    
    <tr>
       <td> 
        <label>Product code: </label><input type='text' id='id' onkeyup="GetDetail5(this.value)" name='id' value=""></td>
       <td> <label>Product Name: </label><input type='text'  name="product_name[]" id="product_name_5"></td>
       <td> <label>Product Category: </label><input type='text'  name="category[]" id="category_5"></td>
        <td><label>Brand: </label><input type='text'  name="brand[]" id="brand_5"></td>
        <td><label>Quantity: </label><input type='text'  name="quantity[]" id="quantity_5"></td>
         <td><input type='hidden'  name="image_name[]" id="image_name_5"></td>
        <td><label>Color: </label><input type='text'  name="color[]" id="color_5"></td>
        <td><label>Power Left: </label><input type='text'  name="powerleft[]" id="powerleft_5"></td>
        <td><label>Power right: </label><input type='text'  name="powerright[]" id="powerright_5"></td>
        <td><label>Price: </label><input type='text'  name="price[]" class="price" id="price_5"></td>
        <td><label>Order Status: </label><input type='text'  name="status[]" id="status_5">
        </td>
    </tr>
    
    <tr>
       <td> 
        <label>Product code: </label><input type='text' id='id' onkeyup="GetDetail6(this.value)" name='id' value=""></td>
        <td><label>Product Name: </label><input type='text'  name="product_name[]" id="product_name_6"></td>
        <td><label>Product Category: </label><input type='text'  name="category[]" id="category_6"></td>
        <td><label>Brand: </label><input type='text'  name="brand[]" id="brand_6"></td>
        <td><label>Quantity: </label><input type='text'  name="quantity[]" id="quantity_6"></td>
        <td> <input type='hidden'  name="image_name[]" id="image_name_6"></td>
        <td><label>Color: </label><input type='text'  name="color[]" id="color_6"></td>
        <td><label>Power Left: </label><input type='text'  name="powerleft[]" id="powerleft_6"></td>
        <td><label>Power right: </label><input type='text'  name="powerright[]" id="powerright_6"></td>
        <td><label>Price: </label><input type='text'  name="price[]" class="price" id="price_6"></td>
        <td><label>Order Status: </label><input type='text'  name="status[]" id="status_6">
        </td>
    </tr>

    <tr>
       <td> 
        <label>Product code: </label><input type='text' id='id' onkeyup="GetDetail7(this.value)" name='id' value=""></td>
        <td><label>Product Name: </label><input type='text'  name="product_name[]" id="product_name_7"></td>
        <td><label>Product Category: </label><input type='text'  name="category[]" id="category_7"></td>
        <td><label>Brand: </label><input type='text'  name="brand[]" id="brand_7"></td>
        <td><label>Quantity: </label><input type='text'  name="quantity[]" id="quantity_7"></td>
        <td> <input type='hidden'  name="image_name[]" id="image_name_7"></td>
        <td><label>Color: </label><input type='text'  name="color[]" id="color_7"></td>
        <td><label>Power Left: </label><input type='text'  name="powerleft[]" id="powerleft_7"></td>
        <td><label>Power right: </label><input type='text'  name="powerright[]" id="powerright_7"></td>
        <td><label>Price: </label><input type='text'  name="price[]" class="price" id="price_7"></td>
        <td><label>Order Status: </label><input type='text'  name="status[]" id="status_7">
        </td>
    </tr>
    <tr>
       <td> 
        <label>Product code: </label><input type='text' id='id' onkeyup="GetDetail8(this.value)" name='id' value=""></td>
        <td><label>Product Name: </label><input type='text'  name="product_name[]" id="product_name_8"></td>
        <td><label>Product Category: </label><input type='text'  name="category[]" id="category_8"></td>
        <td><label>Brand: </label><input type='text'  name="brand[]" id="brand_8"></td>
        <td><label>Quantity: </label><input type='text'  name="quantity[]" id="quantity_8"></td>
        <td> <input type='hidden'  name="image_name[]" id="image_name_8"></td>
        <td><label>Color: </label><input type='text'  name="color[]" id="color_8"></td>
        <td><label>Power Left: </label><input type='text'  name="powerleft[]" id="powerleft_8"></td>
        <td><label>Power right: </label><input type='text'  name="powerright[]" id="powerright_8"></td>
        <td><label>Price: </label><input type='text'  name="price[]" class="price" id="price_8"></td>
        <td><label>Order Status: </label><input type='text'  name="status[]" id="status_8">
        </td>
    </tr>
    <tr>
       <td> 
        <label>Product code: </label><input type='text' id='id' onkeyup="GetDetail9(this.value)" name='id' value=""></td>
        <td><label>Product Name: </label><input type='text'  name="product_name[]" id="product_name_9"></td>
        <td><label>Product Category: </label><input type='text'  name="category[]" id="category_9"></td>
        <td><label>Brand: </label><input type='text'  name="brand[]" id="brand_9"></td>
        <td><label>Quantity: </label><input type='text'  name="quantity[]" id="quantity_9"></td>
        <td> <input type='hidden'  name="image_name[]" id="image_name_9"></td>
        <td><label>Color: </label><input type='text'  name="color[]" id="color_9"></td>
        <td><label>Power Left: </label><input type='text'  name="powerleft[]" id="powerleft_9"></td>
        <td><label>Power right: </label><input type='text'  name="powerright[]" id="powerright_9"></td>
        <td><label>Price: </label><input type='text'  name="price[]" class="price" id="price_9"></td>
        <td><label>Order Status: </label><input type='text'  name="status[]" id="status_9">
        </td>
    </tr>
    <tr>
       <td> 
        <label>Product code: </label><input type='text' id='id' onkeyup="GetDetail10(this.value)" name='id' value=""></td>
        <td><label>Product Name: </label><input type='text'  name="product_name[]" id="product_name_10"></td>
        <td><label>Product Category: </label><input type='text'  name="category[]" id="category_10"></td>
       <td> <label>Brand: </label><input type='text'  name="brand[]" id="brand_10"></td>
        <td><label>Quantity: </label><input type='text'  name="quantity[]" id="quantity_10"></td>
        <td> <input type='hidden'  name="image_name[]" id="image_name_10"></td>
        <td><label>Color: </label><input type='text'  name="color[]" id="color_10"></td>
        <td><label>Power Left: </label><input type='text'  name="powerleft[]" id="powerleft_10"></td>
        <td><label>Power right: </label><input type='text'  name="powerright[]" id="powerright_10"></td>
        <td><label>Price: </label><input type='text'  name="price[]" class="price" id="price_10"></td>
        <td><label>Order Status: </label><input type='text'  name="status[]" id="status_10">
        </td>
    </tr>
</table>
    </div>
    <br>
    <br>

    <input type="submit" name="submit" value="submit" class="btn">
</form>
</div>

</section>

</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/JavaScript">

var price = document.querySelectorAll('.price');
    for(var j=0; j<price.length ; j++){
        price[j].addEventListener("change",function(){
                var arr = document.querySelectorAll('.price');
                var sum = 0;
                for (var i = 0; i < arr.length ; i++) {
                    // console.log(parseInt(arr[i].value));
                    if(parseInt(arr[i].value)){
                        sum += parseInt(arr[i].value);
                    }
                }
                console.log(sum)
                document.getElementById('total').value = sum;
        });
    }

function GetDetail1(str) {
            if (str.length == 0) {
                document.getElementById('product_name_1').value = "";
                document.getElementById("price_1").value = "";
                return;
            }else{
                        $.ajax({
                            url:'getData.php',
                            type:'get',
                            data:'code='+str,
                            success:function(dataResult){
                                var data = JSON.parse(dataResult);
                                document.getElementById("product_name_1").value = data.product_name;
                                document.getElementById("category_1").value = data.category;
                                document.getElementById("brand_1").value = data.brand;
                                document.getElementById("image_name_1").value = data.image_name;
                                document.getElementById("color_1").value = data.color;
                                document.getElementById("price_1").value = data.price;
                                document.getElementById("quantity_1").value = data.quantity;
                            }
                        })
                    }
        }

        function GetDetail2(str) {
            if (str.length == 0) {
                document.getElementById('product_name_2').value = "";
                document.getElementById("price_2").value = "";
                return;
            }else{
                        $.ajax({
                            url:'getData.php',
                            type:'get',
                            data:'code='+str,
                            success:function(dataResult){
                                var data = JSON.parse(dataResult);
                                document.getElementById("product_name_2").value = data.product_name;
                                document.getElementById("category_2").value = data.category;
                                document.getElementById("brand_2").value = data.brand;
                                document.getElementById("image_name_2").value = data.image_name;
                                document.getElementById("color_2").value = data.color;
                                document.getElementById("price_2").value = data.price;
                                document.getElementById("quantity_2").value = data.quantity;
                            }
                        })
                    }
        }

        function GetDetail3(str) {
            if (str.length == 0) {
                document.getElementById('product_name_3').value = "";
                document.getElementById("price_3").value = "";
                return;
            }else{
                        $.ajax({
                            url:'getData.php',
                            type:'get',
                            data:'code='+str,
                            success:function(dataResult){
                                var data = JSON.parse(dataResult);
                                document.getElementById("product_name_3").value = data.product_name;
                                document.getElementById("category_3").value = data.category;
                                document.getElementById("brand_3").value = data.brand;
                                document.getElementById("image_name_3").value = data.image_name;
                                document.getElementById("color_3").value = data.color;
                                document.getElementById("price_3").value = data.price;
                                document.getElementById("quantity_3").value = data.quantity;
                            }
                        })
                    }
        }

        function GetDetail4(str) {
            if (str.length == 0) {
                document.getElementById('product_name_4').value = "";
                document.getElementById("price_4").value = "";
                return;
            }else{
                        $.ajax({
                            url:'getData.php',
                            type:'get',
                            data:'code='+str,
                            success:function(dataResult){
                                var data = JSON.parse(dataResult);
                                document.getElementById("product_name_4").value = data.product_name;
                                document.getElementById("category_4").value = data.category;
                                document.getElementById("brand_4").value = data.brand;
                                document.getElementById("image_name_4").value = data.image_name;
                                document.getElementById("color_4").value = data.color;
                                document.getElementById("price_4").value = data.price;
                                document.getElementById("quantity_4").value = data.quantity;
                            }
                        })
                    }
        }

        function GetDetail5(str) {
            if (str.length == 0) {
                document.getElementById('product_name_5').value = "";
                document.getElementById("price_5").value = "";
                return;
            }else{
                        $.ajax({
                            url:'getData.php',
                            type:'get',
                            data:'code='+str,
                            success:function(dataResult){
                                var data = JSON.parse(dataResult);
                                document.getElementById("product_name_5").value = data.product_name;
                                document.getElementById("category_5").value = data.category;
                                document.getElementById("brand_5").value = data.brand;
                                document.getElementById("image_name_5").value = data.image_name;
                                document.getElementById("color_5").value = data.color;
                                document.getElementById("price_5").value = data.price;
                                document.getElementById("quantity_5").value = data.quantity;
                            }
                        })
                    }
        }

        function GetDetail6(str) {
            if (str.length == 0) {
                document.getElementById('product_name_6').value = "";
                document.getElementById("price_6").value = "";
                return;
            }else{
                        $.ajax({
                            url:'getData.php',
                            type:'get',
                            data:'code='+str,
                            success:function(dataResult){
                                var data = JSON.parse(dataResult);
                                document.getElementById("product_name_6").value = data.product_name;
                                document.getElementById("category_6").value = data.category;
                                document.getElementById("brand_6").value = data.brand;
                                document.getElementById("image_name_6").value = data.image_name;
                                document.getElementById("color_6").value = data.color;
                                document.getElementById("price_6").value = data.price;
                                document.getElementById("quantity_6").value = data.quantity;
                            }
                        })
                    }
        }

        function GetDetail7(str) {
            if (str.length == 0) {
                document.getElementById('product_name_7').value = "";
                document.getElementById("price_7").value = "";
                return;
            }else{
                        $.ajax({
                            url:'getData.php',
                            type:'get',
                            data:'code='+str,
                            success:function(dataResult){
                                var data = JSON.parse(dataResult);
                                document.getElementById("product_name_7").value = data.product_name;
                                document.getElementById("category_7").value = data.category;
                                document.getElementById("brand_7").value = data.brand;
                                document.getElementById("image_name_7").value = data.image_name;
                                document.getElementById("color_7").value = data.color;
                                document.getElementById("price_7").value = data.price;
                                document.getElementById("quantity_7").value = data.quantity;
                            }
                        })
                    }
        }

        function GetDetail8(str) {
            if (str.length == 0) {
                document.getElementById('product_name_8').value = "";
                document.getElementById("price_8").value = "";
                return;
            }else{
                        $.ajax({
                            url:'getData.php',
                            type:'get',
                            data:'code='+str,
                            success:function(dataResult){
                                var data = JSON.parse(dataResult);
                                document.getElementById("product_name_8").value = data.product_name;
                                document.getElementById("category_8").value = data.category;
                                document.getElementById("brand_8").value = data.brand;
                                document.getElementById("image_name_8").value = data.image_name;
                                document.getElementById("color_8").value = data.color;
                                document.getElementById("price_8").value = data.price;
                                document.getElementById("quantity_8").value = data.quantity;
                            }
                        })
                    }
        }

        function GetDetail9(str) {
            if (str.length == 0) {
                document.getElementById('product_name_9').value = "";
                document.getElementById("price_9").value = "";
                return;
            }else{
                        $.ajax({
                            url:'getData.php',
                            type:'get',
                            data:'code='+str,
                            success:function(dataResult){
                                var data = JSON.parse(dataResult);
                                document.getElementById("product_name_9").value = data.product_name;
                                document.getElementById("category_9").value = data.category;
                                document.getElementById("brand_9").value = data.brand;
                                document.getElementById("image_name_9").value = data.image_name;
                                document.getElementById("color_9").value = data.color;
                                document.getElementById("price_9").value = data.price;
                                document.getElementById("quantity_9").value = data.quantity;
                            }
                        })
                    }
        }

        function GetDetail10(str) {
            if (str.length == 0) {
                document.getElementById('product_name_10').value = "";
                document.getElementById("price_10").value = "";
                return;
            }else{
                        $.ajax({
                            url:'getData.php',
                            type:'get',
                            data:'code='+str,
                            success:function(dataResult){
                                var data = JSON.parse(dataResult);
                                document.getElementById("product_name_10").value = data.product_name;
                                document.getElementById("category_10").value = data.category;
                                document.getElementById("brand_10").value = data.brand;
                                document.getElementById("image_name_10").value = data.image_name;
                                document.getElementById("color_10").value = data.color;
                                document.getElementById("price_10").value = data.price;
                                document.getElementById("quantity_10").value = data.quantity;
                            }
                        })
                    }
        }
</script>