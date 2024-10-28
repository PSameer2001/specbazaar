<?php
    include '../../config/conn.php';
    $data = $_SESSION['invoice_data'];
    $count = count(array_filter($data));
    $length = 10-$count;
    for($i = 0;$i<$count-1;$i++){
        echo $i;
        print_r($data['product_name'][$i]);
        echo '<br>';
        print_r($data['price'][$i]);
        echo '<br>';
        // print_r($data['total'][$i]);
    }
?>