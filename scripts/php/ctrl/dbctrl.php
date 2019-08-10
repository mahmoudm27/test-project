<?php

class dbctrl
{
	
	
	 function __construct($db=null)
	 {
		 $this->dbname = $db;
		 if(empty($db))
		 {
			 $this->dbname = "yemenuniversities";
		 }
	 }	   
	 
	protected function dbaddr(){return "127.0.0.1";}
	protected function dbuser(){return "root";}
	protected function dbpass(){return "";}
	private $dbname = "";
	
	private $db;
	
	protected function connect()
	{
		try{
			 $db =  new PDO('mysql:host='.$this->dbaddr().';dbname='.$this->dbname.';charset=utf8mb4',
					$this->dbuser(), $this->dbpass());
					return $db;
		}catch(PDOException $ex){echo "Error_con: ".$ex->getMessage(); return false;}
		
	}
	
	
	
	public function selectid($statement,$data)
	{
	
	  if($db = $this->connect())
	  {
		try 
		{
			$stm = $db->prepare($statement);
			$stm->execute($data);			
			//print_r($stm->errorinfo())."<br>\n";
			return $stm->fetchAll(PDO::FETCH_ASSOC);
			
		} catch(PDOException $ex) 
		{
			echo "An Error occured!"; //user friendly message
			echo $ex->getMessage();
		}
	  }
	}
	
	public function select($statement)
	{
	  if($db = $this->connect())
	  {
		try 
		{
			$results = $db->query($statement);
			return $results->fetchAll(PDO::FETCH_ASSOC);
			
		} catch(PDOException $ex) 
		{
			echo "An Error occured!"; //user friendly message
			echo $ex->getMessage();
		}
	  }
	}
	
	
	public function insert($statement,$data)
	{
	  if($db = $this->connect())
	  {
		try 
		{
			$stmnt = $db->prepare($statement);
			$stmnt->execute($data);
			//print_r($stmnt->errorinfo())."<br>\n";
			return $db->lastInsertId();
			
		} catch(PDOException $ex) 
		{
			echo "An Error occured!"; //user friendly message
			echo $ex->getMessage();
		}
	  }
	}
	
}




?>