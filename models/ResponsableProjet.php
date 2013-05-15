<?php
require_once "config.php";
class ResponsableProjet
{
	private $id;
	private $nom;
	private $login;
	private $pwd;
	private $email;
	
	function __construct($id)
	{
		$this->id = $id;
	}
	
	function updateRP($id,$n,$l,$p,$e)
	{
		$con = mysql_connect("localhost","root","root"); // $server $db_login $db_password
		mysql_select_db("gl",$con); // $db_name
		mysql_query("UPDATE rp SET nom = '$n', login = '$l', pwd = '$p', email = '$e' WHERE id = '$id';") or die(mysql_error());
		mysql_close();
	}
	
	function deleteFromBase()
	{
		$con = mysql_connect("localhost","root","root"); // $server $db_login $db_password
		mysql_select_db("gl",$con); // $db_name
		mysql_query("DELETE FROM rp WHERE id = '$this->id';") or die(mysql_error());
		mysql_close();
	}
	
	function __get($attr)
	{
	}
	
	function __set($attr,$val)
	{
	}
}