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

    	mysqli_query($conn,"DELETE FROM `users` WHERE id='$delete_id'") or die('query failed');
    	$message[]='user sucessfully deleted';
    	header('location:admin_user.php');
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
	<section class="message-container">
		<h1 class="title">total user accounts</h1>
		<div class="box-container">
			<?php
			$select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
			if (mysqli_num_rows($select_users)>0) {
				while ($fetch_users = mysqli_fetch_assoc($select_users)) {
			?>
			<div class="box">
				<p>user id :<span><?php echo $fetch_users['id'] ;?></span></p>
				<p>name :<span><?php echo $fetch_users['name'] ;?></span></p>
				<p>email :<span><?php echo $fetch_users['email'] ;?></span></p>
				<p>user type:<span style="color: <?php if ($fetch_users['user_type']=='admin'){echo 'orange';};?><?php if ($fetch_users['user_type']=='user'){echo 'red';};?>"><?php echo $fetch_users['user_type'] ;?></span></p>
				<button><a href="admin_user.php?delete=<?php echo $fetch_users['id']; ?>;" onclick="return confirm('delet this message');">delete</a></button>
			</div>
			<?php
				    }
			    }else{
				        echo '
		        	<div class="empty">
		        	     <p>no users yet..</p>
		        	</div>

		        	';	
				    }
			?>
		</div>
	</section>
	
	<script type="text/javascript" src="script.js"></script>
</body>
</html>