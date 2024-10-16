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
			<h1>About Us</h1>
			<p>
			</p>
			<a href="index.php">home</a><span>/about us</span>
		</div>
	</div>
	
	<!---Abot us---->
		<div class="line2"></div>
		<div class="about-us">
			<div class="row">
				<div class="box">
					<div class="title">
						<span>ABOUT OUR ONLINE STORE</span>
						<h1>Hello, with 25 years of experience</h1>
					</div>
					<p>over 25 years  ecommerce helping companise reach their financial and branding goal.
					</p>
				</div>
				<div class="img-box">
					<img src="img/Team1.avif">
				</div>
			</div>
		</div>
		<div class="line3"></div>
		<!-----features---->
		<div class="line4"></div>
		<div class="features">
			<div class="title">
				<h1>Complete Customber Ideas</h1>
				<span>best features</span>
			</div>
			<div class="row">
				<div class="box">
					<img src="img/3.jpg">
					<h4>24 X 7</h4>
					<p>Online Support 24/7</p>
				</div>
				<div class="box">
					<img src="img/1.jpg">
					<h4>Mony Back Guarantee</h4>
					<p>100% secure payment</p>
				</div>
				<div class="box">
					<img src="img/4.jpg">
					<h4>Special Gift Card</h4>
					<p>give The Perfect Gift</p>
				</div>
				<div class="box">
					<img src="img/2.jpg">
					<h4>All Over State Shipping</h4>
					<p>On Order Over 250</p>
				</div>
			</div>
		</div>
		<div class="line"></div>
		<!------features section--->
		<div class="line2"></div>
		<div class="team">
			<div class="title">
				<h1>Our Workable Teams</h1>
				<span>Best Team</span>
			</div>
			<div class="row">
				<div class="box">
					<div class="img-box">
						<img src="img/client1.jpg">
					</div>
					<div class="detail">
						<span>Finace Manager</span>
						<h4>Amit Shah</h4>
					<div class="icons">
						<i class="bi bi-instagram"></i>
						<i class="bi bi-twitter"></i>
						<i class="bi bi-facebook"></i>
						<i class="bi bi-whatsapp"></i>
						<i class="bi bi-youtube"></i>
				    </div>
					</div>
				</div>
				<div class="box">
					<div class="img-box">
						<img src="img/client2.jpg">
					</div>
					<div class="detail">
						<span>Team Leader</span>
						<h4>Narendra Modi</h4>
					<div class="icons">
						<i class="bi bi-instagram"></i>
						<i class="bi bi-twitter"></i>
						<i class="bi bi-facebook"></i>
						<i class="bi bi-whatsapp"></i>
						<i class="bi bi-youtube"></i>
				    </div>
					</div>
				</div>
				<div class="box">
					<div class="img-box">
						<img src="img/client3.jpg">
					</div>
					<div class="detail">
						<span>Assistant Manager</span>
						<h4>Meloni</h4>
					<div class="icons">
						<i class="bi bi-instagram"></i>
						<i class="bi bi-twitter"></i>
						<i class="bi bi-facebook"></i>
						<i class="bi bi-whatsapp"></i>
						<i class="bi bi-youtube"></i>
				    </div>
					</div>
				</div>
				<div class="box">
					<div class="img-box">
						<img src="img/client3.avif">
					</div>
					<div class="detail">
						<span>Project Head</span>
						<h4>Rushi Sunak</h4>
					<div class="icons">
						<i class="bi bi-instagram"></i>
						<i class="bi bi-twitter"></i>
						<i class="bi bi-facebook"></i>
						<i class="bi bi-whatsapp"></i>
						<i class="bi bi-youtube"></i>
				    </div>
					</div>
				</div>
			</div>
		</div>
		<div class="line3"></div>
		<div class="line4"></div>
		<div class="project">
			<div class="title">
				<h1>Our Best Project</h1>
				<span>How it Works</span>
			</div>
			<div class="row">
				<div class="box">
					<img src="img/Project1.jpg">
				</div>
				<div class="box">
					<img src="img/Project2.jpg">
				</div>
			</div>
		</div>
		<div class="line"></div>
		<div class="line2"></div>
		<div class="ideas">
			<div class="title">
				<h1>WE And Our Client Are Happy To Cooprate With Company</h1>
				<span>our Featres</span>
			</div>
			<div class="row">
				<div class="box">
					<i class="bi bi-stack"></i>
					<div class="detail">
						<h2>What We Really DO</h2>
						<p>we create your farm beautiful by giving best fertilizers</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="box">
					<i class="bi bi-grid-1x2-fill"></i>
					<div class="detail">
						<h2>History Of Beginning</h2>
						<p>we started from small reserch lab to big company</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="box">
					<i class="bi bi-graph-up"></i>
					<div class="detail">
						<h2>Our vision</h2>
						<p>To Become Best Global Company</p>
					</div>
				</div>
			</div>
		</div>
		<div class="line"></div>
	<?php include 'footer.php';?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script type="text/javascript" src="script1.js"></script>
</body>
</html>