<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

// Handle form data
$data = json_decode(file_get_contents('php://input'), true);

// Validate required fields
$requiredFields = ['name', 'email', 'phone', 'pujaType', 'pujaMode', 'pujaDate'];
foreach ($requiredFields as $field) {
    if (empty($data[$field])) {
        echo json_encode(['status' => 'error', 'message' => "The field '$field' is required."]);
        exit;
    }
}

// Validate email format
if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid email format.']);
    exit;
}

// Validate phone number (10 digits)
if (!preg_match('/^\d{10}$/', $data['phone'])) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid phone number. It should contain exactly 10 digits.']);
    exit;
}

// Validate date (ensure it's not in the past)
$today = new DateTime('2025-03-31');
$pujaDate = new DateTime($data['pujaDate']);
if ($pujaDate < $today) {
    echo json_encode(['status' => 'error', 'message' => 'Puja date cannot be in the past.']);
    exit;
}

// Validate address for offline puja
if ($data['pujaMode'] === 'offline' && empty($data['address'])) {
    echo json_encode(['status' => 'error', 'message' => 'Address is required for offline puja.']);
    exit;
}

$mail = new PHPMailer(true);

try {
    // Configure PHPMailer (update with your credentials)
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your-email@gmail.com';
    $mail->Password   = 'your-app-password';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Admin email
    $mail->setFrom('support@pujabooking.com', 'PujaBooking');
    $mail->addAddress('admin@pujabooking.com', 'Admin');

    $mail->isHTML(true);
    $mail->Subject = 'New Puja Booking Request from ' . $data['name'];
    $mail->Body    = "
        <html>
            <body>
                <h3>New Puja Booking Request</h3>
                <p><strong>Name:</strong> {$data['name']} {$data['lastName']}</p>
                <p><strong>Email:</strong> {$data['email']}</p>
                <p><strong>Phone:</strong> {$data['phone']}</p>
                <p><strong>Puja Type:</strong> {$data['pujaType']}</p>
                <p><strong>Puja Mode:</strong> {$data['pujaMode']}</p>
                <p><strong>Preferred Date:</strong> {$data['pujaDate']}</p>
                <p><strong>Extra Services:</strong> " . (empty($data['extraServices']) ? 'None' : $data['extraServices']) . "</p>
                <p><strong>Address:</strong> " . (empty($data['address']) ? 'N/A' : nl2br($data['address'])) . "</p>
                <p><strong>Message:</strong><br>" . nl2br($data['message']) . "</p>
            </body>
        </html>";
    $mail->AltBody = "New Puja Booking Request\nName: {$data['name']} {$data['lastName']}\nEmail: {$data['email']}\nPhone: {$data['phone']}\nPuja Type: {$data['pujaType']}\nPuja Mode: {$data['pujaMode']}\nPreferred Date: {$data['pujaDate']}\nExtra Services: " . (empty($data['extraServices']) ? 'None' : $data['extraServices']) . "\nAddress: " . (empty($data['address']) ? 'N/A' : $data['address']) . "\nMessage: {$data['message']}";

    if (!$mail->send()) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send the admin email.']);
        exit;
    }

    // User auto-response email
    $mail->clearAddresses();
    $mail->addAddress($data['email'], $data['name']);
    $mail->Subject = 'Thank You for Booking with PujaBooking!';
    $mail->Body    = "
        <html>
            <body>
                <h3>Thank You for Your Puja Booking!</h3>
                <p>Dear {$data['name']},</p>
                <p>We have successfully received your puja booking request. Our team will contact you soon to confirm the details.</p>
                <p><strong>Booking Details:</strong></p>
                <p>Puja Type: {$data['pujaType']}</p>
                <p>Puja Mode: {$data['pujaMode']}</p>
                <p>Preferred Date: {$data['pujaDate']}</p>
                <p>Extra Services: " . (empty($data['extraServices']) ? 'None' : $data['extraServices']) . "</p>
                <p>Address: " . (empty($data['address']) ? 'N/A' : nl2br($data['address'])) . "</p>
                <p><strong>Your Message:</strong><br>" . nl2br($data['message']) . "</p>
                <p>We’ll reach out to you at {$data['phone']} or {$data['email']} shortly.</p>
                <p>Best regards, <br>PujaBooking Team</p>
            </body>
        </html>";
    $mail->AltBody = "Thank You for Your Puja Booking!\n\nDear {$data['name']},\n\nWe have successfully received your puja booking request. Our team will contact you soon to confirm the details.\n\nBooking Details:\nPuja Type: {$data['pujaType']}\nPuja Mode: {$data['pujaMode']}\nPreferred Date: {$data['pujaDate']}\nExtra Services: " . (empty($data['extraServices']) ? 'None' : $data['extraServices']) . "\nAddress: " . (empty($data['address']) ? 'N/A' : $data['address']) . "\nYour Message:\n{$data['message']}\n\nWe’ll reach out to you at {$data['phone']} or {$data['email']} shortly.\n\nBest regards,\nPujaBooking Team";

    if (!$mail->send()) {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send the auto-response email.']);
        exit;
    }

    echo json_encode(['status' => 'success', 'message' => 'Your puja booking has been submitted successfully!']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => 'Mailer Error: ' . $mail->ErrorInfo]);
}
?>