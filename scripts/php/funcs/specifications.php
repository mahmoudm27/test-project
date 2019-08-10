<?php
	session_start();
	if(!$_SESSION["ulogged"])
	{
		$_SESSION["notice"] = "انت تحتاج لتسجيل الدخول لفعل هذه العلمية";
		header("location:../../../login.php");
	}
	require_once("../ctrl/filectrl.php");
	require_once("../ctrl/dbctrl.php");
	$db = new dbctrl();
	
	if($_POST["act"] == "a")
	{
		$statement = "INSERT INTO `specifications` (`spc_id` ,`spc_name` ,`spc_describtion` ,`spc_bestuni` ,`spc_aftergrad`)
			VALUES (?,?,?,?,?)";
		$data = array(null,$_POST["name"],$_POST["describtion"],$_POST["bestuni"],$_POST["aftergrad"]);

		if($lastid = $db->insert($statement,$data))
		{
			//echo "ID:".$lastid;
			//uploadImages("specifications",$lastid);
			//print_r($_POST);
			foreach($_POST["departments"] as $spcid){
				//echo $lastid." -- ".$spcid;
				$db->insert("INSERT INTO depspc VALUES (?,?)",array($spcid,$lastid));
			}
			$_SESSION["notice"]="تم إضافة التخصص بنجاح";
		}
		
	}else
	if($_POST["act"] == "e")
	{
		if($_POST["spc"])
		{
			$statement = "UPDATE specifications SET spc_name = ?, spc_describtion = ?, spc_bestuni = ?, spc_aftergrad = ? 
				WHERE spc_id = ?";
			$data = array($_POST["name"],$_POST["describtion"],$_POST["bestuni"],$_POST["aftergrad"],$_POST["spc"]);
			$db->insert($statement,$data);
			//uploadImages("specifications",$_POST["spc"]);

			//delete current links to departments
			$db->insert("DELETE FROM depspc WHERE dpsp_specification = ?",array($_POST["spc"]));
			//add new links to departments
			foreach($_POST["departments"] as $spcid){
				$db->insert("INSERT INTO depspc VALUES (?,?)",array($spcid,$lastid));
			}
			$_SESSION["notice"]="تم تعديل التخصص بنجاح";
			
		}else $_SESSION["notice"] = "Error - Illegal operation.";
	}else $_SESSION["notice"] = "Error - Invalid data.";


$conn = new mysqli("localhost", "root", "", "yemenuniversities");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO activities (Event, date)
VALUES ('specification added',CURDATE() )";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


	
	header("location:../../../cpan.php");
?>