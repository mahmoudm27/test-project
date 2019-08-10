<?php
	session_start();
	if(!$_SESSION["ulogged"])
	{
		echo "N";
	}
	require_once("../ctrl/filectrl.php");
	require_once("../ctrl/dbctrl.php");
	$db = new dbctrl();
	
	if($_POST["act"] == "uni")
	{
		$statement = "DELETE FROM universities WHERE uni_id = ?";
		$data = array($_POST["id"]);
		$db->insert($statement,$data);
		echo "D";
		
	}else
		
	if($_POST["act"] == "dep")
	{
		$statement = "DELETE FROM departments WHERE dep_id = ?";
		$data = array($_POST["id"]);
		$db->insert($statement,$data);
		echo "D";
		
	}else
		
	if($_POST["act"] == "spc")
	{
		$statement = "DELETE FROM specifications WHERE spc_id = ?";
		$data = array($_POST["id"]);
		$db->insert($statement,$data);
		echo "D";
		
	}else
		
	if($_POST["act"] == "bk")
	{
		$statement = "DELETE FROM books WHERE bks_id = ?";
		$data = array($_POST["id"]);
		$db->insert($statement,$data);
		echo "D";
		
	}else
	if($_POST["act"] == "vid")
	{
		$statement = "DELETE FROM videos WHERE vid_id = ?";
		$data = array($_POST["id"]);
		$db->insert($statement,$data);
		echo "D";
		
	}else
	if($_POST["act"] == "img")
	{
		if($_POST["url"])
		{
			if (file_exists("../../../deletedImages/".$_POST["url"]) == false) {mkdir($folder,0777, true);}
			rename("../../../".$_POST["url"],
				   "../../../deletedImages/".$_POST["url"]);
		
		}else $_SESSION["notice"] = "Error - Illegal operation.";
	}else $_SESSION["notice"] = "Error - Invalid data.";
	
?>