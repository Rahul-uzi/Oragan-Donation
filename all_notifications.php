<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: adminlogin.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donorspot";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                       // Disable debug output
    $mail->isSMTP();                                          // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                 // Enable SMTP authentication
    $mail->Username   = 'mehakdhiman293@gmail.com';           // Your Gmail address
    $mail->Password   = 'ymib qvvz ecuk lwqr';                  // Your Gmail App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption
    $mail->Port       = 587;                                  // TCP port to connect to

    // Recipients
    $mail->setFrom('mehakdhiman293@gmail.com', 'DonorSpot'); // Sender's email and name

    // Sending to a patient
    $patient_email = 'sakshinatual345@gmail.com'; // Replace with the patient's email
    $mail->addAddress($patient_email, 'Patient Name'); // Add a recipient

    // Content for patient notification
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Potential Donor Found - DonorSpot';
    $mail->Body    = 'We are pleased to inform you that a potential donor has been found for your required organ.';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Send the email to the patient
    $mail->send();
    echo 'Message has been sent to the patient.';

    // Now, send a notification to the donor as well
    $donor_email = 'donor@example.com'; // Replace with the donor's email
    $mail->clearAddresses(); // Clear previous recipients
    $mail->addAddress($donor_email, 'Donor Name'); // Add a recipient

    // Content for donor notification
    $mail->Subject = 'Thank You for Your Donation - DonorSpot';
    $mail->Body    = 'Thank you for your willingness to donate. We appreciate your generosity.';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Send the email to the donor
    $mail->send();
    //echo 'Message has been sent to the donor.';

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

// Get all patients and donors
$patients_query = "SELECT * FROM patients";
$donors_query = "SELECT * FROM donors";

$patients_result = $conn->query($patients_query);
$donors_result = $conn->query($donors_query);

// Store all patients and donors
$all_patients = [];
$all_donors = [];

if ($patients_result) {
    while ($row = $patients_result->fetch_assoc()) {
        $all_patients[] = $row;
    }
}

if ($donors_result) {
    while ($row = $donors_result->fetch_assoc()) {
        $all_donors[] = $row;
    }
}

// Find matches using specific_organ matching
$matches = [];
foreach ($all_patients as $patient) {
    foreach ($all_donors as $donor) {
        // Compare patient's organ_needed with donor's specific_organ
        if ($patient['organ_needed'] == $donor['specific_organ']) {
            $matches[] = [
                'patient' => $patient,
                'donor' => $donor,
                'match_type' => 'Exact organ match found'
            ];
        }
    }
}

// Debug information
$debug_info = [
    'total_patients' => count($all_patients),
    'total_donors' => count($all_donors),
    'matches_found' => count($matches),
    'patients' => $all_patients,
    'donors' => $all_donors
];

// Debug output for organ types
echo "<!-- Debug: Patient Organ Types -->\n";
foreach ($all_patients as $patient) {
    echo "<!-- Patient: " . $patient['name'] . " - Organ Needed: " . $patient['organ_needed'] . " -->\n";
}
echo "<!-- Debug: Donor Organ Types -->\n";
foreach ($all_donors as $donor) {
    echo "<!-- Donor: " . $donor['name'] . " - Specific Organ: " . $donor['specific_organ'] . " -->\n";
}

$smtp_server = "smtp.gmail.com";
$smtp_port = 25;
$smtp_username = "mehakdhiman293@gmail.com"; // Your Gmail address
$smtp_password = "qpwp nxib phfu fdko"; // Your Gmail App Password

// Check for success message
$success_message = '';
if (isset($_SESSION['success_message'])) {
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Clear the message after displaying it
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matches - DonorSpot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .match-card {
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .match-card:hover {
            transform: translateY(-5px);
        }
        .match-header {
            background-color: #28a745;
            color: white;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .match-body {
            padding: 20px;
        }
        .patient-info, .donor-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .debug-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 14px;
        }
        .data-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        .data-table th, .data-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .data-table th {
            background-color: #f2f2f2;
        }
        .debug-section {
            margin-top: 20px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }
        .match-type {
            color: #28a745;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .notification-btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .notification-btn:hover {
            background-color: #0056b3;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Potential Matches</h2>
        
        <?php if ($success_message): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        
        <?php if (!empty($matches)): ?>
            <?php foreach ($matches as $match): ?>
                <div class="card match-card">
                    <div class="match-header">
                        <h5 class="mb-0">Match Found!</h5>
                    </div>
                    <div class="match-body">
                        <div class="match-type">
                            <?php echo $match['match_type']; ?>
                        </div>
                        <div class="patient-info">
                            <h5>Patient Details</h5>
                            <p><strong>Name:</strong> <?php echo htmlspecialchars($match['patient']['name']); ?></p>
                            <p><strong>Organ Needed:</strong> <?php echo htmlspecialchars($match['patient']['organ_needed']); ?></p>
                            <p><strong>Blood Group:</strong> <?php echo htmlspecialchars($match['patient']['blood_group']); ?></p>
                            <p><strong>Contact:</strong> <?php echo htmlspecialchars($match['patient']['email']); ?></p>
                            <p><strong>Phone:</strong> <?php echo htmlspecialchars($match['patient']['phone']); ?></p>
                        </div>
                        
                        <div class="donor-info">
                            <h5>Donor Details</h5>
                            <p><strong>Name:</strong> <?php echo htmlspecialchars($match['donor']['name']); ?></p>
                            <p><strong>Organ Available:</strong> <?php echo htmlspecialchars($match['donor']['specific_organ']); ?></p>
                            <p><strong>Blood Group:</strong> <?php echo htmlspecialchars($match['donor']['blood_group']); ?></p>
                            <p><strong>Contact:</strong> <?php echo htmlspecialchars($match['donor']['email']); ?></p>
                            <p><strong>Phone:</strong> <?php echo htmlspecialchars($match['donor']['phone']); ?></p>
                        </div>
                        
                        <form method="POST" class="mt-3">
                            <input type="hidden" name="patient_email" value="<?php echo htmlspecialchars($match['patient']['email']); ?>">
                            <input type="hidden" name="donor_name" value="<?php echo htmlspecialchars($match['donor']['name']); ?>">
                            <input type="hidden" name="organ_type" value="<?php echo htmlspecialchars($match['donor']['specific_organ']); ?>">
                            <button type="submit" name="send_notification" class="notification-btn">
                                <i class="fas fa-envelope"></i> Send Notification to Patient
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="alert alert-info">
                <h4>No matches found at this time.</h4>
                <?php if (empty($all_patients)): ?>
                    <p>No patients registered in the system.</p>
                <?php endif; ?>
                <?php if (empty($all_donors)): ?>
                    <p>No donors registered in the system.</p>
                <?php endif; ?>
                <?php if (!empty($all_patients) && !empty($all_donors)): ?>
                    <p>There are <?php echo count($all_patients); ?> patients and <?php echo count($all_donors); ?> donors, but no matching organ types were found.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Debug Information -->
        <div class="debug-info">
            <h5>System Information:</h5>
            <p>Total Patients: <?php echo $debug_info['total_patients']; ?></p>
            <p>Total Donors: <?php echo $debug_info['total_donors']; ?></p>
            <p>Matches Found: <?php echo $debug_info['matches_found']; ?></p>
            
            <?php if (!empty($all_patients)): ?>
                <div class="debug-section">
                    <h6>All Patients:</h6>
                    <table class="data-table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Blood Group</th>
                            <th>Organ Needed</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                        <?php foreach ($all_patients as $patient): ?>
                            <tr>
                                <td><?php echo $patient['id']; ?></td>
                                <td><?php echo $patient['name']; ?></td>
                                <td><?php echo $patient['blood_group']; ?></td>
                                <td><?php echo $patient['organ_needed']; ?></td>
                                <td><?php echo $patient['email']; ?></td>
                                <td><?php echo $patient['phone']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>

            <?php if (!empty($all_donors)): ?>
                <div class="debug-section">
                    <h6>All Donors:</h6>
                    <table class="data-table">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Blood Group</th>
                            <th>Specific Organ</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                        <?php foreach ($all_donors as $donor): ?>
                            <tr>
                                <td><?php echo $donor['id']; ?></td>
                                <td><?php echo $donor['name']; ?></td>
                                <td><?php echo $donor['blood_group']; ?></td>
                                <td><?php echo $donor['specific_organ']; ?></td>
                                <td><?php echo $donor['email']; ?></td>
                                <td><?php echo $donor['phone']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php endif; ?>

            <?php if ($conn->error): ?>
                <p class="text-danger">Database Error: <?php echo $conn->error; ?></p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>



