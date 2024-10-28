<?php 
	include 'config/conn.php';
	$name = $_SESSION['username'];
	$email = $_SESSION['email'];
	if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
	if(!isset($_SESSION['username'])){
		?>
		<script>window.location.href='<?php echo SITEURL ?>index.php'</script>
		<?php
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

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

	<link rel="icon" href="images/logo/logo.jpeg">
	<link rel="stylesheet" href="css/style.css">


	<style>
		

				.cartbox{
   					padding: 5rem 1%;
				}

				.card1{
				  border: none;
				  text-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.2);
				  padding: 2rem;
				}

				.prodcart{
				  -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
				          box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
				  border-radius: 2rem;       
				}

				.right_side{
				  -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
				          box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
				}

				.main_cart{
				  -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.4);
				          box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.4);
				}

				.main1_cart{
				  margin: auto;
				  margin-top: 2rem;
				  cursor: pointer;
				}

				.imgbox1 {
				  margin: 2rem auto;
				  border-radius: 2.5rem;
				}

				.imgbox1 img{
				  border-radius: 2.5rem;
				}

				.prodetail{
				  margin: 1rem auto;
				  margin-top: 3.5rem;
				}

				.product_name{
				  font-size: 2.5rem;
				  font-weight: 600;
				   color: #555;
				}

				.set_quantity{
				  position: relative;
				}

				.set_quantity::after{
				  content: "";
				  width: auto;
				  height: auto;
				  text-align: center;
				  position: absolute;
				  bottom: -1.4rem;
				  right: 2.5rem;
				  font-size: 0.8rem;

				}

				.page-link{
				  line-height: 1.8rem;
				  width: 3.5rem;
				  font-size: 1rem;
				  display: flex;
				  justify-content: center;
				  align-items: center;
				  color: #495057;
				  padding: 0.3rem;
				  right: 2.5rem;
				}

				.page-link:focus{
				  box-shadow: none;
				}

				.page-item input{
				  line-height: 1.6rem;
				  padding: 0.0rem;
				  font-size: 1.5rem;
				  display: flex;
				  justify-content: center;
				  align-items: center;
				  text-align: center;
				}

				.card-title p{
				  font-size: 1.5rem;
				  font-weight: 400;
				   color: #777;
				}

				.remove_wish a{
				  font-size: 1.7rem;
				  cursor: pointer;
				  color: #222;
				  text-decoration: none;
				  text-shadow: 0 0.5rem 0.7rem rgba(0, 0, 0, 0.2);
				}

				.remove_wish a:hover{
				   color: #E75480;
				}

				.price_money{
				  margin-top: 0.5rem; 
				  font-size: 1.7rem;
				  cursor: pointer;
				  color: #222;
				  text-shadow: 0 0.5rem 0.7rem rgba(0, 0, 0, 0.2);
				}

				.carrd-body a{
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

				#textclint{
				  margin: 1rem 0;
				  padding: 1rem;
				  font-size: 1.3rem;
				  color: #333;
				  background: #d9d9d9;
				  text-decoration: none;
				  box-shadow:  0 1rem 2rem rgba(0,0,0,.1);
				}


				.card2{
				  border: .2rem solid #999;
				  padding: 1rem 2rem;
				  -webkit-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
				          box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.3);
				}

				#discount_code1{
				  margin: 1rem 0;
				  padding: 1rem;
				  font-size: 1.3rem;
				  color: #333;
				  background: #d9d9d9;
				  text-decoration: none;
				  box-shadow:  0 1rem 2rem rgba(0,0,0,.1);
				}

				#appbtn{
				  cursor: pointer;
				  border-radius: 2.5rem;
				  padding: 0.6rem 3rem;
				  font-size: 1.3rem;

				}

				.price_indiv p{
				  font-size: 1.5rem;
				  font-weight: 400;
				   color: #777;
				}

				.total-amt p{
				  font-size: 1.5rem;
				  font-weight: 400;
				   color: #777;
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
			<h3><?php echo $_SESSION['username']; ?><br><span>Welcom to Specs Bazaar</span></h3>
			<ul>
				<li><i class="fa-regular fa-circle-user"></i><a href="clientProfile.php">My Profile</a></li>
				<li><i class="fas fa-edit"></i><a href="editClient.php">Edit Profile</a></li>
				<li id="res1"><i class="fas fa-shopping-cart"></i><a href="cart.php">Cart</a></li>
				<li><i class="fas fa-box"></i><a href="myOrder.php">My Order</a></li>
				<li><i class="fas fa-list"></i><a href="#">Terms</a></li>
				<li><i class="fas fa-right-from-bracket"></i><a href="logout.php">Logout</a></li>
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


<section class="cartbox">
	
		<div class="container-fluid">
			<div class="row">
					<div class="col-md-10 col-12 mx-auto">
						<div class="row mt-5 gx-3">
							<!-- left side div -->
								<div class="col-md-12 col-lg-8 col-11 mx-auto main_cart mb-lg-0 mb-5">
									<div class="card1">										
										<form action="payment.php" method="post">
										<?php
											$sql = "SELECT * FROM cart WHERE customer_name='$name' AND customer_email='$email'";
											$res = mysqli_query($conn, $sql);
											$count = mysqli_num_rows($res);
										?>	
											<h2 class=" font-weight-bold">Cart (<?php echo $count ?>)</h2>
									</div>
									
			<?php
			$data = [];
            if($count>0)
            {
                while($row=mysqli_fetch_array($res))
                {
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
                    $customer_name = $row['customer_name'];
                    $customer_contact = $row['customer_contact'];
                    $customer_email = $row['customer_email'];
                    $customer_address = $row['customer_address'];
					$product_array[] = $row;
                    ?>
		<div class="prodcart col-md-11 col-lg-11 col-11 main1_cart mb-lg-0 mb-5" >
				
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

				<!-- quantity inc dec -->

				<div class="col-6">
					<ul class="pagination justify-content-end set_quantity">
					
					<li class="page-item"><input type="text" name="" class="page-link" value="<?php echo $quantity ?>" id="textbox" ></li>
					</ul>
				</div>
		</div>

		<!-- //remover move and price -->
		<div class="row">
			<div class="col-8 d-flex justify-content-between remove_wish">
				<a href="removeFromCart.php?id=<?php echo $id ?>"><p><i class="fas fa-trash-alt"></i> REMOVE ITEM</p></a>
			</div>

		<div class="col-4 d-flex justify-content-end price_money">
			<input type="hidden" name="publisher" value="<?php echo $publisher ?>"/>
			<h3>Rs.<span id="itemval"><?php echo $total ?> </span></h3>
		</div>
		
		</div>
		</div>
		</div>
		</div>
		
					<?php
				}
			}
		?>
		</div>

		
		<!-- right side div -->

		<div class="col-md-12 col-lg-4 col-11 mx-auto mt-lg-0 mt-md-5">





			<div class="right_side p-3 bg-white">
				<div class="mt-3">
					<p id="addclint" class="text-dark mt-3">Address</p>
					<textarea type="text" name="customer_address" id="textclint" class=" form-control font-weight-bold" rows="3" placeholder="Enter the Address"><?php if(isset($customer_address)){echo $customer_address;} ?></textarea>
				</div>
				<div class="mt-3">
					<p id="addclint" class="text-dark mt-3">Contact Number</p>
					<input type="text" name="customer_contact" id="textclint" class="form-control font-weight-bold" placeholder="Enter the Number" value="<?php if(isset($customer_contact)){echo $customer_contact;} ?>">
				</div>
				<div class="mt-3">
					<p id="addclint" class="text-dark mt-3">Whatsapp Number</p>
					<input type="text" name="customer_wcontact" id="textclint" class="form-control font-weight-bold" placeholder="Enter the Number" value="<?php if(isset($customer_contact)){echo $customer_contact;} ?>">
				</div>
			</div>



			








			<div class="right_side p-3 mt-3 bg-white">
				<h2 class="product_name mb-5">The Total Amount Of</h2>
				<div class="price_indiv d-flex justify-content-between">
					<p>Product amount</p>
					<?php
                        $sql6 = "SELECT SUM(total) AS Total FROM cart WHERE customer_name='$name' AND customer_email='$email'";
                        $res6 = mysqli_query($conn,$sql6);
                        $row6 = mysqli_fetch_assoc($res6);
                        $total_revenue = $row6['Total'];
                        $zero=0;
                    ?>
					<p>&#8377;<span id="product_total_amt"><?php echo $total_revenue ?: $zero;?></span></p>
					
			<input type="hidden" name="total" value="<?php echo $total_revenue+50??$zero ?>"/>
				</div>
				<div class="price_indiv d-flex justify-content-between">
				<?php
					$sql2 = "SELECT * FROM shipping_charge";
					$res2 = mysqli_query($conn,$sql2);
					while($row = mysqli_fetch_assoc($res2)){
						$currentCharge = $row['charge'];
				?>
					<p>Shipping Charge</p>
					<p>&#8377;<span id="shipping_charge"><?php echo $currentCharge; ?></span></p>
					<?php
						}
					?>
				</div>

				<div class="price_indiv d-flex justify-content-between">
					<p>Coupon</p>
					<p>- <span id='couponAmount'>0</span></p>
				</div>

				<hr/>

				<div class="total-amt d-flex justify-content-between font-weight-bold">
					<p>The total amount of (including VAT)</p>
					<p>&#8377;<span id="total_cart_amt"></span></p>
				</div>

				<button id="appbtn" name="submit" type="submit" class="btn btn-primary text-uppercase">Checkout</button>
			</div>
			
			</form>



			<div class="discount_code mt-3">
				<div class="card2">
					<div class="carrd-body">
						<a class="d-flex " data-toggle="collapse" href="#collapseExample" aria-expanded="false" 
						 	aria-controls="collapseExample">
							Add a discount code (optional)
							<span><i class="fas fa-chevron-down pt-1"></i></span>
						</a>
							<div class="collapse" id="collapseExample">
								<div class="mt-3">
									<input type="text" name="coupon" id="discount_code1" class="form-control font-weight-bold" placeholder="Enter the discount code">
								</div>
								<button id="appbtn" onclick="coupon()" class="btn btn-primary btn-sm mt-3">Apply</button>
						</div>
					</div>
				</div>
		</div>

		<!-- discount code part -->




		<div class="mt-3 shadow p-3 bg-white">
			<div class="pt-4">
				<h5 class="mb-4">Expected delivery date</h5>
				<p>July 27th 2022 - July 29th 2022</p>
			</div>
		</div>
		


		</div>
		</div>
		</div>
		</div>
		</div>
		<?php	
			if($count!=0){
				$_SESSION['product'] = $product_array;
			}
		?>
</section>





<!-- footer section starts  -->

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>


<script src="js/script.js"></script>

<script>

let usr2 = document.querySelector('#use');
  let detail2 = document.querySelector('.userr');


  usr2.addEventListener('click', () => {
    detail2.style.visibility= "visible";
    detail2.style.opacity= "1";
  });

let clo2 = document.querySelector('#close-profile');

 clo2.addEventListener('click', () => {
      detail2.style.visibility= "hidden";
      detail2.style.opacity= "0";
    });


 const decreaseNumber = (incdec) =>{
 	var itemval = document.getElementById(incdec);

 	if(itemval.value <= 0){
 		itemval.value = 0;
 		alert("Negative quantity not allowed!");
 	} else{
 		itemval.value = parseInt(itemval.value) - 1;
 		itemval.style.background ="fff";
 		itemval.style.color ="000";
 	}
 }

  const increaseNumber = (incdec) =>{
 	var itemval = document.getElementById(incdec);

 	if(itemval.value >= 5){
 		itemval.value = 5;
 		alert("max 5 allowed!");
 		itemval.style.background ="red";
 		itemval.style.color ="fff";
 	} else{
 		itemval.value = parseInt(itemval.value) + 1;
 	}
 }

function coupon(){
	var coupon_code = document.getElementById('discount_code1').value;
	if(coupon_code!=''){
		$.ajax({
			url:'checkCoupon.php',
			type:'post',
			data:'coupon_code='+coupon_code,
			success:function(dataResult){
				var data = JSON.parse(dataResult);
				// alert(data.result);
				if(data.is_error=='yes'){
					alert(data.result)
				}else{
					// document.getElementById('product_total_amt').innerHTML = data.result;
					document.getElementById('total_cart_amt').innerHTML = data.result;
					document.getElementById('couponAmount').innerHTML = data.coupon;
				}
			}
		})
	}
}


	setInterval(() => {
		var productTotalAmt = document.getElementById('product_total_amt').textContent;
		console.log(productTotalAmt);
		var shippingCharge = document.getElementById('shipping_charge').textContent;
		console.log(shippingCharge);
		var couponAmount = document.getElementById('couponAmount').textContent;
		console.log(couponAmount);
		document.getElementById('total_cart_amt').innerHTML = parseFloat(productTotalAmt) + parseFloat(shippingCharge) - parseFloat(couponAmount);
	}, 1000);

</script>




</body>
</html>