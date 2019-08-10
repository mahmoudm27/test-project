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
			INSERT INTO `universities` 
				(`uni_id` ,`uni_name` ,`uni_describtion` ,`uni_pros` ,`uni_cons` ,`uni_contacts` ,`uni_certification` ,`uni_img`) 
			VALUES (?,?,?,?,?,?,?,?)";
		$data = array(
			null,$_POST["uniname"],$_POST["describtion"],$_POST["pros"],
			$_POST["cons"],$_POST["contacts"],$_POST["certification"],""
		);
		
		if($lastid = $db->insert($statement,$data))
		{
			uploadImages("universities",$lastid);
			foreach($_POST["departments"] as $depid)
				$db->insert("INSERT INTO unidep VALUES (?,?)",array($lastid,$depid));
			$_SESSION["notice"]="تم إضافة جامعة بنجاح";
		}
		
	}else
	if($_POST["act"] == "e")
	{
		if($_POST["uni"])
		{
			$statement = "UPDATE universities SET 
				uni_name = ?, uni_describtion = ?, uni_pros = ?, uni_cons = ?, uni_contacts = ?, uni_certification = ? 
				WHERE uni_id = ?";
			$data = array(
			$_POST["uniname"],$_POST["describtion"],$_POST["pros"],
			$_POST["cons"],$_POST["contacts"],$_POST["certification"],$_POST["uni"]
		    );
			$db->insert($statement,$data);
			uploadImages("universities",$_POST["uni"]);
			
			//delete current links to departments
			$db->insert("DELETE FROM unidep WHERE undp_university = ?",array($_POST["uni"]));
			//add new links to departments
			foreach($_POST["departments"] as $depid)
				$db->insert("INSERT INTO unidep VALUES (?,?)",array($_POST["uni"],$depid));
			
			$_SESSION["notice"]="تم التعديل على جامعة بنجاح";
			
			
		}else $_SESSION["notice"] = "Error - Illegal operation.";
	}else $_SESSION["notice"] = "Error - Invalid data.";

$conn = new mysqli("localhost", "root", "", "yemenuniversities");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO activities (Event, date)
VALUES ('university added',CURDATE() )";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



	
	header("location:../../../cpan.php");
?>