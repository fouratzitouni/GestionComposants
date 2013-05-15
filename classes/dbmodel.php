<?php
require_once "config.php";

abstract class DbModel
{
	private $db;
	
	public function __construct()
	{
		$this->db = new Config();
	}
	
	public function connect()
	{
		$l = mysql_connect($this->db->getServer(),$this->db->getLogin(),$this->db->getPass());
		mysql_select_db($this->db->getDb());
	}
	
	public function disconnect()
	{
		mysql_close();
	}

}
?>