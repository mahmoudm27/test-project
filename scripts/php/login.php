<?php
	session_start();
	require_once("ctrl/dbctrl.php");
	$db = new dbctrl();
	
	
	if($res = $db->selectid("SELECT * FROM users WHERE usr_username = ?",array($_POST["username"])))
	{
		if(md5($_POST["password"]) == $res[0]["usr_password"])
		{
			require_once("ctrl/sessctrl.php");
			loggedin($res);
			header("location:../../cpan.php");
			
		}else $_SESSION["notice"] = "Wrong password";
	}else $_SESSION["notice"] = "Wrong username or password";
	
	if(!$_SESSION["ulogged"])header("location:../../login.php");
?>