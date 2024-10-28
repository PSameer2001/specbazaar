<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include ('../../config/conn.php');
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        $sql = "SELECT * FROM superadmin WHERE username='$username'";
        $result=mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $_SESSION['superAdmin'] = $username;
                    $_SESSION['branch_name'] = $row['branch_name'];
                    $_SESSION['address'] = $row['branch_location'];
                    $_SESSION['sup_contact'] = $row['sup_contact'];
                    $_SESSION['sup_branch_logo'] = $row['branch_image'];
                    if(isset($_POST['sup_remember'])){
                        setcookie ("sup_username",$username,time()+(10*365*24*60*60));
                        setcookie ("sup_password",$password,time()+(10*365*24*60*60));
                    }else{
                        if(isset($_COOKIE['sup_username'])){
                            setcookie ("sup_username","");
                        }
                        if(isset($_COOKIE['sup_password'])){
                            setcookie ("sup_password","");
                        }
                    }
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/superAdmin/index.php';</script>
                    <?php
                }
            }
        }else{
            echo 'no account';
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo/logo.jpeg">
    <title>Login Page</title>


    <link rel="icon" href="../../images/logo/logo.jpeg">
    <link rel="stylesheet" href="/specsbazaar/css/style.css">

</head>
<body>
    
<section class="registration">

<div class="signup-form-container">
        <form method="post" action="adminLogin.php">
        <h3>Super Login</h3>
            <input type="text" name="username" autocomplete="off" class="box" value="<?php if(isset($_COOKIE['sup_username'])) {echo $_COOKIE['sup_username'];} ?>" placeholder="enter your username">
            <input type="password" name="password" class="box" value="<?php if(isset($_COOKIE['sup_password'])) {echo $_COOKIE['sup_password'];} ?>" placeholder="enter your password">
            <input type="checkbox" <?php if(isset($_COOKIE['sup_username'])) {echo 'checked';} ?> name="sup_remember" id="remember"><label>Remember me</label>
            <input type="submit" class="btn" name="submit">
        </form>
</div>

</body>
</html>