<?php

	session_start();
		
	require_once('../ctrl/dbctrl.php');
	require_once('PHPMailer/autoloader.php');
	require_once('PHPMailer/PHPMailer.php');
	require_once('PHPMailer/SMPT.php');
	
	$maileruser = "yemenun5@gmail.com";
	$mailpass = "YY12345yy";	
	
	$db = new dbctrl();
	$statement = "SELECT * FROM student WHERE username = ? AND email = ?";
	$data= array($_POST[ulogin],$_POST[uemail]);
	
	$mail = new PHPMailer;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                       // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $maileruser;         // SMTP username
	$mail->Password = $mailpass;                     // SMTP password
	$mail->SMTPSecure = 'tls';    // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;    // TCP port to connect to

	$mail->isHTML(true);
	
	
	$mail->setFrom($_POST["email"],$_POST["fullname"]);
	$mail->addReplyTo($_POST["email"],$_POST["fullname"]);
	$mail->addAddress($maileruser);
	
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Body  = "Contacter's email: $_POST[email] <br><br>".$_POST["message"];
	$mail->Subject = "ContactUs: ".$_POST["subject"];
	
	if(!$mail->send()) {
		$_SESSION["error"]  = 'هنالك مشكلة في الارسال<br>الرجاء المحاولة لاحقاً';
	} else 
	{
		$_SESSION["error"] = "تم إرسال رسالتك<br>شكراً على تواصلك معنا";
	}
	
	header("location:../../../contact.php");
	
	 
	
?>