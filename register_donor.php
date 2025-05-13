<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donorspot";

// ✅ Database Connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Donor Registration Process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $donation_type = $_POST['donation_type'];
    $organ_type = $_POST['organ_type'];
    $usage_type = $_POST['usage_type'];

    // ✅ Specific Organ Handling
    $specific_organ = !empty($_POST['specific_organ']) ? $conn->real_escape_string($_POST['specific_organ']) : NULL;

    // ✅ Insert Donor into Database (with specific_organ fix)
    $sql = "INSERT INTO donors (name, email, dob, gender, blood_group, phone, address, donation_type, organ_type, specific_organ, usage_type)
            VALUES ('$name', '$email', '$dob', '$gender', '$blood_group', '$phone', '$address', '$donation_type', '$organ_type', 
            " . ($specific_organ !== NULL ? "'$specific_organ'" : "NULL") . ", '$usage_type')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2 style='color: green;'>✔ Donor Registration Successful!</h2>";

        // ✅ Add Donor Notification
        $message = "New donor registered: $name (Blood Group: $blood_group, Organ: " . ($specific_organ !== NULL ? $specific_organ : $organ_type) . ")";
        $conn->query("INSERT INTO notifications (message, type) 
                      VALUES ('$message', 'donor')");

        echo "<br><a href='userindex.php' style='padding: 10px 20px; background: red; color: white; text-decoration: none; border-radius: 5px;'>Go to Home</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
