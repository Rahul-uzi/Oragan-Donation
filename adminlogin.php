<?php
session_start(); // Session start hona zaroori hai!

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donorspot";

// Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Login form handling
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = md5($_POST['password']); // Password encrypted match

    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['admin'] = $username;
        echo "<script>alert('Login Successful! Redirecting to Dashboard...'); window.location='adminindex.php';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | DonorSpot</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
 <nav>
        <div class="logo"> DonorSpot</div>
        <ul class="nav-left">
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
<div class="login-container">
    <h1 style="text-align: center;"><b>Admin Login</b></h1>
    <form action="adminlogin.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
		<br>
		<br>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>
