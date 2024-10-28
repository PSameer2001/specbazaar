<?php
    include('config/conn.php');
    if(isset($_POST['submit'])){
        if($_POST['new_password']==$_POST['confirm_password']){
            $email = $_POST['email'];
            $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            $sql = "UPDATE users SET password='$password' WHERE email='$email'";
            $res = mysqli_query($conn,$sql);
            header('location:index.php');
        }else{
            echo 'Password did not match';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>Email</p>
        <input type="text" name="email">
        <p>New Password</p>
        <input type="text" name="new_password">
        <p>Confirm Password</p>
        <input type="text" name="confirm_password">
        <input type="submit" value="Change Password" name="submit">
    </form>
</body>
</html>