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
		$statement = "
			INSERT INTO `post` 
				(`post_id` ,`post_name` ,`post` ,`image`) 
			VALUES (?,?,?,?)";
		$data = array(
			null,$_POST["name"],$_POST["post"],""
		);
		
		if($lastid = $db->insert($statement,$data))
		{
		uploadImages("grant",$lastid);
			$_SESSION["notice"]="تم اضافة مقال منحة";
		}
		
	}else
	if($_POST["act"] == "e")
	{
		if($_POST["gran"])
		{
			$statement = "UPDATE post SET 
				post_name = ?, post = ?
				WHERE post_id = ?";
			$data = array(
			$_POST["name"],$_POST["post"],
			$_POST["gran"]
		);
			$db->insert($statement,$data);
			uploadImages("grant",$_POST["gran"]);
			
			
			
			$_SESSION["notice"]="تم التعديل على المنحة بنجاح";
			
			
		}else $_SESSION["notice"] = "Error - Illegal operation.";
	}else $_SESSION["notice"] = "Error - Invalid data.";


$conn = new mysqli("localhost", "root", "", "yemenuniversities");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO activities (Event, date)
VALUES ('shcolarship added',CURDATE() )";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


	
	header("location:../../../cpan.php");
?>