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
    	$product_quantity = 1;
    	
    	$cart_number = mysqli_query($conn,"SELECT * FROM `cart` WHERE name= '$product_name' AND user_id='$user_id'") or die('query failed');
    	if (mysqli_num_rows($cart_number)>0) {
    		$message[]='product already exist in cart';
    	}
    	else{
    		mysqli_query($conn,"INSERT INTO `cart`(`user_id`,`pid`,`name`,`price`,`image`,`quantity`) VALUES('$user_id','$product_id','$product_name','$product_price','$product_image','$product_quantity')");
    		$message[]='product successfully added in cart';
    	}
    }
    //delete the product from wishlist
    if (isset($_GET['delete'])) {
    	$delete_id = $_GET['delete'];

    	mysqli_query($conn,"DELETE FROM `wishlist` WHERE id='$delete_id'") or die('query failed');

    	header('location:wishlist.php');
    }
    if (isset($_GET['delete_all'])) {

    	mysqli_query($conn,"DELETE FROM `wishlist` WHERE user_id='$user_id'") or die('query failed');

    	header('location:wishlist.php');
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
			<h1>My Wishlist</h1>
			<p>
			</p>
			<a href="index.php">home</a><span>/wishlist</span>
		</div>
	</div>
	<div class="line"></div>
	<!-----home shop----->
	<section class="shop">
		<h1 class="title">Product Added in Wishlist</h1>

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
			$select_wishlist = mysqli_query($conn,"SELECT * FROM `wishlist`")or die('query failed');
			if (mysqli_num_rows($select_wishlist)>0){
				while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){

			?>
			<form method="post" class="box">
				<img src="image/<?php echo $fetch_wishlist['image'];?>">
				<div class="price">₹<?php echo $fetch_wishlist['price'];?></div>
				<div class="name"><?php  echo $fetch_wishlist['name'];?></div>
				<input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['id'];?>">
				<input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name'];?>">
				<input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price'];?>">
				<input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image'];?>">
				<div class="icon">
					<a href="view_page.php?pid=<?php echo $fetch_wishlist['id'];?>" class="bi bi-eye-fill"></a>
					<a href="wishlist.php?delete=<?php echo $fetch_wishlist['id'];?>" class="bi bi-x" onclick="return confirm('do you want to delete the product in wishlist')"></a>
					<button type="submit" name="add_to_cart" class="bi bi-cart"></button>
				</div>
			</form>
			<?php
			$grand_total+=$fetch_wishlist['price'];
				}
			}else{
				echo '<p class="empty">no product added yet !</p>';
			}
			?>
		</div>
		<div class="wishlist_total">
			<p>Total Payable Amount:<span>₹<?php echo $grand_total;?>/-</span></p>
			<a href="shop.php" class="btn">Continue Shopping</a>
			<a href="wishlist.php?delete_all" class="btn <?php echo ($grand_total)?'':'disabled' ?>" onclick="return confirm('do you want to delete all the product in wishlist')">delete all</a>
		</div>
	</section>
	<?php include 'footer.php';?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script type="text/javascript" src="script1.js"></script>
</body>
</html>