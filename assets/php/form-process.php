<?php

if (isset($_POST[' submit' ])) {
$name = $_POST[' name'];
$subject = $_POST[' subject'];
$mailFrom = $_POST[ 'mail'];
$message = $_POST[ 'message'];
    
$mailTo = "smsemenuk2020@icloud.com";
$headers = "From: ".$mailFrom;
$txt = "You have received an e-mail from " .$name.". \n\n". $message;

mail ($mailTo, $subject, $txt, $headers); header ("Location: index.php?mailsend");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                         // Set mailer to use SMTP
    $mail->Host       = 'smtp.mail.me.com';                  // iCloud SMTP server
    $mail->SMTPAuth   = true;                                // Enable SMTP authentication
    $mail->Username   = 'your_icloud_email@icloud.com';      // Your iCloud email
    $mail->Password   = 'your_icloud_app_password';          // App-specific password (more on this below)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Enable TLS encryption
    $mail->Port       = 587;                                 // TCP port for TLS

    //Recipients
    $mail->setFrom('your_icloud_email@icloud.com', 'Your Name');
    $mail->addAddress('recipient@example.com');              // Add a recipient

    // Content
    $mail->isHTML(true);                                     // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body    = 'This is a test email using iCloud SMTP and PHPMailer.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
