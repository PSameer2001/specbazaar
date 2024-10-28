<?php 
include 'config/conn.php';
if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $whatsapp_contact = $_POST['whatsapp_contact'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $appointment=$_POST['appointment'];
        $tester = 'superAdmin';
        $visited = 'No';
        $description = 'Not Contacted Yet';
        $sql = "INSERT INTO home_try_on SET
            email= '$email',
            username= '$username',
            contact= $contact,
            address= '$address',
            whatsapp_contact= $whatsapp_contact,
            visited = '$visited',
            description = '$description',
            appointment_type = '$appointment',
            tester='$tester'
        ";
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    
        if($res==TRUE)
        {
            ?>
            <script>window.location.href='<?php echo SITEURL;?>index.php'
                close();
            </script>;
            <?php
        }  
        
        else
        {
            ?>
            <script>window.location.href='<?php echo SITEURL;?>index.php'</script>;
            <?php
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SpecsBazaar</title>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

    <link rel="icon" href="images/logo/logo.jpeg">
	<link rel="stylesheet" href="css/style.css">


</head>
<style>
    .hide{
        display:none;
    }
    .active{
        display:block;
    }
</style>
<body>

<!---------------------------header section------------------------------------------->

<header class="header">

	<a href="#home" class="logo"><img src="images/logo.jpg" alt=""></a>

	<div class="icons">
		<div id="menu-btn" class="fas fa-bars"></div>
		<div herf="#" class="fas fa-shopping-cart" id="cart-btn"></div>
		<div herf="#" class="fas fa-user" id="login-btn"></div>
	</div>

</header>
<!---------------------------header end------------------------------------------->

<!--------------------------navbar section----------------------------------------->

<nav class="navbar">

	<div id="close-navbar" class="fas fa-times"></div>

	<a href="#home">home</a>
	<a href="#sale">sale</a>
	<a href="#gallery">gallery</a>
	<a href="#popular">popular</a>
	<a href="#category">category</a>
	<a href="#review">review</a>
</nav>

<!--------------------------navbar section----------------------------------------->


<!---------------------------home try on form ------------------------------->

<section class="hometrial">

	<video autoplay loop muted plays-inline class="back_video">
		<source src="images/hometrial.mp4" type="video/mp4">
	</video>
	



	<div class="home-try-container">

	    <form action="" method="post">
	        <h3>Home Try On</h3>
            <p>Appointment Type</p>
                <label class="space" for="opthamalogist">opthamalogist</label><input type="radio" name="appointment" value="opthamalogist"> 
                <label class="space" for="optometrist">optometrist</label><input type="radio" name="appointment" value="optometrist">
                <label class="space" for="vision therapist">vision therapist</label><input type="radio" name="appointment" value="vision therapist">
	        <div class="inputBox">
                <input type="text" placeholder="name" name="username">
                <input type="email" placeholder="email" name="email">
            </div>
            <div class="inputBox">
                <input type="text" placeholder="number" name="contact">
                <input type="text" placeholder="whatsapp number" name="whatsapp_contact">
            </div>
            <textarea placeholder="Address" name="address" id="" cols="30" rows="10"></textarea>
	        <input type="submit" name="submit" value="Submit" class="btn">
            
            
	    </form>

	</div>












</section>




<!---------------------------home try on form ------------------------------->





<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

<script src="js/script.js"></script>



<script>
    var list = document.getElementById('branches');
    function toggle{
        list.classList.toggle('active');
        list.classList.toggle('hide');
    }
</script>
</body>
</html>