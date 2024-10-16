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
	<title>order page</title>
</head>
<body>
	<?php include 'header.php';?>
	<div class="banner">
		<div class="detail">
			<h1>Orders</h1>
			<p>
			</p>
			<a href="index.php">home</a><span>/Orders</span>
		</div>
	</div>
	<div class="line"></div>
	<!-----order section----->
	<div class="Order-section">
		<div class="box-container">
			<?php
			$select_orders = mysqli_query($conn, "SELECT * FROM `order` WHERE user_id='$user_id'") or die('Query failed');
			if (mysqli_num_rows($select_orders)>0) {
				while ($fetch_orders=mysqli_fetch_assoc($select_orders)) {
				
			?>
			<div class="box">
				<p>placed on:<span><?php echo $fetch_orders['placed_on'];?></span></p>
				<p>name:<span><?php echo $fetch_orders['name'];?></span></p>
				<p>phone:<span><?php echo $fetch_orders['phone'];?></span></p>
				<p>email:<span><?php echo $fetch_orders['email'];?></span></p>
				<p>address:<span><?php echo $fetch_orders['address'];?></span></p>
				<p>payment method:<span><?php echo $fetch_orders['method'];?></span></p>
				<p>your order:<span><?php echo $fetch_orders['total_product'];?></span></p>
				<p>total price:<span><?php echo $fetch_orders['total_price'];?></span></p>
				<p>payment status:<span><?php echo $fetch_orders['payment_status'];?></span></p>
			</div>
			<?php

			        }
			}else{
				echo'
				<div class="empty">
				<p>no oredr placed yet!</p>
				</div>
				';
			}
			?>
		</div>
	</div>
	
	<?php include 'footer.php';?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script type="text/javascript" src="script1.js"></script>
</body>
</html>