<?php
    include('./partials/header.php');
    
    if(isset($_POST['submit'])){

        $charge = $_POST['newshipcharge'];

        $sql = "UPDATE shipping_charge SET
        charge = $charge
        ";
        $res = mysqli_query($conn,$sql);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Charge</title>
</head>
<body>
    <h1>Shipping Charge</h1>
    <?php
    $sql2 = "SELECT * FROM shipping_charge";
    $res2 = mysqli_query($conn,$sql2);
    while($row = mysqli_fetch_assoc($res2)){
        $currentCharge = $row['charge'];
        ?>
            <p>Current Shipping Charge : </p><input type="text" name="cshipcharge" readonly value="<?php echo $currentCharge; ?>">
        <?php
    }
    ?>
    <form action="" method="post">
        <p>New Shipping Charge : </p><input type="text" name="newshipcharge" placeholder="Enter New Shipping Charge"><br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>