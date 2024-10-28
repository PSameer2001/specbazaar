<?php
include 'config/conn.php';
$name = $_SESSION['username'];
$email = $_SESSION['email'];
if (isset($_SESSION['product'])) {
	unset($_SESSION['product']);
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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">


	<link rel="stylesheet" href="css/style.css">


	<style>
		.cartbox {
			padding: 5rem 1%;
		}

		.card1 {
			border: none;
			text-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
			padding: 2rem;
		}

		.prodcart {
			-webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
			box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
			border-radius: 2rem;
		}

		.right_side {
			-webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
			box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
		}

		.main_cart {
			-webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.4);
			box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.4);
		}

		.main1_cart {
			margin: auto;
			margin-top: 2rem;
			cursor: pointer;
		}

		.imgbox1 {
			margin: 2rem auto;
			border-radius: 2.5rem;
		}

		.imgbox1 img {
			border-radius: 2.5rem;
		}

		.prodetail {
			margin: 1rem auto;
			margin-top: 3.5rem;
		}

		.product_name {
			font-size: 2.5rem;
			font-weight: 600;
			color: #555;
		}

		.set_quantity {
			position: relative;
		}

		.set_quantity::after {
			content: "(Note, 1 piece)";
			width: auto;
			height: auto;
			text-align: center;
			position: absolute;
			bottom: -1.4rem;
			right: 2.5rem;
			font-size: 0.8rem;

		}

		.page-link {
			line-height: 1.8rem;
			width: 3.5rem;
			font-size: 1rem;
			display: flex;
			justify-content: center;
			align-items: center;
			color: #495057;
			padding: 0.3rem;
		}

		.page-link:focus {
			box-shadow: none;
		}

		.page-item input {
			line-height: 1.6rem;
			padding: 0.0rem;
			font-size: 1.5rem;
			display: flex;
			justify-content: center;
			align-items: center;
			text-align: center;
		}

		.card-title p {
			font-size: 1.5rem;
			font-weight: 400;
			color: #777;
		}

		.remove_wish {
			font-size: 1.7rem;
			cursor: pointer;
			color: #222;
			text-shadow: 0 0.5rem 0.7rem rgba(0, 0, 0, 0.2);
		}

		.remove_wish:hover {
			color: #E75480;
		}

		.price_money {
			margin-top: 0.5rem;
			font-size: 1.7rem;
			cursor: pointer;
			color: #222;
			text-shadow: 0 0.5rem 0.7rem rgba(0, 0, 0, 0.2);
		}

		.carrd-body a {
			justify-content: space-between;
			text-decoration: none;
			color: #223;
			font-size: 1.5rem;
			font-weight: 400;
		}


		#addclint {
			font-size: 1.2rem;
			cursor: pointer;
			color: #222;
			font-weight: 400;
			line-height: 0.7em;
		}

		#textclint {
			margin: 1rem 0;
			padding: 1rem;
			font-size: 1.3rem;
			color: #333;
			background: #d9d9d9;
			text-decoration: none;
			box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
		}


		.card2 {
			border: .2rem solid #999;
			padding: 1rem 2rem;
			-webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
			box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
		}

		#discount_code1 {
			margin: 1rem 0;
			padding: 1rem;
			font-size: 1.3rem;
			color: #333;
			background: #d9d9d9;
			text-decoration: none;
			box-shadow: 0 1rem 2rem rgba(0, 0, 0, .1);
		}

		#appbtn {
			cursor: pointer;
			border-radius: 2.5rem;
			padding: 0.6rem 3rem;
			font-size: 1.3rem;

		}

		.price_indiv p {
			font-size: 1.5rem;
			font-weight: 400;
			color: #777;
		}

		.total-amt p {
			font-size: 1.5rem;
			font-weight: 400;
			color: #777;
		}


		.activity {
			font-size: 1.7rem;
			cursor: pointer;
			color: #222;
			text-shadow: 0 0.5rem 0.7rem rgba(0, 0, 0, 0.2);
			margin-top: 4rem;
		}
		
/* track order css */


.modal-content {
    background-image: linear-gradient(to top right, purple , pink);
    box-shadow: 2pt 2pt rgb(0,0,0,0.2);
    border-color: #ff00e1;
    border-radius: 1rem;
}

@media (min-width: 576px) {
    .modal-dialog {
        max-width: 750px;
        margin: 1.75rem auto;
    }
}

.show {
    padding: 0;
}

.modal-header {
    border-bottom: none;
    text-align: center;
}

.modal-header .close {
    padding: 1rem 1rem;
    margin: -1rem -1rem -1rem 0;
    color: #fff;
}

:-moz-any-link:focus {
    outline: none;
}

.modal-title {
    line-height: 3rem;
}

.modal-body {
    padding: 1rem;
}

#progressbar {
    margin-bottom: 3vh;
    overflow: hidden;
    color: white;
    padding-left: 0px;
    margin-top: 3vh
}

#progressbar li {
    list-style-type: none;
    font-size: 0.8rem;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
    color: white;
}

#progressbar #step1:before {
    content: "";
    color: white;
    width: 20px;
    height: 20px;
    margin-left: 0px !important;
}

#progressbar #step2:before {
    content: "";
    color: #fff;
    width: 20px;
    height: 20px;
    margin-left: 32%;
}

#progressbar #step3:before {
    content: "";
    color: #fff;
    width: 20px;
    height: 20px;
    margin-right: 32%;
}

#progressbar #step4:before {
    content: "";
    color: rgb(151, 149, 149, 0.651);
    width: 20px;
    height: 20px;
    margin-right: 0px !important;
}

#progressbar li:before {
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: rgb(151, 149, 149);
    border-radius: 50%;
    margin: auto;
    z-index: -1;
    margin-bottom: 1vh;
}

#progressbar li:after {
    content: '';
    height: 3px;
    background: rgb(151, 149, 149, 0.651);
    position: absolute;
    left: 0%;
    right: 0%;
    margin-bottom: 2vh;
    top: 8px;
    z-index: 1;
}

.progress-track {
    padding: 0 8%;
}

#progressbar li:nth-child(2):after {
    margin-right: auto;
}

#progressbar li:nth-child(1):after {
    margin: auto;
}

#progressbar li:nth-child(3):after {
    float: left;
    width: 68%;
}

#progressbar li:nth-child(4):after {
    margin-left: auto;
    width: 132%;
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: white;
}

#three {
    font-size: 1.2rem;
}

@media (max-width: 767px) {
    #three {
        font-size: 1rem;
    }
}

.details {
    padding: 2rem;
    font-size: 1.4rem;
    line-height: 3.5rem;
}

@media (max-width: 767px) {
    .details {
        padding: 2rem 0;
        font-size: 1rem;
        line-height: 2.5rem;
    }
}

.d-table {
    width: 100%;
}

.d-table-row {
    width: 100%;
}

.d-table-cell {
    padding-left: 3rem;
}

@media (max-width: 767px) {
    .d-table-cell {
        padding-left: 1rem;
    }
	.modal-header {
		font-size: 14px !important;
	}
	.d-table-cell{
		font-size: 14px;
	}
	#progressbar li{
		font-size: 14px;
	}


}

.col-3 {
    display: grid;
    text-align: end;
}

.col-3 .d-table-row {
    align-self: flex-end;
}

.fa {
    font-size: xx-large;
    text-align: center;
    width: 3rem;
    padding: 0.5rem;
    color: #42469d;
    background-color: #fff;
    border-radius: 2rem;
    bottom: 0;
    right: 0;
}

button:active {
    outline: none;
}

button:focus {
    outline: none;
}

button {
    margin-top: 50vh
}

#tracker_model {
    display: none;
}


#progressbar li{
    font-size: 18px;
}

#tracker{
    padding: 0.5rem;
    border: none;
    border-radius: 0.2rem;
    font-size: small;
    background-color: #f5f5f5;
}

#tracker:hover{
    background-color: #ff00e1;
    color: white;
}

.larger{
    font-size: 24px;
    color: white;
}

	</style>


</head>

<body>

	<!---------------------------header section------------------------------------------->

	<header class="header">

		<a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a>

		<form action="" class="search-form">
			<input type="search" name="" placeholder="search here...." id="search-box">
			<label for="search-box" class="fas fa-search"></label>
		</form>

		<div class="icons">
			<div id="menu-btn" class="fas fa-bars"></div>
			<div id="search-btn" class="fas fa-search"></div>
			<div class="fas fa-user" id="use"></div>
		</div>

		<div class="userr">
			<div class="profile">
				<div id="close-profile" class="fas fa-times"></div>
				<h3>Someone Name<br><span>Welcom to Specs Bazaar</span></h3>
				<ul>
					<li><i class="fa-regular fa-circle-user"></i><a href="#">My Profile</a></li>
					<li><i class="fas fa-edit"></i><a href="#">Edit Profile</a></li>
					<li id="res1"><i class="fas fa-shopping-cart"></i><a href="#">Cart</a></li>
					<li><i class="fas fa-box"></i><a href="#">My Order</a></li>
					<li><i class="fas fa-list"></i><a href="#">Terms</a></li>
					<li><i class="fas fa-right-from-bracket"></i><a href="#">Logout</a></li>
				</ul>
			</div>
		</div>

	</header>
	<!---------------------------header end------------------------------------------->

	<!--------------------------navbar section----------------------------------------->

	<nav class="navbar">

		<div id="close-navbar" class="fas fa-times"></div>

		<a href="#home">home</a>
		<a href="#category">category</a>
		<a href="#shop">Sale products</a>
		<a href="#popular">popular</a>
		<a href="#gallery">gallery</a>
		<a href="#arrivals">New arrivals</a>
		<a href="#contact">contact us</a>
	</nav>

	<!--------------------------navbar section----------------------------------------->


	<section class="ordercontainer">

	<div class="heading">
			<h1>Your Order</h1>
		</div>
		



		<div class="container-fluid">

			<div class="row">
				<?php
				$sql = "SELECT * FROM orders WHERE customer_name='$name' AND customer_email='$email' AND (status='processing' OR status='ordered' OR status='on delivery')";
				$res = mysqli_query($conn, $sql);
				$count = mysqli_num_rows($res);
				if ($count > 0) {
					while ($row = mysqli_fetch_assoc($res)) {
						$id = $row['id'];
						$title = $row['product_name'];
						$image_name = $row['image_name'];
						$price = $row['price'];
						$quantity = $row['quantity'];
						$category = $row['category'];
						$total = $row['total'];
						$brand = $row['brand'];
						$color = $row['color'];
						$publisher = $row['publisher'];
						$orderTime = $row['order_date'];
						$publisher = $row['publisher'];
						$status = $row['status'];
						$customer_name = $row['customer_name'];
						$customer_contact = $row['customer_contact'];
						$customer_email = $row['customer_email'];
						$customer_address = $row['customer_address'];
				?>
						<div class="prodcart col-md-11 col-lg-11 col-11 main1_cart mb-lg-0 mb-5">

							<div class="row">
								<!-- cart images div -->
								<div class="imgbox1 col-md-3 col-11 d-flex justify-content-center align-items-center shadow product_img">
									<img src="<?php echo SITEURL ?>images/products/<?php echo $image_name ?>" class="img-fluid" alt="cart img">
								</div>

								<!-- cart product details -->
								<div class="prodetail col-md-6 col-11">
									<div class="row">
										<!-- product name  -->
										<div class="col-6 card-title">
											<h1 class="mb-4 product_name"><?php echo $title ?></h1>
											<p class="mb-1">Brand : <?php echo $brand ?></p>
											<p class="mb-1">Color: <?php echo $color ?></p>
											<p class="mb-3">Category: <?php echo $category ?></p>
										</div>



									</div>

									<!-- //remover move and price -->
									<div class="row">
										<div class="col-lg-6 col-md-6 col-6 d-flex justify-content-between activity">
											<p><i class="fas fa-box"></i> <?php echo $status ?></p>
										</div>
										<div>
			<input type="button" value="Track My Order" id="tracker">
		</div>

		


		<div id="tracker_model">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title mx-auto" style="font-size:24px;">Order Status<br>AWB Number-5335T5S</h4>
						<button type="button" class="close" data-dismiss="modal" id="tracker_closer">×</button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<div class="progress-track">
							<ul id="progressbar">
								<li class="step0 active " id="step1">Order placed</li>
								<li class="step0 active text-center" id="step2">In Transit</li>
								<li class="step0 active text-right" id="step3"><span id="three" style="font-size: 18px;">Out for Delivery</span></li>
								<li class="step0 text-right" id="step4">Delivered</li>
							</ul>
						</div>
						<div class="row">
							<div class="col-9">
								<div class="details d-table">
									<div class="d-table-row">
										<div class="d-table-cell larger">
											Shipped with
										</div>
										<div class="d-table-cell larger">
											UPS Expedited
										</div>
									</div>
									<div class="d-table-row ">
										<div class="d-table-cell larger">
											Estimated Delivery
										</div>
										<div class="d-table-cell larger">
											02/12/2017
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
										<div class="col-lg-12 col-md-12 col-12 d-flex justify-content-end price_money">
											<h3>Rs.<span id="itemval"><?php echo $price ?> </span></h3>
										</div>

									</div>
								</div>
							</div>
						</div>
					<?php
					}
				} else {
					?>
					<h1>No Orders Placed</h1>
				<?php
				}
				?>
			</div>


		</div>





































































	</section>














































	<section class="footer">

		<div class="box-container">

			<div class="box">
				<h3>about us</h3>
				<p>Driven by the mission to provide the best eye care to all, We have pan-India reachability with 50 eye care centres across the country. Our recently opened</p>
			</div>

			<div class="box">
				<h3>quick links</h3>
				<a class="link" href="#home"> <i class="fas fa-angle-right"></i> home</a>
				<a class="link" href="#shop"> <i class="fas fa-angle-right"></i> shop</a>
				<a class="link" href="#gallery"> <i class="fas fa-angle-right"></i> gallery</a>
				<a class="link" href="#team"> <i class="fas fa-angle-right"></i> team</a>
				<a class="link" href="#arrivals"> <i class="fas fa-angle-right"></i> arrivals</a>
				<a class="link" href="#blogs"> <i class="fas fa-angle-right"></i> blogs</a>
			</div>

			<div class="box">
				<h3>extra links</h3>
				<a href="#" class="link"> <i class="fas fa-angle-right"></i> my order </a>
				<a href="#" class="link"> <i class="fas fa-angle-right"></i> my favorite </a>
				<a href="#" class="link"> <i class="fas fa-angle-right"></i> my wishlist </a>
				<a href="#" class="link"> <i class="fas fa-angle-right"></i> private policy </a>
				<a href="#" class="link"> <i class="fas fa-angle-right"></i> terms of use </a>
			</div>

			<div class="box">
				<h3>contact info</h3>
				<p> <i class="fas fa-phone"></i> +123-456-7890 </p>
				<p> <i class="fas fa-phone"></i> +111-222-3333 </p>
				<p> <i class="fas fa-envelope"></i> khan.sfaisal@gmail.com </p>
				<p> <i class="fas fa-map"></i> mumbai, india - 400072 </p>
				<div class="share">
					<a href="#" class="fab fa-facebook-f"></a>
					<a href="#" class="fab fa-twitter"></a>
					<a href="#" class="fab fa-instagram"></a>
				</div>
			</div>

		</div>

		<!----    <div class="credit"></div>  ---->

	</section>

	</div>

	<!-- footer section ends -->



	<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>


	<script src="js/script.js"></script>

	<script>
		let usr2 = document.querySelector('#use');
		let detail2 = document.querySelector('.userr');


		usr2.addEventListener('click', () => {
			detail2.style.visibility = "visible";
			detail2.style.opacity = "1";
		});

		let clo2 = document.querySelector('#close-profile');

		clo2.addEventListener('click', () => {
			detail2.style.visibility = "hidden";
			detail2.style.opacity = "0";
		});


		const decreaseNumber = (incdec) => {
			var itemval = document.getElementById(incdec);

			if (itemval.value <= 0) {
				itemval.value = 0;
				alert("Negative quantity not allowed!");
			} else {
				itemval.value = parseInt(itemval.value) - 1;
				itemval.style.background = "fff";
				itemval.style.color = "000";
			}
		}

		const increaseNumber = (incdec) => {
			var itemval = document.getElementById(incdec);

			if (itemval.value >= 5) {
				itemval.value = 5;
				alert("max 5 allowed!");
				itemval.style.background = "red";
				itemval.style.color = "fff";
			} else {
				itemval.value = parseInt(itemval.value) + 1;
			}
		}

		// tracker js
		const tracker = document.getElementById("tracker");
        const tracker_model = document.getElementById("tracker_model");
        const tracker_closer = document.getElementById("tracker_closer");

        tracker_closer.addEventListener("click", function () {
            tracker_model.style.display = "none";
        })

        tracker.addEventListener("click", function () {
			if (tracker_model.style.display == "none"){
				tracker_model.style.display = "block";
			}
			else{
				tracker_model.style.display = "none";
			}
        })
	</script>




</body>

</html>