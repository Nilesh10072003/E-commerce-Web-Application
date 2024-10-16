

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot</title>
</head>
<body>
	<section class="form-container">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $newPassword = $_POST["password"]; // Assuming you have a new password input field

    // Database connection settings
   include('connection.php');

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the password in the database
    $sql = "UPDATE users SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ss", $newPassword, $email);

        // Execute the query
        if ($stmt->execute()) {
            echo "<h1>Password Updated Successfully</h1>";
        } else {
            echo "<h1>Error updating password: " . $stmt->error . "</h1>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<h1>Error preparing statement: " . $conn->error . "</h1>";
    }

    // Close the database connection
    $conn->close();
} else {
    // Redirect back to the first page if accessed directly
    header("Location: index.php");
    exit();
}
?>
</section>
</body>
</html>


