
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "donorspot";

// Create Connection
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Retrieve user data
    $stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $hashed_password);
        $stmt->fetch();
        
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_name'] = $name;
            echo "Login successful! Welcome, $name.";
            header("Location: userindex.php"); // Redirect to a dashboard
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No account found with that email!";
    }
    
    $stmt->close();
}

$conn->close();
?>
