<?php
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

// Fetch Patients
$sql = "SELECT id, name, age, gender, blood_group,organ_needed, phone, address FROM patients";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Patients</title>
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
            background:red; /* Gradient Background */
            padding: 10px 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 1000; /* Ensure it's on top */
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
    </style>
</head>
<body>
<nav class="navbar">
        <a class="navbar-brand" href="#">DonorSpot</a>
        <ul class="navbar-nav">
            <li><a href="adminindex.php"><b>Home</b></a></li>
        </ul>
    </nav>
    <h2>Registered Patients</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
			
            <th>Gender</th>
            <th>Blood Group</th>
			 <th>Required Organ</th>
			 
            <th>Phone</th>
            <th>Address</th>
           
        </tr>
        
        <?php
        // Ensure query executed correctly
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['age']}</td>
                    
                    <td>{$row['gender']}</td>
                    <td>{$row['blood_group']}</td>
					<td>{$row['organ_needed']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                    
                </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No patients registered yet.</td></tr>";
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
