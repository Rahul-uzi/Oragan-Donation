<?php
// Function to send email notification
function sendDonorMatchNotification($patient_email, $patient_name, $donor_name, $organ_needed) {
    // Gmail SMTP Configuration
    $smtp_server = "smtp.gmail.com";
    $smtp_port = 587;
    $smtp_username = "mehakdhiman293@gmail.com"; // Your Gmail address
    $smtp_password = "crgptxteznjzghikz"; // Your Gmail App Password
    
    // Email content
    $subject = "Potential Donor Found - DonorSpot";
    $message = "
    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
        <h2 style='color: #ff0000;'>🎉 Great News! A Potential Donor Has Been Found</h2>
        <p>Dear $patient_name,</p>
        <p>We are pleased to inform you that a potential donor has been found for your required $organ_needed.</p>
        <div style='background: #f8f9fa; padding: 15px; border-radius: 5px; margin: 20px 0;'>
            <h3 style='color: #2c3e50;'>Donor Details:</h3>
            <ul style='list-style: none; padding: 0;'>
                <li style='margin: 10px 0;'>👤 <strong>Name:</strong> $donor_name</li>
                <li style='margin: 10px 0;'>💉 <strong>Organ:</strong> $organ_needed</li>
            </ul>
        </div>
        <p>Your request is currently pending admin approval. Once approved, we will contact you with further details.</p>
        <p style='color: #7f8c8d; font-size: 0.9em;'>This is an automated message. Please do not reply to this email.</p>
        <p>Best regards,<br><strong>DonorSpot Team</strong></p>
    </div>";
    
    // Email headers
    $headers = array(
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: DonorSpot <mehakdhiman293@gmail.com>',
        'Reply-To: mehakdhiman293@gmail.com',
        'X-Mailer: PHP/' . phpversion()
    );
    
    // Initialize cURL session
    $ch = curl_init();
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, "smtp://$smtp_server:$smtp_port");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_USERPWD, "$smtp_username:$smtp_password");
    curl_setopt($ch, CURLOPT_MAIL_FROM, $smtp_username);
    curl_setopt($ch, CURLOPT_MAIL_RCPT, array($patient_email));
    curl_setopt($ch, CURLOPT_UPLOAD, true);
    curl_setopt($ch, CURLOPT_INFILE, fopen('php://temp', 'r+'));
    curl_setopt($ch, CURLOPT_INFILESIZE, strlen($message));
    curl_setopt($ch, CURLOPT_READFUNCTION, function($ch, $fp, $len) use ($message) {
        static $data = '';
        if (empty($data)) {
            $data = $message;
        }
        $chunk = substr($data, 0, $len);
        $data = substr($data, $len);
        return $chunk;
    });
    
    // Execute cURL session
    $result = curl_exec($ch);
    
    // Check for errors
    if ($result === false) {
        error_log("Email sending failed: " . curl_error($ch));
        curl_close($ch);
        return false;
    }
    
    // Close cURL session
    curl_close($ch);
    
    error_log("Email sent successfully to $patient_email");
    return true;
}

// Function to send SMS notification (placeholder for future implementation)
function sendSMSNotification($phone, $message) {
    // This is a placeholder for SMS functionality
    // You would need to integrate with an SMS service provider
    // For example: Twilio, Nexmo, etc.
    error_log("SMS would be sent to $phone: $message");
    return true;
}
?> 