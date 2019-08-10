<?php
	session_start();
	ob_start();
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
		$statement = "INSERT INTO `departments` (`dep_id` ,`dep_name` ,`dep_describtion` ,`dep_img`)
			VALUES 
				(?,?,?,?);";
		$data = array(
			null,$_POST["name"],$_POST["describtion"],"");
		
		if($lastid = $db->insert($statement,$data))
		{
			uploadImages("departments",$lastid);
			$_SESSION["notice"]="تم إاضافة كلية بنجاح";
		}
		
	}else
	if($_POST["act"] == "e")
	{
		if($_POST["dep"])
		{
			$statement = "UPDATE departments SET dep_name = ?, dep_describtion = ? WHERE dep_id = ?";
			$data = array($_POST["name"],$_POST["describtion"],$_POST["dep"]);
			$db->insert($statement,$data);
			uploadImages("departments",$_POST["dep"]);
			$_SESSION["notice"]="تم تعديل كلية بنجاح";
			
		}else $_SESSION["notice"] = "Error - Illegal operation.";
	}else $_SESSION["notice"] = "Error - Invalid data.";
	
	 header('location:../../../cpan.php');


$conn = new mysqli("localhost", "root", "", "yemenuniversities");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO activities (Event, date)
VALUES ('department added added',CURDATE() )";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>