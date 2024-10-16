<?php
    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)){
    	header('location:login.php');
    }

    if(isset($_POST['logout'])){
    	session_destroy();
    	header('location:login.php');
    }
    if (isset($_POST['submit-btn'])) {
    	$name=mysqli_real_escape_string($conn,$_POST['name']);
    	$email=mysqli_real_escape_string($conn,$_POST['email']);
    	$phone=mysqli_real_escape_string($conn,$_POST['phone']);
    	$message=mysqli_real_escape_string($conn,$_POST['message']);

    	$select_message=mysqli_query($conn,"SELECT * FROM `message` WHERE name='$name' AND email='$email' AND phone='$phone' AND message ='$message'")or die('query failed');
    	if (mysqli_num_rows($select_message)>0) {
    		echo 'messsage already send';
    	}else{
    		mysqli_query($conn,"INSERT INTO `message`(`user_id`,`name`,`email`,`phone`,`message`) VALUES('$user_id','$name','$email','$phone','$message')")or die('query failed');
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
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	<title>Home Page</title>
</head>
<body>
	<?php include 'header.php';?>
	<div class="banner">
		<div class="detail">
			<h1>Contact Us</h1>
			<p>
			</p>
			<a href="index.php">home</a><span>/Contact</span>
		</div>
	</div>
	<div class="line"></div>
	<!-----home shop----->
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
		<div class="form-container">
			<h1 class="title">Leave A Message</h1>
			<form method="post">
				<div class="input-field">
					<label>your Name</label></br>
					<input type="text" name="name">
				</div>
				<div class="input-field">
					<label>your Email</label></br>
					<input type="text" name="email">
				</div>
				<div class="input-field">
					<label>Number</label></br>
					<input type="number" name="phone">
				</div>
				<div class="input-field">
					<label>your Message</label></br>
					<textarea name="message"></textarea>
				</div>
				<button type="submit" name="submit-btn">send message</button>
			</form>
		</div>
	<div class="line"></div>
	<div class="line2"></div>
	<div class="address">
		<div class="title">Our Contact</div>
		<div class="row">
			<div class="box">
				<i class="bi bi-map-fill"></i>
				<div>
					<h4>Address</h4>
					<p>385 Siddhivinayak Copany Limited opp</br>Thane West 400606
				    </p>
				</div>
			</div>
			<div class="box">
				<i class="bi bi-telephone-fill"></i>
				<div>
					<h4>Phone</h4>
					<p>8879416622</p>
				</div>
			</div>
			<div class="box">
				<i class="bi bi-envelope-fill"></i>
				<div>
					<h4>Email</h4>
					<p>nileshtambekar10@gmail.com</p>
				</div>
			</div>
		</div>
	</div>
	<div class="line3"></div>
	<?php include 'footer.php';?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script type="text/javascript" src="script1.js"></script>
</body>
</html>