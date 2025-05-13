<?php
// Test email configuration
$to = "mehakdhiman293@gmail.com"; // Your email address
$subject = "Test Email from DonorSpot";
$message = "This is a test email to verify that the email system is working properly.";

// Email headers
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: DonorSpot <donorspot@gmail.com>" . "\r\n";
$headers .= "Reply-To: donorspot@gmail.com" . "\r\n";

// Try to send the email
$mailSent = mail($to, $subject, $message, $headers);

// Display results
?>
<!DOCTYPE html>
<html>
<head>
    <title>Email Test - DonorSpot</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Email Test Results</h2>
        <div class="card mt-4">
            <div class="card-body">
                <?php if ($mailSent): ?>
                    <div class="alert alert-success">
                        <h4>✅ Email Sent Successfully!</h4>
                        <p>Test email has been sent to <?php echo htmlspecialchars($to); ?></p>
                        <p>Please check your inbox (and spam folder) for the test email.</p>
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger">
                        <h4>❌ Email Failed to Send</h4>
                        <p>There was an error sending the test email. This could be due to:</p>
                        <ul>
                            <li>PHP mail() function not being properly configured</li>
                            <li>SMTP server not being set up correctly</li>
                            <li>Email server blocking the outgoing mail</li>
                        </ul>
                        <p>Please check your PHP configuration and email server settings.</p>
                    </div>
                <?php endif; ?>
                
                <h5>Test Details:</h5>
                <ul>
                    <li><strong>To:</strong> <?php echo htmlspecialchars($to); ?></li>
                    <li><strong>Subject:</strong> <?php echo htmlspecialchars($subject); ?></li>
                    <li><strong>Message:</strong> <?php echo htmlspecialchars($message); ?></li>
                </ul>
            </div>
        </div>
        
        <div class="mt-4">
            <h4>Next Steps:</h4>
            <ol>
                <li>Check your email inbox (and spam folder) for the test email</li>
                <li>If the email was not received, check your PHP error logs</li>
                <li>Verify your PHP mail configuration in php.ini</li>
                <li>Consider using a mail server like Mercury Mail (included with XAMPP)</li>
            </ol>
        </div>
    </div>
</body>
</html> 