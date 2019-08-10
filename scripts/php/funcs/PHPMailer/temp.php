<?php
	error_reporting(4);
	session_start();
	
	require_once('../ctrl/dbctrl.php');
	require_once('PHPMailer/autoloader.php');
	require_once('PHPMailer/PHPMailer.php');
	require_once('PHPMailer/SMPT.php');


require ('autoloader.php');
require ('PHPMailer.php');
require ('SMPT.php');

$db = new dbctrl();
$statement = "SELECT * FROM student WHERE username = ? AND email = ?";
$data= array($_POST[ulogin],$_POST[uemail]);
	
if(sizeof($db->selectid($statement,$data))>0)
{	

	$maileruser = "onlineregistr19@gmail.com";
	$mailpass = "stu-registr";	
		
	$newpass = genString();
	$mail = new PHPMailer;
	$mail->SMTPDebug = 1;                               // Enable verbose debug output

	$mail->isSMTP();                       // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = $maileruser;         // SMTP username
	$mail->Password = $mailpass;                     // SMTP password
	$mail->SMTPSecure = 'tls';    // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;    // TCP port to connect to

	$mail->isHTML(true);


	$mail->setFrom($maileruser, 'Mailer');
	$mail->addAddress($_POST[eumail]);               // Name is optional
	$mail->addReplyTo("noreply", 'Information');

	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Body  = getBody($newpass);
	$mail->Subject = 'Password reset request';
	$mail->Body    = 'This is the HTML message body <b>in bold!</b>';

	$db->insert("UPDATE student SET password = ? WHERE username = ?",array(md5($newpass),$_POST[ulogin]));

	if(!$emailer->send()) 
	{
		$_SESSION[error]  = 'هنالك مشكلة في الارسال<br>الرجاء المحاولة لاحقاً'."<br>$newpass";
		echo "pass";
	} else 
	{
		$_SESSION[error] = "تم إرسال بريد االكتروني بكلمة السر الجديدة إليك<br>الرجاء الدخول و تغيير كلمة السر لحسابك في اقرب وقت ممكن";
		echo "fail";
	}

}
else
{
	$_SESSION[error] = " اسم المستخدم او البريد الالكتروني خطاء  ";
	header("location:../../../forgotpassword.php");
}
	
	function genString($length = 15) 
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
		
	
	function getBody($newpass)
	{
		return "
			
			<h2>عزيزي الطالب / يرجى نسخ كلمة المرور الجديده والدخول لحسابك في الموقع وتعمل تغيير لكمة السر </h2>
			<p>
				لازم تغير كلمة السر لكي تضمن عدم نسيانها
			</p>
			 كلمة المرور الجديدة هي :
			<br>
			<div align='center' style='font-size:20; color:red;'>$newpass</div> 
			<br><br><br>
			Online Registration
		";
	}
	
?>