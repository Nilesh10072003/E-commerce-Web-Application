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
     
    //update quantity
    if (isset($_POST['update_qty_btn'])) {
    	$update_qty_id=$_POST['update_qty_id'];
    	$update_value=$_POST['update_qty'];

    	$update_query=mysqli_query($conn,"UPDATE `cart` SET quantity='$update_value' WHERE id='$update_qty_id'")or die('query failed');
    	if ($update_query) {
    		header('location:cart.php');
    	}
    	}
    //delete the product from cart
    if (isset($_GET['delete'])) {
    	$delete_id = $_GET['delete'];

    	mysqli_query($conn,"DELETE FROM `cart` WHERE id='$delete_id'") or die('query failed');

    	header('location:wishlist.php');
    }
    if (isset($_GET['delete_all'])) {

    	mysqli_query($conn,"DELETE FROM `cart` WHERE user_id='$user_id'") or die('query failed');

    	header('location:cart.php');
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
			<h1>My Cart</h1>
			<p>
			</p>
			<a href="index.php">home</a><span>/Cart</span>
		</div>
	</div>
	<div class="line"></div>
	<!-----home shop----->
	<section class="shop">
		<h1 class="title">Product Added in Cart</h1>

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
		<div class="box-container">
			<?php
			$grand_total=0;
			$select_cart = mysqli_query($conn,"SELECT * FROM `cart`")or die('query failed');
			if (mysqli_num_rows($select_cart)>0){
				while($fetch_cart = mysqli_fetch_assoc($select_cart)){

			?>
			<div class="box">
				<div class="icon">
					<a href="view_page.php?pid=<?php echo $fetch_cart['id'];?>" class="bi bi-eye-fill"></a>
					<a href="cart.php?delete=<?php echo $fetch_cart['id'];?>" class="bi bi-x" onclick="return confirm('do you want to delete the product from cart')"></a>
					<button type="submit" name="add_to_cart" class="bi bi-cart"></button>
				</div>
				<img src="image/<?php echo $fetch_cart['image'];?>">
				<div class="price">₹<?php echo $fetch_cart['price'];?></div>
				<div class="name"><?php  echo $fetch_cart['name'];?></div>
				<form method="post">
					<input type="hidden" name="update_qty_id" value="<?php echo $fetch_cart['id'];?>">
					<div class="qty">
						<input type="number" min="1" name="update_qty" value="<?php echo $fetch_cart['quantity'];?>">
						<input type="submit" name="update_qty_btn" value="update">
					</div>
				</form>
				<div class="total-amt">
					Total Amount : <span>₹<?php echo $total_amt= ($fetch_cart['price']*$fetch_cart['quantity']) ?></span>
				</div>
			</div>
			<?php
			$grand_total+=$total_amt;
				}
			}else{
				echo '<p class="empty">no product added yet !</p>';
			}
			?>
		</div>
		<div class="dlt">
			<a href="cart.php?delete_all" class="btn" onclick="return confirm('do you want to delete all the product from cart')">delete all</a>
		</div>
		<div class="wishlist_total">
			<p>Total Payable Amount:<span>₹<?php echo $grand_total;?>/-</span></p>
			<a href="shop.php" class="btn">Continue Shopping</a>
			<a href="checkout.php" class="btn <?php echo ($grand_total>1)?'':'disabled' ?>" onclick="return confirm('do you want to placed your order')">Proceed to checkout</a>
		</div>
	</section>
	<?php include 'footer.php';?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script type="text/javascript" src="script1.js"></script>
</body>
</html>