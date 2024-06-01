<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 2;
	$mail->isSMTP();

	$mail->Host = 'localhost';
	$mail->Port = 25;
	$mail->SMTPAuth = false;
 

	$mail->setFrom('admin@localhost.com', 'Sender Name');
	$mail->addAddress('deceitmaster46@gmail.com', 'Recipient Name');
	$mail->Subject = 'Hello';
	$mail->Body = 'This is a test email.';
	$mail->send();
	echo "Email sent successfully!";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>