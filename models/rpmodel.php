<?php
require_once "classes/dbmodel.php";

class RpModel extends DbModel
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function login($login,$pass,$cb)
	{
		
		$this->connect();
		$query=mysql_query("select * from responsableprojet where login='$login' AND pwd='$pass'");
		$rows = mysql_num_rows($query);
		if($rows==1)
		{ 
			$_SESSION['rpusername']=$login;
			if($cb)
			{
				setcookie('rpusername',$login,time()+3600);
			}
			return true;
			
		}
		else
		{
			return false;
		}
		$this->disconnect();
	}

	public function getId($login)
	{
		$this->connect();
		$query=mysql_query("select id from responsableprojet where login='$login';");
		$l = mysql_fetch_array($query);
		if($l)
		{
			return $l["id"];
		}
		else
		{
			return 0;
		}
		$this->disconnect();
	}
	
	public function insertCL($type,$nature,$licence,$cout,$rp,$version)
	{
		$this->connect();
		$query=mysql_query("INSERT INTO composantlogiciel VALUES (default,'$type','$nature','$licence','$cout','$rp','$version')");
		if(!mysql_error())
		{
			return true;
		}
		else
		{
			return false;
		}
		$this->disconnect();
	}
	
	public function insertPL($type,$nature,$licence,$cout,$rp,$version,$client,$titre,$etat)
	{
		$this->connect();
		$query=mysql_query("INSERT INTO produitlogiciel VALUES  (default,'$titre','$type','$nature','$client',$cout,'$licence','Termine',$rp,default,$version);") or die(mysql_error());
		if(!mysql_error())
		{
			return true;
		}
		else
		{
			return false;
		}
		$this->disconnect();
	}
}
?>