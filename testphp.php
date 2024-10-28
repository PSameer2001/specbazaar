<?php 
    include("config/conn.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
            background-color: rgb(0, 0, 0, 0.2);
        }
        .img_test{
            width: 10rem;
            height: 10rem;
            background-color: white;
        }
    </style>
</head>
<body>

    <?php
        $sql5 = "SELECT * FROM banner WHERE active='YES'";
        $res5 = mysqli_query($conn, $sql5);
        $count5 = mysqli_num_rows($res5);
        $first_row = true;

        if($count5>0){
            while($row5 = mysqli_fetch_array($res5)){
                $image = $row5['banner_image'];
            ?>
            <div class='img_test'>
                <img src="<?php echo SITEURL?>/banner/image<?php echo $image?>" alt="">
            </div>
            <?php
            }
            } 
        else{
            echo "something wrong bhai";
             } 
            ?>
</body>
</html>

