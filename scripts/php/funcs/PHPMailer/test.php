<?php
require ('autoloader.php');
require ('PHPMailer.php');
require ('SMPT.php');

$mail = new PHPMailer;

$mail->SMTPDebug = 1;                               // Enable verbose debug output

	$maileruser = "onlineregistr19@gmail.com";
	$mailpass = "stu-registr";	

$mail->isSMTP();                       // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $maileruser;         // SMTP username
$mail->Password = $mailpass;                     // SMTP password
$mail->SMTPSecure = 'tls';    // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;    // TCP port to connect to

$mail->isHTML(true);


$mail->setFrom($maileruser, 'Mailer');
$mail->addAddress($maileruser, 'Joe User');     // Add a recipient
$mail->addAddress($maileruser);               // Name is optional
$mail->addReplyTo($maileruser, 'Information');

 

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.<br>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
	echo "<br>".date("w/m h:m:s",time());
} else {
    echo 'Message has been sent';
}

?>