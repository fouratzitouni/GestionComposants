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

}
?>