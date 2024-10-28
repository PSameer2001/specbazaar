<?php 
include('./config/conn.php');
if(isset($_POST['submit']))
    {
            
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $contact=$_POST['contact'];
            $address=$_POST['address'];
            
            if($password == $cpassword){
                $password = password_hash($password, PASSWORD_DEFAULT);

                $sql2 = "SELECT * FROM users WHERE email='$email'";
                $res2 = mysqli_query($conn,$sql2);
                $count2 = mysqli_num_rows($res2);
                if($count2>0){
                    echo 'email already registered';
                }else{
                    $sql = "INSERT INTO users SET
                    email= '$email',
                    username= '$username',
                    contact= $contact,
                    address= '$address',
                    password= '$password',
                    gold_membership = 'false'
                ";
                $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            
                if($res==TRUE)
                {
                    ?>
                    <script>window.location.href='<?php echo SITEURL;?>index.php'</script>;
                    <?php
                }  
                
                else
                {
                    echo 'h';
                    // ?>
                    // <script>window.location.href='<?php echo SITEURL;?>re.php'</script>;
                    // <?php
                }
                }
            }else{
                echo 'not same';
            }
                
        
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lenskart</title>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

    <link rel="icon" href="images/logo/logo.jpeg">
	<link rel="stylesheet" href="css/style.css">


</head>
<body>

<!---------------------------header section------------------------------------------->

<header class="header">

	<a href="#home" class="logo"><img src="images/logo.jpg" alt=""></a>

</header>

<section class="registration">

<div class="signup-form-container">

    <form action="" method="post">
        <h3>Registration</h3>
        <div class="inputBox">
                <input type="text" name="username" placeholder="Enter your Name">
                <input type="email" name="email" placeholder="Enter your Email">
        </div>
        <div class="inputBox">
                <input type="text" name="contact" placeholder="Enter your Number">
         </div>
        <textarea placeholder="Enter your Full Address" name="address" id="" cols="30" rows="5"></textarea>
        <div class="inputBox">
                <input type="password" name="password" placeholder="Enter your password">
                <input type="password" name="cpassword" placeholder="Confirm your password">
        </div>
        <input type="submit" name="submit" value="Registration now" class="btn">
    </form>

</div>


</section>









<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

<script src="js/script.js"></script>

<script>
    lightGallery(document.querySelector('.gallery .lightbox'));

   


</script>


</body>
</html>