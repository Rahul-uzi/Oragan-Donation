in my data<?php
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

// Debug: Check if donors table exists
$table_check = $conn->query("SHOW TABLES LIKE 'donors'");
if ($table_check->num_rows == 0) {
    die("Error: The 'donors' table does not exist in the database.");
}

// Fetch Donors with error handling
$sql = "SELECT id, name, email, dob, gender, blood_group, donation_type, organ_type, specific_organ, phone, address FROM donors";
$result = $conn->query($sql);

// Debug: Check for SQL errors
if (!$result) {
    die("Error in SQL query: " . $conn->error);
}

// Debug: Count total records
$count_sql = "SELECT COUNT(*) as total FROM donors";
$count_result = $conn->query($count_sql);
$count_row = $count_result->fetch_assoc();
$total_records = $count_row['total'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Donors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
            text-align: center;
            padding-top: 70px;
        }
        h2 {
            color: #d32f2f;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #d32f2f;
            color: white;
        }
        tr:nth-child(even) {
            background: #f8f8f8;
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: red;
            padding: 10px 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .navbar-brand {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .navbar-nav {
            display: flex;
            list-style: none;
            padding: 0;
        }
        .navbar-nav li {
            margin: 0 15px;
        }
        .navbar-nav a {
            color: white;
            font-size: 18px;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }
        .navbar-nav a:hover {
            background: rgba(255, 255, 255, 0.2);
        }
        .debug-info {
            background: #fff;
            padding: 15px;
            margin: 20px auto;
            width: 90%;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">DonorSpot</a>
        <ul class="navbar-nav">
            <li><a href="adminindex.php"><b>Back to Dashboard</b></a></li>
        </ul>
    </nav>

    <div class="debug-info">
        <h3>Database Information</h3>
        <p>Total records in donors table: <?php echo $total_records; ?></p>
        <p>Database: <?php echo $dbname; ?></p>
        <p>Server: <?php echo $servername; ?></p>
    </div>

    <h2>Registered Donors</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Blood Group</th>
            <th>Donation Type</th>
            <th>Organ Type</th>
            <th>Specific Organ</th>
            <th>Phone</th>
            <th>Address</th>
        </tr>
        
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['dob']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['blood_group']}</td>
                    <td>{$row['donation_type']}</td>
                    <td>{$row['organ_type']}</td>
                    <td>{$row['specific_organ']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No donors registered yet.</td></tr>";
        }

        // Close Connection
        if ($result) {
            $result->free();
        }
        $conn->close();
        ?>
    </table>
</body>
</html> 