<?php
    include('../../config/conn.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id='$id'";
        $res = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($res)){
            $membership_status = $row['gold_membership'];
        }
        if($membership_status == 'true'){
            $new_status = 'false';
        }else{
            $new_status = 'true';
        }

        $sql2 = "UPDATE users SET
        gold_membership = '$new_status'
        WHERE id='$id'";
        $res2 = mysqli_query($conn,$sql2);
        if($res2){
            header('location:users.php');
        }else{
            echo 'nhi hua';
        }

    }
?>