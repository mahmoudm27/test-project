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
		$statement = "INSERT INTO `books` (`bks_id` ,`bks_name` ,`bks_describtion` ,`bks_url` ,`bks_specification` ,`bks_department` ,`bks_year` ,`bks_status`)
						VALUES (?,?,?,?,?,?,?,?)";
		$bk = uploadBook();
		$data = array(null,$bk,$_POST["describtion"],"books/$bk",$_POST["specification"],$_POST["department"],$_POST["year"],0);
		if($db->insert($statement,$data))
			$_SESSION["notice"]="تم إضافة كتاب بنجاح";
	}else
	if($_POST["act"] == "e")
	{
		if($_POST["bk"])
		{
			$statement = "UPDATE books SET bks_describtion = ?, bks_year = ?, bks_specification = ? WHERE bks_id = ?";
			$data = array($_POST["describtion"],$_POST["year"],$_POST["specification"],$_POST["bk"]);
			$db->insert($statement,$data);
			$_SESSION["notice"]="تم تعديل الكتاب بنجاح";
		}else $_SESSION["notice"] = "Error - Illegal operation.";
	}else $_SESSION["notice"] = "Error - Invalid data.";

$conn = new mysqli("localhost", "root", "", "yemenuniversities");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO activities (Event, date)
VALUES ('book added',CURDATE() )";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


	
	header("location:../../../cpan.php");
?>