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
		
		$this->connect();
		$query=mysql_query("select * from admin where login='$login' AND pwd='$pass'");
		$rows = mysql_num_rows($query);
		if($rows==1)
		{ 
			$_SESSION['username']=$login;
			if($cb)
			{
				setcookie('username',$login,time()+3600);
			}
			return true;
			
		}
		else
		{
			return false;
		}
		$this->disconnect();
	}
	
	public function isPwdCorrect($login,$pass)
	{
		$this->connect();
		$query=mysql_query("select * from admin where login='$login' AND pwd='$pass'");
		$rows = mysql_num_rows($query);
		if($rows==1)
		{ 
			return true;
			
		}
		else
		{
			return false;
		}
		$this->disconnect();
	}
	
	public function editAdmin($login,$nom,$mdp,$email)
	{
		$this->connect();
		$q=mysql_query("UPDATE admin SET pwd = '$mdp', nom = '$nom', email = '$email' WHERE login = '$login' ;");
		return($q);
	}
	
	public function addRP($nom,$login,$mdp,$email)
	{
		$this->connect();
		$q=mysql_query("INSERT INTO responsableprojet VALUES(default,'$nom','$login','$mdp','$email');");
		return($q);
	}
	
}

?>