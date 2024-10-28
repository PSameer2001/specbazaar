<?php
    include '../../config/conn.php';
    if(isset($_GET['code'])){
        $code = $_GET['code'];
        $sql = "SELECT * FROM products WHERE product_code='$code'";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        $count = mysqli_num_rows($res);
        $jsonArr = array();
        if($count>0){
            $product_name = $row['title'];
            $price = $row['price'];
            $category_id = $row['category_id'];
            $brand = $row['brand'];
            $color = $row['color'];
            $image_name = $row['image_name'];
            $sql2 = "SELECT * FROM category WHERE id='$category_id'";
            $res2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($res2);
            $category = $row2['title'];
            $jsonArr = array('product_name'=>"$product_name",'price'=>"$price",'image_name'=>"$image_name",'category'=>"$category",'brand'=>"$brand",'color'=>"$color",'quantity'=>"1");
        }else{
            $jsonArr = array('product_name'=>"",'price'=>"");
        }
            echo json_encode($jsonArr);
        }
?>