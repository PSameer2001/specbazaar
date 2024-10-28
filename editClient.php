<?php
	include('./config/conn.php');
	$user = $_SESSION['username'];
	$sql = "SELECT * FROM users WHERE username='$user'";
	$res = mysqli_query($conn,$sql);
	$count = mysqli_num_rows($res);
	if($count>0){
		while($row = mysqli_fetch_assoc($res)){
			$id = $row['id'];
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


		<form action="" method="post" class="clintail">
			<h3>Edit Profile</h3>
			<div id="c76">
				<i class="fas fa-user-edit"></i>
			</div>
			<div class="inputBox">
				<input type="text" name="username" value="<?php echo $user; ?>">
				<input type="email" name="email" value="<?php echo $_SESSION['email'] ?>">
			</div>
			<div class="inputBox">
				<input type="number" name="contact" value="<?php echo $_SESSION['contact'] ?>">
			</div>
			<textarea name="address" id="" cols="30" rows="5"><?php echo $_SESSION['address'] ?></textarea>
			<input type="submit" name="submit" value="Edit" class="btn">
			<a href="index.php" class="btn">Back</a>
			</div>
		</form>


	</section>

	<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

	<script src="js/script.js"></script>

</body>

</html>

<?php
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$address = $_POST['address'];

		$sql2 = "UPDATE users SET
		username = '$username',
		email = '$email',
		contact = $contact,
		address = '$address'
		WHERE id='$id'";
		$res2 = mysqli_query($conn,$sql2);
		if($res2){
			// echo 'hua';
			header('location:index.php');
		}else{
			// echo 'nhi hua';
			header('location:editClient.php');
		}
	}
?>