<?php
    include 'connection.php';
    session_start();
    $admin_id = $_SESSION['admin_name'];

    if (!isset($admin_id)){
    	header('location:login.php');
    }

    if(isset($_POST['logout'])){
    	session_destroy();
    	header('location:login.php');
    }
    
    // delete the product from database
    if (isset($_GET['delete'])) {
    	$delete_id = $_GET['delete'];

    	mysqli_query($conn,"DELETE FROM `order` WHERE id='$delete_id'") or die('query failed');
    	$message[]='order sucessfully deleted';
    	header('location:admin_order.php');
    }

    //updating payment method
    if (isset($_POST['update_order'])) {
    	$order_id= $_POST['order_id'];
    	$update_payment= $_POST['update_payment'];

    	mysqli_query($conn, "UPDATE `order` SET payment_status = '$update_payment' WHERE id='$order_id'")or die('query failed');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Admin Panel</title>
</head>
<body>
	<?php include 'admin_header.php'; ?>
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
	<div class="line4"></div>
	<section class="order-container">
		<h1 class="title">total number of orders </h1>
		<div class="box-container">
			<?php
			$select_order = mysqli_query($conn, "SELECT * FROM `order`") or die('query failed');
			if (mysqli_num_rows($select_order)>0) {
				while ($fetch_order = mysqli_fetch_assoc($select_order)) {
			?>
			<div class="box">
				<p>user name :<span><?php echo $fetch_order['name'] ;?></span></p>
				<p>user id:<span><?php echo $fetch_order['user_id'] ;?></span></p>
				<p>placed on :<span><?php echo $fetch_order['placed_on'] ;?></span></p>
				<p>phone :<span><?php echo $fetch_order['phone'] ;?></span></p>
				<p>email :<span><?php echo $fetch_order['email'] ;?></span></p>
				<p>total price :<span><?php echo $fetch_order['total_price'] ;?></span></p>
				<p>method :<span><?php echo $fetch_order['method'] ;?></span></p>
				<p>address :<span><?php echo $fetch_order['address'] ;?></span></p>
				<p>total product :<span><?php echo $fetch_order['total_product'] ;?></span></p>
				<form method="post">
					<input type="hidden" name="order_id" value="<?php echo $fetch_order['id'];?>">
					<select name="update_payment">
						<option disabled selected><?php echo $fetch_order['payment_status'];?></option>
						<option value="pending">Pending</option>
						<option value="complete">Complete</option>
					</select>
					<input type="submit" name="update_order" value="update payment" class="btn"></br>
					<button><a href="admin_order.php?delete=<?php echo $fetch_order['id']; ?>;" onclick="return confirm('delet this message');">delete</a></button>
				</form>
			</div>
			<?php
				    }
			    }else{
				        echo '
		        	<div class="empty">
		        	     <p>no oredr placed yet..</p>
		        	</div>

		        	';	
				    }
			?>
		</div>
	</section>
	
	<script type="text/javascript" src="script.js"></script>
</body>
</html>