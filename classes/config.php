<?php
/*Ce fichier a été généré automatiquement lors de l'installation */
class Config
{
	private $server = "localhost";
	private $db_login = "root";
	private $db_password = "root";
	private $db_name = "gestioncomposant";
	
	
	public function getServer()
	{
		return $this->server;
	}
	
	public function getLogin()
	{
		return $this->db_login;
	}
	
	public function getPass()
	{
		return $this->db_password;
	}
	
	public function getDb()
	{
		return $this->db_name;
	}
	
}
?>