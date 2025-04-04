<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php'; // Load Composer's autoloader

// Handle form data (assuming POST request)
$data = json_decode(file_get_contents('php://input'), true);

// Validate input data
if (empty($data['phone']) || empty($data['methodOfContact']) || empty($data['pageUrl'])) {
    echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
    exit;
}

// Validate phone number (10 digits)
if (!preg_match('/^\d{10}$/', $data['phone'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid phone number. It should contain exactly 10 digits.']);
    exit;
}




$mail = new PHPMailer(true);

try {
    // Configure PHPMailer to send email
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'shivamsingh19989@gmail.com';  
    $mail->Password   = 'lckt mzhu pmvz ieze';         // Your email app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Send the email to the admin
    $mail->setFrom('leagalhouse001@gmail.com', 'Legal-House');
    $mail->addAddress('shivamsingh19989@gmail.com', 'Admin');  // Change to your admin email

    // Compose the email content for Admin
    $mail->isHTML(true);
    $mail->Subject = 'New Website Enquiry';
    $mail->Body    = "
        <html>
            <body>
                <h3>New Website Enquiry</h3>
                <p><strong>Phone:</strong> {$data['phone']}</p>
                <p><strong>Method of Contact:</strong> {$data['methodOfContact']}</p>
                <p><strong>Page URL:</strong> {$data['pageUrl']}</p>
            </body>
        </html>";
    $mail->AltBody = "New Website Enquiry\nPhone: {$data['phone']}\nMethod of Contact: {$data['methodOfContact']}\nPage URL: {$data['pageUrl']}";

    // Send the admin email
    if (!$mail->send()) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send the admin email.']);
        exit;
    }

    // Return success response
    echo json_encode(['status' => 'success', 'message' => 'Your enquiry has been submitted successfully!']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
}
?>