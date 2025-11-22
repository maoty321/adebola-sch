<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader (created by composer, not included with PHPMailer)
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    
$mail = new PHPMailer(true); 
    //Server settings
    $mail->isSMTP();
$mail->Host = 'smtp.hostinger.com';
$mail->SMTPAuth = true;
$mail->Username = 'info@aecoht.com';
$mail->Password = 'Fmstereo@90.5'; // Replace safely
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('info@aecoht.com', 'ADEBOLA EXCELLENT COLLEGE OF HEALTH SCIENCES AND TECHNOLOGY');
$mail->addAddress('maoty805@gmail.com', 'Muqtar');
$mail->isHTML(true);
$mail->Subject = '';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
} catch (Exception $e) { 
    echo 'err'. $e->getMessage();
}