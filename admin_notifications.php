<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: adminlogin.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donorspot";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle approval/rejection
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && isset($_POST['notification_id'])) {
    $notification_id = $_POST['notification_id'];
    $action = $_POST['action'];
    
    $update_sql = "UPDATE notifications SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("si", $action, $notification_id);
    $stmt->execute();
    
    if ($action == 'approved') {
        // Update patient status
        $update_patient = "UPDATE patients p JOIN notifications n ON p.id = n.patient_id 
                          SET p.status = 'approved' WHERE n.id = ?";
        $stmt = $conn->prepare($update_patient);
        $stmt->bind_param("i", $notification_id);
        $stmt->execute();
    }
}

// Fetch all notifications
$sql = "SELECT n.*, p.name as patient_name, p.phone as patient_phone, p.email as patient_email,
               d.name as donor_name, d.phone as donor_phone, d.email as donor_email
        FROM notifications n
        JOIN patients p ON n.patient_id = p.id
        JOIN donors d ON n.donor_id = d.id
        ORDER BY n.created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Notifications - DonorSpot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .notification-card {
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .status-pending {
            background-color: #fff3cd;
        }
        .status-approved {
            background-color: #d4edda;
        }
        .status-rejected {
            background-color: #f8d7da;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Donor-Patient Matches</h2>
        
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="card notification-card status-<?php echo $row['status']; ?>">
                    <div class="card-body">
                        <h5 class="card-title">Match #<?php echo $row['id']; ?></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Patient Details:</h6>
                                <p><strong>Name:</strong> <?php echo $row['patient_name']; ?></p>
                                <p><strong>Phone:</strong> <?php echo $row['patient_phone']; ?></p>
                                <p><strong>Email:</strong> <?php echo $row['patient_email']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <h6>Donor Details:</h6>
                                <p><strong>Name:</strong> <?php echo $row['donor_name']; ?></p>
                                <p><strong>Phone:</strong> <?php echo $row['donor_phone']; ?></p>
                                <p><strong>Email:</strong> <?php echo $row['donor_email']; ?></p>
                            </div>
                        </div>
                        <p><strong>Organ Needed:</strong> <?php echo $row['organ_needed']; ?></p>
                        <p><strong>Status:</strong> <?php echo ucfirst($row['status']); ?></p>
                        
                        <?php if ($row['status'] == 'pending'): ?>
                            <form method="POST" class="d-inline">
                                <input type="hidden" name="notification_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="action" value="approved" class="btn btn-success">Approve</button>
                                <button type="submit" name="action" value="rejected" class="btn btn-danger">Reject</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="alert alert-info">
                No donor-patient matches found.
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 