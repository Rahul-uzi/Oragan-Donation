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

// Include notification functions
require_once 'send_notification.php';

// ✅ Patient Registration Process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $name = $age = $gender = $blood_group = $organ_needed = $phone = $email = $address = "";
    
    // Get and sanitize input
    $name = trim($_POST["name"] ?? "");
    $age = trim($_POST["age"] ?? "");
    $gender = trim($_POST["gender"] ?? "");
    $blood_group = trim($_POST["blood_group"] ?? "");
    $organ_needed = trim($_POST["organ_needed"] ?? "");
    $phone = trim($_POST["phone"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $address = trim($_POST["address"] ?? "");

    // Validate required fields
    $errors = [];
    if (empty($name)) $errors[] = "Name is required";
    if (empty($age)) $errors[] = "Age is required";
    if (empty($gender)) $errors[] = "Gender is required";
    if (empty($blood_group)) $errors[] = "Blood group is required";
    if (empty($organ_needed)) $errors[] = "Organ needed is required";
    if (empty($phone)) $errors[] = "Phone number is required";
    if (empty($email)) $errors[] = "Email is required";
    if (empty($address)) $errors[] = "Address is required";

    // Validate email format
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // If there are errors, display them and stop
    if (!empty($errors)) {
        echo "<div style='color: red; padding: 20px;'>";
        echo "<h3>Please correct the following errors:</h3>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        echo "<a href='patient.php' style='padding: 10px 20px; background: red; color: white; text-decoration: none; border-radius: 5px;'>Go Back</a>";
        echo "</div>";
        exit();
    }

    // ✅ Check if Patient Already Exists
    $checkQuery = "SELECT * FROM patients WHERE phone=? OR email=?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $phone, $email);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows > 0) {
        echo "<script>alert('❌ You are already registered!'); window.location.href='userindex.php';</script>";
        exit();
    }

    // ✅ Insert Patient into Database
    $sql = "INSERT INTO patients (name, age, gender, blood_group, organ_needed, phone, address, email, status)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssss", $name, $age, $gender, $blood_group, $organ_needed, $phone, $address, $email);

    if ($stmt->execute()) {
        $patient_id = $conn->insert_id;
        echo "<div style='text-align: center; padding: 20px;'>";
        echo "<h2 style='color: green;'>✅ Patient Registration Successful!</h2>";

        // ✅ Check for Matching Donor
        $matchQuery = "SELECT id, name, phone, email FROM donors 
                      WHERE blood_group=? 
                      AND (organ_type='All Organs' OR specific_organ=?) 
                      LIMIT 1";
        $stmt = $conn->prepare($matchQuery);
        $stmt->bind_param("ss", $blood_group, $organ_needed);
        $stmt->execute();
        $matchResult = $stmt->get_result();

        if ($matchResult->num_rows > 0) {
            $donor = $matchResult->fetch_assoc();
            
            // Create notification for admin
            $notification_sql = "INSERT INTO notifications (patient_id, donor_id, organ_needed, status)
                               VALUES (?, ?, ?, 'pending')";
            $stmt = $conn->prepare($notification_sql);
            if ($stmt) {
                $stmt->bind_param("iis", $patient_id, $donor['id'], $organ_needed);
                if ($stmt->execute()) {
                    // Send email notification
                    $email_sent = sendDonorMatchNotification($email, $name, $donor['name'], $organ_needed);
                    
                    // Send SMS notification
                    $sms_message = "DonorSpot: A potential donor has been found for your required $organ_needed. Your request is pending admin approval.";
                    $sms_sent = sendSMSNotification($phone, $sms_message);

                    echo "<h2 style='color: green;'>🎉 Potential Donor Found! 🎉</h2>";
                    echo "<p>Your request has been submitted for admin approval. You will be notified once approved.</p>";
                    
                    if ($email_sent) {
                        echo "<p>📧 An email notification has been sent to your registered email address.</p>";
                    } else {
                        echo "<p style='color: red;'>⚠️ Email notification could not be sent. Please check your email address.</p>";
                    }
                    if ($sms_sent) {
                        echo "<p>📱 An SMS notification has been sent to your registered phone number.</p>";
                    }
                } else {
                    echo "<h2 style='color: red;'>Error creating notification: " . $stmt->error . "</h2>";
                }
            } else {
                echo "<h2 style='color: red;'>Error preparing notification statement: " . $conn->error . "</h2>";
            }
        } else {
            echo "<h2 style='color: red;'>❌ No Matching Donor Available</h2>";
            echo "<p>📌 You will be notified via SMS and email when a matching donor is found.</p>";
        }

        echo "<br><a href='userindex.php' style='padding: 10px 20px; background: red; color: white; text-decoration: none; border-radius: 5px;'>Go to Home</a>";
        echo "</div>";
    } else {
        echo "<div style='color: red; padding: 20px;'>";
        echo "Error: " . $stmt->error;
        echo "<br><a href='patient.php' style='padding: 10px 20px; background: red; color: white; text-decoration: none; border-radius: 5px;'>Go Back</a>";
        echo "</div>";
    }

    $conn->close();
}
?>
