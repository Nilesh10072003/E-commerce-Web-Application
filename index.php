<?php
   include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    
    if (!isset($user_id)){
    	header('location:login.php');
    }

    
    $user_name = ''; 
    $result = mysqli_query($conn, "SELECT `name` FROM `users` WHERE id = '$user_id'");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $user_name = $row['name'];
    }

    if(isset($_POST['logout'])){
    	session_destroy();
    	header('location:login.php');
    }
     //adding product in wishlist.
    if (isset($_POST['add_to_wishlist'])) {
    	$product_id = $_POST['product_id'];
    	$product_name = $_POST['product_name'];
    	$product_price = $_POST['product_price'];
    	$product_image = $_POST['product_image'];
    	

    	$wishlist_number = mysqli_query($conn,"SELECT * FROM `wishlist` WHERE name= '$product_name' AND user_id='$user_id'") or die('query failed');
    	$cart_number = mysqli_query($conn,"SELECT * FROM `cart` WHERE name= '$product_name' AND user_id='$user_id'") or die('query failed');
    	if (mysqli_num_rows($wishlist_number)>0) {
    		$message[]='product already exist in wishlist';
    	}
    	elseif (mysqli_num_rows($cart_number)>0) {
    		$message[]='product already in cart';
    	}
    	else{
    		mysqli_query($conn,"INSERT INTO `wishlist`(`user_id`,`pid`,`name`,`price`,`image`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_image')");
    		$message[]='product successfully added in wishlist';
    	}
    }

     //adding product in cart.
    if (isset($_POST['add_to_cart'])) {
    	$product_id = $_POST['product_id'];
    	$product_name = $_POST['product_name'];
    	$product_price = $_POST['product_price'];
    	$product_image = $_POST['product_image'];
    	$product_quantity = $_POST['product_quantity'];
    	
    	$cart_number = mysqli_query($conn,"SELECT * FROM `cart` WHERE name= '$product_name' AND user_id='$user_id'") or die('query failed');
    	if (mysqli_num_rows($cart_number)>0) {
    		$message[]='product already exist in cart';
    	}
    	else{
    		mysqli_query($conn,"INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`image`,`quantity`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_image','$product_quantity')");
    		$message[]='product successfully added in cart';
    	}
    }
?>
<style type="text/css">
	<?php
	include 'main.css';
	?>
</style>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="slick.css"/>
	<title>Home Page</title>
</head>
<body>
	<?php include 'header.php';?>
	<!------------home slider------>
	<div class="container-fluid">
		<div class="hero-slider">
			<div class="slider-item">
				<img src="img/fer1.jpg">
				<div class="slider-caption">
					<!-- <span>Quality Tested Product</span>
					<h1>Organic Premium<br>Agriculture Products</h1>
					<p>best Agriculture Product we Give to You and Never Compromised On Quality Standard,we also give you best Price On Product</p> -->
					<a href="shop.php" class="btn">Shop Now</a>
				</div>
			</div>
			<div class="slider-item">
				<img src="img/fer3.jpg">
				<div class="slider-caption">
					<!-- <span>Quality Tested Product</span>
					<h1>Organic Premium<br>Agriculture Products</h1>
					<p>best Agriculture Product we Give to You and Never Compromised On Quality Standard,we also give you best Price On Product</p> -->
					<a href="shop.php" class="btn">Shop Now</a>
				</div>
			</div>
			
		</div>
		<div class="controls">
			<i class="bi bi-chevron-left prev"></i>
			<i class="bi bi-chevron-right next"></i>
		</div>
	</div>
	<div class="line"></div>
		<div class="services">
			<div class="row">
				<div class="box">
					<img src="img/1.jpg">
					<div>
						<h1>Money back and Guarantee</h1>
						<p>If You Dosen`t Satisfay With Our Product, We Give Your Mony Back..</p>
					</div>
				</div>
				<div class="box">
					<img src="img/2.jpg">
					<div>
						<h1>Free Shiping Fast</h1>
						<p>We Give Our Customber Free Shipping on Our Products.</p>
					</div>
				</div>
				<div class="box">
					<img src="img/3.jpg">
					<div>
						<h1>Online 24*7 Support</h1>
						<p>Our Customber Service Are Contact With You 24*7.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="line2"></div>
		<div class="story">
			<div class="row">
				<div class="box">
					<span>Our Story</span>
					<h1>Agriculture Porduct Since 2003</h1>
					<P>Established in 2003, the Green Valley Farm Supplies originated as a modest family venture, providing essential tools and seeds to local farmers tilling the fertile lands of the region. Over the decades, the shop evolved into a thriving hub of agricultural expertise, adapting to changing times and technological advancements. As mechanization swept through the farming industry in the mid-20th century, Green Valley Farm Supplies embraced innovation, introducing state-of-the-art machinery and cutting-edge irrigation systems to streamline production.
					</p>
					<a href="shop.php" class="btn">shop now</a>
				</div>
				<div class="box">
					<img src="img/5.jpg">
				</div>
			</div>
		</div>
		<!-----testimonial---->
		<div class="line4"></div>
		<div class="testimonial-fluid">
		<h1 class="title">What Our Customber Say's</h1>
		<div class="testimonial-slider">
			<div class="testimonial-item">
				<img src="img/13.jpeg">
				<div class="testimonial-caption">
					<span>Test The Quality</span>
					<h1>premium Quality Product</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
				</div>
			</div>
			<div class="testimonial-item">
				<img src="img/14.jpeg">
				<div class="testimonial-caption">
					<span>Test The Quality</span>
					<h1>premium Quality Product</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
				</div>
			</div>
			<div class="testimonial-item">
				<img src="img/15.jpeg">
				<div class="testimonial-caption">
					<span>Test The Quality</span>
					<h1>premium Quality Product</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
				</div>
		</div>
		</div>
			<div class="controls">
			<i class="bi bi-chevron-left prev1"></i>
			<i class="bi bi-chevron-right next1"></i>
		    </div>
		</div>
		
		<div class="discover">
			<div class="detail">
				<h1 class="title">Best For Your Farms</h1>
				<span>Buy Now And Save 30% Off!</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<a href="shop.php" class="btn">discover now</a>
			</div>
			<div class="img-box">
				<img src="img/11.jpeg">
			</div>
			<div class="line3"></div>
			<?php
		if (isset($message)){
			foreach ($message as $message) {
				echo'
				<div class="message">
					<span>'.$message.'</span>
					<i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
				</div>
				';
        	}
        }
	?>
			<?php include 'homeshop.php'?>
			<div class="line2"></div>
			<div class="newslatter">
				<h1 class="title">Join Our To Newslatter</h1>
				<p>Get 15% off Your Next Order.Be The First To Learn About Promotions Special Events,New Arrivals and More.</p>
				<input type="text" name="" placeholder="Your Email Address..">
				<button>Subscribe Now</button>
				<div class="line3"></div>
				<div class="client">
					<div class="box">
						<img src="img/client0.png">
					</div>
					<div class="box">
						<img src="img/client1.png">
					</div>
					<div class="box">
						<img src="img/client2.png">
					</div>
					<div class="box">
						<img src="img/client4.png">
					</div>
				</div>
			</div>
		</div>
	<?php include 'footer.php';?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script type="text/javascript" src="script1.js"></script>
</body>
</html>