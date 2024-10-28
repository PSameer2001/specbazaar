<?php
	include('./config/conn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SpecsBazaar</title>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

	<link rel="stylesheet" href="css/style.css">



</head>
<body>

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



<section class="clinprof">


    <div class="clintail">
        <h3>Profile</h3>
        <div id="c76">
        	<i class="fas fa-user-circle"></i>
    	</div>
        <div class="inputBox">
                <input readonly type="text" value="<?php echo $_SESSION['username'] ?>">
                <input readonly type="email" value="<?php echo $_SESSION['email'] ?>">
        </div>
        <div class="inputBox">
                <input readonly type="text" value="<?php echo $_SESSION['contact'] ?>">
         </div>
        <textarea readonly name="" id="" cols="30" rows="5"><?php echo $_SESSION['address'] ?></textarea>
        <a href="index.php" class="btn">Back</a>
    </div>


</section>
































<script src="js/script.js"></script>




</body>
</html>