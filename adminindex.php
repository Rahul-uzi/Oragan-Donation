<?php
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donorspot";

// Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch total users
$user_query = mysqli_query($conn, "SELECT COUNT(*) AS total_users FROM users");
$user_data = mysqli_fetch_assoc($user_query);
$total_users = $user_data['total_users'];

// Fetch total donors
$donor_query = mysqli_query($conn, "SELECT COUNT(*) AS total_donors FROM donors");
$donor_data = mysqli_fetch_assoc($donor_query);
$total_donors = $donor_data['total_donors'];

// Fetch total patients
$patient_query = mysqli_query($conn, "SELECT COUNT(*) AS total_patients FROM patients");
$patient_data = mysqli_fetch_assoc($patient_query);
$total_patients = $patient_data['total_patients'];

$total_patients = $conn->query("SELECT COUNT(*) as count FROM patients")->fetch_assoc()['count'];
$total_donors = $conn->query("SELECT COUNT(*) as count FROM donors")->fetch_assoc()['count'];
$total_users = $total_patients + $total_donors;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | DonorSpot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="adminindex.css">
</head>

<body>
    <!-- Header -->
    <header>
        <h1>Welcome, <?php echo $_SESSION['admin']; ?></h1>
    </header>

    <div class="sidebar">
        <h2>DonorSpot</h2>
        <h3>System Administrator</h3>
        <ul>
            <li><a href="adminindex.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="donorlist.php"><i class="fas fa-users"></i> Donor List</a></li>
            <li><a href="patientlist.php"><i class="fas fa-user-injured"></i> Patient List</a></li>
            <li><a href="all_notifications.php"><i class="fas fa-bell"></i> Notifications</a></li>
            <li><a href="index.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
        <div style="position: absolute; top: 10px; right: 20px;">
            <?php
            $conn = new mysqli("localhost", "root", "", "donorspot");
            $sql = "SELECT COUNT(*) AS new_notif FROM notifications WHERE status = 'unread'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $newNotifCount = $row['new_notif'];

            echo "<a href='all_notifications.php' style='text-decoration: none; color: black; font-size: 24px;'>
                    🔔";
            if ($newNotifCount > 0) {
                echo "<span style='background: red; color: white; padding: 3px 7px; border-radius: 50%; font-size: 14px;'>$newNotifCount</span>";
            }
            echo "</a>";

            $conn->close();
            ?>
        </div>
    </div>

    <div class="dashboard-container">
        <h1>Admin Dashboard</h1>
        
        <div class="dashboard-cards">
            <!-- Total Users Card -->
            <div class="card blue">
                <i class="fas fa-user"></i>
                <h2><?php echo $total_users; ?></h2>
                <p>Total Users</p>
            </div>

            <!-- Total Donors Card -->
            <div class="card green">
                <i class="fas fa-hand-holding-heart"></i>
                <h2><?php echo $total_donors; ?></h2>
                <p>Total Donors</p>
                <a href="donorlist.php">View Details</a>
            </div>

            <!-- Total Patients Card -->
            <div class="card red">
                <i class="fas fa-procedures"></i>
                <h2><?php echo $total_patients; ?></h2>
                <p>Total Patients</p>
                <a href="patientlist.php">View Details</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

