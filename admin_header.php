<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>Document</title>
</head>
<body>
	<header class="header">
		<div class="flex">
			<a href="admin_panel.php" class="logo"><img src="img/logo1.jpg"></a>
			<nav class="navbar">
				<a href="admin_panel.php">Home</a>
				<a href="admin_product.php">Products</a>
				<a href="admin_order.php">Orders</a>
				<a href="admin_user.php">Users</a>
				<a href="admin_message.php">Message</a>
			</nav>
			<div class="icons">
				<i class="bi bi-person" id="user-btn"></i>
				<i class="bi bi-list" id="menu-btn"></i>
			</div>
			<div class="user-box">
				<p>username : <span><?php echo $_SESSION['admin_name'];?></span></p>
				<p>Email : <span><?php echo $_SESSION['admin_email'];?></span></p>
				<form method="post">
					<button type="submit" name="logout" class="logout-btn">log out</button>
				</form>
			</div>
		</div>
	</header>
	<div class="banner">
		<div class="detail">
			<h1>Admin Dashbord</h1>
			<p>
				This is Admin Panel design panel...!!!
			</p>
		</div>
	</div>
	<div class="line">
	</div>
</body>
</html>