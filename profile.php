<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost"; // Change if needed
$username = "root"; // Change if using a different MySQL user
$password = ""; // Change if MySQL has a password
$database = "donorspot";

// Create Connection
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DonorSpot Dashboard</title>
    <style>
	body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
header {
    background: linear-gradient(to right, #ff0000, #cc0000); /* Gradient Red */
    color: white;
    padding: 15px;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
}

/* Navigation Bar */
nav {
    background: #222;
    padding: 10px 0;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
}

nav ul {
    list-style: none;
    text-align: center;
}

nav ul li {
    display: inline-block;
    margin: 0 10px;
}

/* Regular Nav Links */
nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    padding: 10px 15px;
    border-radius: 5px;
    transition: 0.3s;
}

/* Hover Effect for Normal Links */
nav ul li a:hover {
    background: red;
    color: white;
}

/* Logout Button Styling */
nav ul li.logout a {
    background: white;
    color: red;
    border: 2px solid red;
    border-radius: 25px;
    font-weight: bold;
    padding: 8px 18px;
    transition: 0.3s;
}

/* Logout Button Hover Effect */
nav ul li.logout a:hover {
    background: red;
    color: white;
    border-color: white;
}

/* Responsive Navbar */
@media (max-width: 768px) {
    nav ul {
        display: flex;
        flex-direction: column;
        text-align: center;
    }

</style>
</head>
<body>
    <header>
        <h2>Welcome, <?php echo $user['name']; ?>!</h2>
       
    </header>
    
    <nav>
        <ul>
            
            <li><a href="userindex.php">Home</a></li>
            
			<li><a href="index.php" class="logout-btn">Logout</a></li>
        </ul>
    </nav>

    <main>
        <section class="user-info">
            <h3>Your Profile</h3>
            <p><strong>Name:</strong> <?php echo $user['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
            
        </section>
    </main>
</body>
</html>
