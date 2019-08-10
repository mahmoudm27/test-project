<?php
	//session_start();
	//error_reporting(4);
	
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	
	function uploadImages($fold,$id)
	{
	  
	  $folder = "../../../images/$fold/$id/";
	  if (file_exists($folder) == false) {mkdir($folder,0777, true);}
	
	  $x=0;
      
		$theFile = $_FILES["images"];
		
		
		for($i=1; $i<sizeof($theFile["name"]); $i++)
		{
			//if(isAllowed())
			//{
			if ($theFile["error"][$i] > 0){$error1 =$theFile["error"][$i];}
			else			
			{
				if(file_exists($folder . $theFile["name"][$i])) ;
				else
				{
					move_uploaded_file(
					  $theFile["tmp_name"][$i],
                      $folder . $theFile["name"][$i]
					);
					// echo "success<>";
					$good[$x] = $folder.$theFile["name"][$i];		
					$x++;			
				}
			}
			//}else echo "File format not allowed.";
		}
	  
	  return $good;
	}
	
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	
	function uploadBook()
	{
	  // = "../../ud/".$_SESSION['uid']."/".$itmId."/";
	  $folder = "../../../books/";
	  if (file_exists($folder) == false) {mkdir($folder,0777, true);}

	  $theFile = $_FILES["books"];
	  {
			//if(isAllowed())
			//{
			  if ($theFile["error"] > 0){return $theFile["error"];}
			  else			
			  {
				if(file_exists($folder . $theFile["name"])){return $theFile["name"];} 
				else
				{
					move_uploaded_file(
					  $theFile["tmp_name"],
                      $folder . $theFile["name"]
					);
					
					//echo "success";
					return $theFile["name"];					
				}
			  }
			//}else echo "File format not allowed.";
	  }
	  return 0;
	}
	
	
	
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	#######################################################################################################
	
	function getImages($dir)
	{
		return scandir($dir);
	}
	
	#######################################################################################################	
	
	function isAllowed($file)
	{
		$file = explode(".", $file['name']);
		//if($file[end($file)])....
		
		return true;
	}
	
	#######################################################################################################	
	
	
	function moveFile($from,$to)
	{
		move_uploaded_file($from,$to);
	}