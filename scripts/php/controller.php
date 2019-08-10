<?php
   ob_start();
	session_start();
	require_once("ctrl/dbctrl.php");
	require_once("ctrl/sessctrl.php");
	
	activeCheck();
	$db = new dbctrl();
?>