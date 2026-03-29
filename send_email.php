<?php
/**
 * Contact form – hantar emel via SMTP (PHPMailer + Brevo)
 * Works on:
 * - Local (folder ymsuccess)
 * - Server (files directly in public_html)
 */

/* ===============================
   SAFETY: prevent broken JSON
================================ */
ob_start();
header('Content-Type: application/json; charset=utf-8');

function send_json($data)
{
    if (ob_get_length()) {
        ob_end_clean();
    }
    echo json_encode($data);
    exit;
}

/* ===============================
   LOAD DEPENDENCIES (SAFE WAY)
================================ */
$baseDir = __DIR__;

$autoload = $baseDir . '/vendor/autoload.php';
$config   = $baseDir . '/brevo_config.php';

if (!is_file($autoload)) {
    error_log('send_email.php: vendor/autoload.php NOT FOUND at ' . $autoload);
    send_json([
        'success' => false,
        'message' => 'Server configuration error. Please contact us via WhatsApp.'
    ]);
}

if (!is_file($config)) {
    error_log('send_email.php: brevo_config.php NOT FOUND at ' . $config);
    send_json([
        'success' => false,
        'message' => 'Server configuration error. Please contact us via WhatsApp.'
    ]);
}

require $autoload;
require $config;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* ===============================
   ONLY ALLOW POST
================================ */
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    send_json(['success' => false, 'message' => 'Invalid request']);
}

/* ===============================
   SANITIZE INPUT
================================ */
$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

if (!$name || !$email || !$subject || !$message) {
    send_json(['success' => false, 'message' => 'All fields are required']);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    send_json(['success' => false, 'message' => 'Invalid email address']);
}

if (strlen($name) > 100 || strlen($subject) > 200 || strlen($message) > 3000) {
    send_json(['success' => false, 'message' => 'Input too long']);
}

$name    = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

/* ===============================
   EMAIL CONTENT
================================ */
$emailSubject = "New Contact Message from $name <$email>";

$htmlBody = "
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
</head>
<body style='font-family:Arial,sans-serif;background:#f4f4f4;padding:20px'>
<div style='max-width:600px;margin:auto;background:#ffffff;padding:20px;border-radius:6px'>
<h2 style='color:#4f46e5'>New Contact Form Submission</h2>
<p><strong>Name:</strong> {$name}</p>
<p><strong>Email:</strong> {$email}</p>
<p><strong>Subject:</strong> {$subject}</p>
<hr>
<p>" . nl2br($message) . "</p>
<p style='font-size:12px;color:#777;margin-top:20px'>
Sent from Ym Success Website<br>
" . date('Y-m-d H:i:s') . "
</p>
</div>
</body>
</html>
";

$textBody =
"New Contact Form Submission\n\n" .
"Name: {$name}\n" .
"Email: {$email}\n" .
"Subject: {$subject}\n\n" .
"Message:\n{$message}\n\n" .
"Time: " . date('Y-m-d H:i:s');

/* ===============================
   SEND EMAIL (BREVO SMTP)
================================ */
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = BREVO_SMTP_HOST;
    $mail->SMTPAuth   = true;
    $mail->Username   = BREVO_SMTP_USERNAME;
    $mail->Password   = BREVO_SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = BREVO_SMTP_PORT;

    $mail->CharSet = 'UTF-8';

    $mail->setFrom(BREVO_FROM_EMAIL, 'Ym Success');
    $mail->addAddress(BREVO_TO_EMAIL, BREVO_TO_NAME);
    $mail->addReplyTo($email, $name);

    $mail->isHTML(true);
    $mail->Subject = $emailSubject;
    $mail->Body    = $htmlBody;
    $mail->AltBody = $textBody;

    $mail->send();

    send_json([
        'success' => true,
        'message' => 'Message sent successfully. We will contact you soon.'
    ]);

} catch (Exception $e) {
    error_log('Brevo SMTP Error: ' . $mail->ErrorInfo);
    send_json([
        'success' => false,
        'message' => 'Failed to send message. Please contact us via WhatsApp.'
    ]);
}
