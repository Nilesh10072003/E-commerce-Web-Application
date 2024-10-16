<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/nmp/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Forgot page</title>
</head>
<body>
    <section class="form-container">
    <h1>Forgot Password</h1>
    <form action="Forgot.php" method="post">
        <label for="email">Email:</label></br>
        <input type="email" id="email" name="email" required></br>
        <label for="password">New Password:</label></br>
        <input type="password" id="password" name="password" required></br>
        <input type="submit" name="submit-btn" value="Change Password" class="btn">
    </form>
</section>
</body>
</html>


