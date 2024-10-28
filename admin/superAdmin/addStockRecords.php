<?php
    include '../../config/conn.php';
    $owner = $_SESSION['superAdmin'];
    if(isset($_POST['submit'])){
        $stock_code = $_POST['stock_code'];
        $stock_name = $_POST['stock_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        
        foreach($stock_name as $key=>$id){
            $total_price = (int)$price[$key]*(int)$quantity[$key];
            $sql2 = "INSERT into stock_records SET
            supplier_name = '$owner',
            stock_code = '$stock_code[$key]',
            stock_name = '$stock_name[$key]',
            quantity = $quantity[$key],
            unit_price = $price[$key],
            total_price = $total_price

            ";
            $res2 = mysqli_query($conn,$sql2);
            ?>
                <script>window.location.href='<?php echo SITEURL; ?>admin/superAdmin/stockRecords.php'</script>
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
    <title>Document</title>
</head>
<body>

<section class="registration">

<div class="signup-form-container1">
<form action="" method="post">
    <div>
    <table>
        <tr>
            <td>
        <label>Stock code: </label><input type='text' id='stock_code' name='stock_code[]'></td>
        <td> <label>Stock Name: </label><input type='text'  name="stock_name[]" id="stock_name_1"></td>
         <td> <label>Quantity: </label><input type='number'  name="quantity[]" id="quantity_1"></td>
         <!-- <td> <input type='file'  name="image_name[]" id="image_name_1"></td> -->
         <td><label>price: </label><input type='number'  name="price[]" id="price_1"></td>
         </td>
        </tr>
        <tr>
            <td>
        <label>Stock code: </label><input type='text' id='stock_code' name='stock_code[]'></td>
        <td> <label>Stock Name: </label><input type='text'  name="stock_name[]" id="stock_name_1"></td>
         <td> <label>Quantity: </label><input type='number'  name="quantity[]" id="quantity_1"></td>
         <!-- <td> <input type='file'  name="image_name[]" id="image_name_1"></td> -->
         <td><label>price: </label><input type='number'  name="price[]" id="price_1"></td>
         </td>
        </tr>
        <tr>
            <td>
        <label>Stock code: </label><input type='text' id='stock_code' name='stock_code[]'></td>
        <td> <label>Stock Name: </label><input type='text'  name="stock_name[]" id="stock_name_1"></td>
         <td> <label>Quantity: </label><input type='number'  name="quantity[]" id="quantity_1"></td>
         <!-- <td> <input type='file'  name="image_name[]" id="image_name_1"></td> -->
         <td><label>price: </label><input type='number'  name="price[]" id="price_1"></td>
         </td>
        </tr>
        <tr>
            <td>
        <label>Stock code: </label><input type='text' id='stock_code' name='stock_code[]'></td>
        <td> <label>Stock Name: </label><input type='text'  name="stock_name[]" id="stock_name_1"></td>
         <td> <label>Quantity: </label><input type='number'  name="quantity[]" id="quantity_1"></td>
         <!-- <td> <input type='file'  name="image_name[]" id="image_name_1"></td> -->
         <td><label>price: </label><input type='number'  name="price[]" id="price_1"></td>
         </td>
        </tr>
        <tr>
            <td>
        <label>Stock code: </label><input type='text' id='stock_code' name='stock_code[]'></td>
        <td> <label>Stock Name: </label><input type='text'  name="stock_name[]" id="stock_name_1"></td>
         <td> <label>Quantity: </label><input type='number'  name="quantity[]" id="quantity_1"></td>
         <!-- <td> <input type='file'  name="image_name[]" id="image_name_1"></td> -->
         <td><label>price: </label><input type='number'  name="price[]" id="price_1"></td>
         </td>
        </tr>
        <tr>
            <td>
        <label>Stock code: </label><input type='text' id='stock_code' name='stock_code[]'></td>
        <td> <label>Stock Name: </label><input type='text'  name="stock_name[]" id="stock_name_1"></td>
         <td> <label>Quantity: </label><input type='number'  name="quantity[]" id="quantity_1"></td>
         <!-- <td> <input type='file'  name="image_name[]" id="image_name_1"></td> -->
         <td><label>price: </label><input type='number'  name="price[]" id="price_1"></td>
         </td>
        </tr>
        <tr>
            <td>
        <label>Stock code: </label><input type='text' id='stock_code' name='stock_code[]'></td>
        <td> <label>Stock Name: </label><input type='text'  name="stock_name[]" id="stock_name_1"></td>
         <td> <label>Quantity: </label><input type='number'  name="quantity[]" id="quantity_1"></td>
         <!-- <td> <input type='file'  name="image_name[]" id="image_name_1"></td> -->
         <td><label>price: </label><input type='number'  name="price[]" id="price_1"></td>
         </td>
        </tr>
        <tr>
            <td>
        <label>Stock code: </label><input type='text' id='stock_code' name='stock_code[]'></td>
        <td> <label>Stock Name: </label><input type='text'  name="stock_name[]" id="stock_name_1"></td>
         <td> <label>Quantity: </label><input type='number'  name="quantity[]" id="quantity_1"></td>
         <!-- <td> <input type='file'  name="image_name[]" id="image_name_1"></td> -->
         <td><label>price: </label><input type='number'  name="price[]" id="price_1"></td>
         </td>
        </tr>
        <tr>
            <td>
        <label>Stock code: </label><input type='text' id='stock_code' name='stock_code[]'></td>
        <td> <label>Stock Name: </label><input type='text'  name="stock_name[]" id="stock_name_1"></td>
         <td> <label>Quantity: </label><input type='number'  name="quantity[]" id="quantity_1"></td>
         <!-- <td> <input type='file'  name="image_name[]" id="image_name_1"></td> -->
         <td><label>price: </label><input type='number'  name="price[]" id="price_1"></td>
         </td>
        </tr>
        <tr>
            <td>
        <label>Stock code: </label><input type='text' id='stock_code' name='stock_code[]'></td>
        <td> <label>Stock Name: </label><input type='text'  name="stock_name[]" id="stock_name_1"></td>
         <td> <label>Quantity: </label><input type='number'  name="quantity[]" id="quantity_1"></td>
         <!-- <td> <input type='file'  name="image_name[]" id="image_name_1"></td> -->
         <td><label>price: </label><input type='number'  name="price[]" id="price_1"></td>
         </td>
        </tr>

</table>
    </div>
    <br>
    <br>

    <input type="submit" name="submit" value="submit" class="btn" id="pd1">
</form>
</div>

</section>



</body>
</html>