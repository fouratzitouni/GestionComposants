<?php
require_once "classes/dbmodel.php";

class AdminModel extends DbModel
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		return "Admin Home Page";
	}
	
	public function edit()
	{
		return "Modifier Admin";
	}
	
	public function login($login,$pass,$cb)
	{
		
		$this->c->connect();
		$query=mysql_query("select * from admin where login='$login' AND pwd='$pass'");
		$rows = mysql_num_rows($query);
		if($rows==1)
		{ 
			$_SESSION['username']=$login;
			if($cb)
			{
				setcookie('username',$login,time()+3600);
			}
			
		}
		header("location: /admin/index");
	}
	
}

?>