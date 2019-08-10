<?php 

error_reporting(4);	

	/*function authorized($power)
	{

		if( $_SESSION['utype'] >= $power || $power == 0)
		{
			return true;
		}else 
		{
			$_SESSION['err1']="You don't have sufficient privilage to access this.";
			return false;
		}

	}
*/	
	
	
	
	
	function activeCheck()
	{
	 if(!$_SESSION['uremember'])
	 {
	  if(isset($_SESSION['expire']))
	  {
		if($_SESSION['expire'] < time())
		{
			logout();
  			header('Location: ../../index.php');
		}
		else $_SESSION['expire']=(time()+3600);
	  }
	 }
#	  else echo "NO SESSION";
	}

	
	function loggedin($data)
	{		
		$_SESSION['ulogged'] = true;
		$_SESSION['uid'] 	= $data['usr_id'];
		$_SESSION['uuser']  = $data['usr_username'];
		$_SESSION['uname']  = $data['usr_name'];
		
		$_SESSION['ulogtime'] = time();
		$_SESSION['uexpire'] = (time()+3600);
#		$_SESSION[''] = '';
	}
	
	
	function logout()
	{
		session_unset();
		session_destroy();		
	}



 














?>