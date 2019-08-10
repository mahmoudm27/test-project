<?php
	session_start();
	if(!$_SESSION["ulogged"])
	{
		$_SESSION["notice"] = "You need to login to do this operation.";
		header("location:../../../login.php");
	}
	require_once("../ctrl/filectrl.php");
	require_once("../ctrl/dbctrl.php");
	$db = new dbctrl();
	
	if($_POST["act"] == "a")
	{
		$url = str_replace("watch?v=","embed/",$_POST["url"]);
		$statement = "INSERT INTO `videos` (`vid_id` ,`vid_name` ,`vid_describtion` ,`vid_url` ,`vid_specification` ,`vid_year` ,`vid_status`)
						VALUES (?,?,?,?,?,?,?)";
		$data = array(null,"",$_POST["describtion"],$url,$_POST["specification"],$_POST["year"],0);
		if($db->insert($statement,$data))
			$_SESSION["notice"]="تم إضافة فيديو بنجاح";
	}else
	if($_POST["act"] == "e")
	{
		if($_POST["vid"])
		{
			$url = str_replace("watch?v=","embed/",$_POST["url"]);
			$statement = "UPDATE videos SET vid_describtion = ?, vid_year = ?, vid_specification = ?,vid_url = ? WHERE vid_id = ?";
			$data = array($_POST["describtion"],$_POST["year"],$_POST["specification"],$url,$_POST["vid"]);
			$db->insert($statement,$data);
			$_SESSION["notice"]="تم تعديل فيديوا بنجاح";
		}else $_SESSION["notice"] = "Error - Illegal operation.";
	}else $_SESSION["notice"] = "Error - Invalid data.";

$conn = new mysqli("localhost", "root", "", "yemenuniversities");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO activities (Event, date)
VALUES ('video added',CURDATE() )";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

	
	header("location:../../../videos.php");
?>