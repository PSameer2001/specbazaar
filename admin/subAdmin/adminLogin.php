<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include ('../../config/conn.php');
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        
        $sql = "SELECT * FROM subadmin WHERE username='$username'";
        $result=mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num==1){
            while($row=mysqli_fetch_assoc($result)){
                if(password_verify($password,$row['password'])){
                    $_SESSION['subAdmin'] = $username;
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['sub_branch_name'] = $row['branch_name'];
                    $_SESSION['sub_address'] = $row['branch_location'];
                    $_SESSION['sub_contact'] = $row['sub_contact'];
                    $_SESSION['sub_branch_logo'] = $row['branch_image'];
                    if(isset($_POST['sub_remember'])){
                        setcookie ("sub_username",$username,time()+(10*365*24*60*60));
                        setcookie ("sub_password",$password,time()+(10*365*24*60*60));
                    }else{
                        if(isset($_COOKIE['sub_username'])){
                            setcookie ("sub_username","");
                        }
                        if(isset($_COOKIE['sub_password'])){
                            setcookie ("sub_password","");
                        }
                    }
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>admin/subAdmin/index.php';</script>
                    <?php
                }
                else{
                    echo 'Incorrect Password';
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
            <h3>Admin Login</h3>
            <input type="text" name="username" autocomplete="off" class="box" value="<?php if(isset($_COOKIE['sub_username'])) {echo $_COOKIE['sub_username'];} ?>" placeholder="enter your username">
            <input type="password" name="password" class="box" value="<?php if(isset($_COOKIE['sub_password'])) {echo $_COOKIE['sub_password'];} ?>" placeholder="enter your password">
            <input type="checkbox" <?php if(isset($_COOKIE['sup_username'])) {echo 'checked';} ?> name="sub_remember" id="remember"><label>Remember me</label>
            <input type="submit" class="btn" name="submit">
        </form>
    </div>
</section>
</body>
</html>