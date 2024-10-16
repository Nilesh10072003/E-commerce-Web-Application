<?php
    include 'connection.php';
    include 'fpdf\fpdf.php';
    include 'phpqrcode\qrlib.php';
    session_start();
    $user_id = $_SESSION['user_id'];

    if (!isset($user_id)){
    	header('location:login.php');
    }

    if(isset($_POST['logout'])){
    	session_destroy();
    	header('location:login.php');
    }

    if (isset($_POST['order-btn'])) {
    	$name=mysqli_real_escape_string($conn,$_POST['name']);
    	$email=mysqli_real_escape_string($conn,$_POST['email']);
    	$phone=mysqli_real_escape_string($conn,$_POST['phone']);
    	$method=mysqli_real_escape_string($conn,$_POST['method']);
    	$address=mysqli_real_escape_string($conn,'flate no.'.$_POST['flate no'].','.$_POST['city'].','.$_POST['state'].','.$_POST['pin']);
    	$placed_on=date('D-M-Y');
    	$cart_total=0;
    	$cart_product[]='';
    	$cart_query=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id'")or die('query failed');

    	if (mysqli_num_rows($cart_query)>0) {
    		while ($cart_item=mysqli_fetch_assoc($cart_query)) {
    			$cart_product[]=$cart_item['name'].'('.$cart_item['quantity'].')';
    			$sub_total=($cart_item['price']*$cart_item['quantity']);
    			$cart_total+=$sub_total;
    		}
    	}
    	$total_product=implode(',', $cart_product);
    	mysqli_query($conn,"INSERT INTO `order`(`user_id`,`name`,`phone`,`email`,`method`,`address`,`total_product`,`total_price`,`placed_on`) VALUES('$user_id','$name','$phone','$email','$method','$address','$total_product','$cart_total','$placed_on')");
    	mysqli_query($conn,"DELETE FROM `cart` WHERE user_id='$user_id'");
    	$message[]='order sucessfully placed';
    	 // Generate a fake QR code for G-Pay payment
        if ($method == 'G-Pay') {
            $qrData = 'nileshtambekar@oksbi';
            $qrCodeFileName = 'G-pay.png';
            QRcode::png($qrData, $qrCodeFileName, QR_ECLEVEL_L, 10);
        }
    
    // Create a PDF invoice for the order
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(40, 10, 'Order Invoice');

    // Add order details to the PDF
    $pdf->Ln(10); // Move down 10 units
    $pdf->Cell(40, 10, 'Order Date: ' . date('D-M-Y'));
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Customer Name: ' . $name);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Email: ' . $email);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Phone: ' . $phone);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Shipping Address: ' . $address);
    $pdf->Ln(10);
    // Add a table for the ordered products
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(40, 10, 'Ordered Products:');
    $pdf->Ln(10);

    // Loop through cart items and add them to the table
    foreach ($cart_product as $product) {
        $pdf->Cell(40, 10, $product);
        $pdf->Ln(10);
    }

    $pdf->Cell(40, 10, 'Total Payable Amount: ₹' . $grand_total);

    // Save the PDF to a file
    $pdfFileName = 'order_invoice_' . date('YmdHis') . '.pdf';
    $pdf->Output($pdfFileName, 'F');

    // Redirect the user to the checkout page
    header('location:checkout.php');
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
	<title>check out page</title>
</head>
<body>
	<?php include 'header.php';?>
	<div class="banner">
		<div class="detail">
			<h1>Checkout</h1>
			<p>
			</p>
			<a href="index.php">home</a><span>/ Checkout</span>
		</div>
	</div>
	<div class="line"></div>
	<!-----checkou section----->
	<div class="checkout-form">
		<h1 class="title">Payment Process</h1>

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
	    <div class="display-order">
	    	<div class="box-container">
	    	<?php
	    	$select_cart=mysqli_query($conn,"SELECT * FROM `cart` WHERE user_id='$user_id' ")or die('query failed');
	    	$total=0;
	    	$grand_total=0;
	    	if (mysqli_num_rows($select_cart)>0) {
	    		while($fetch_cart=mysqli_fetch_assoc($select_cart)){
	    			$total_price=($fetch_cart['price']*$fetch_cart['quantity']);
	    			$grand_total=$total+=$total_price;
	    	?>
	    	
	    		<div class="box">
	    			<img src="img/<?php echo $fetch_cart['image'];?>">
	    			<span><?=$fetch_cart['name'];?>(<?=$fetch_cart['quantity'];?>)</span>
	    		</div>
	    	
	    	<?php
	    	        }
	    	    }
	    	?>
	    	</div>
	    	<span class="grand-total">Total Payable Amount:₹<?=$grand_total;?></span>
	    </div>
	    <form method="post">
	    	<div class="input-field">
	    		<label>Enter Your Name</label>
	    		<input type="text" name="name" placeholder="enter your name">
	    	</div>
	    	<div class="input-field">
	    		<label>Enter Your Number</label>
	    		<input type="text" name="phone" placeholder="enter your number">
	    	</div>
	    	<div class="input-field">
	    		<label>Enter Your Email</label>
	    		<input type="text" name="email" placeholder="enter your email">
	    	</div>
	    	<div class="input-field">
	    		<label>Method</label>
	    		<select name="method">
	    			<option selected disabled>Select Payment Method</option>
	    			<option value="cash on delivery">cash on delivery</option>
	    			<option value="G-Pay">G-Pay</option>
	    		</select>
	    	</div>
	    	<div class="input-field">
	    		<label>Address Line 1</label>
	    		<input type="text" name="flate no" placeholder="e.g flate no.">
	    	</div>
	    	<div class="input-field">
	    		<label>Address Line 2</label>
	    		<input type="text" name="street" placeholder="e.g street name">
	    	</div>
	    	<div class="input-field">
	    		<label>City</label>
	    		<input type="text" name="city" placeholder="e.g Thane">
	    	</div>
	    	<div class="input-field">
	    		<label>State</label>
	    		<input type="text" name="state" placeholder="e.g maharastra">
	    	</div>
	    	<div class="input-field">
	    		<label>pin code</label>
	    		<input type="text" name="pin" placeholder="e.g 400605">
	    	</div>
	    	<input type="submit" name="order-btn" class="btn" value="order now">
	    </form>
	</div>
	<?php include 'footer.php';?>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
	<script type="text/javascript" src="script1.js"></script>
</body>
</html>