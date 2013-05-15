<?php
/*Ce fichier a été généré automatiquement lors de l'installation */
class Config
{
	private $server = "localhost";
	private $db_login = "root";
	private $db_password = "root";
	private $db_name = "gestioncomposant";
	
	public function connect()
	{
		$l = mysql_connect($this->server,$this->db_login,$this->db_password);
		mysql_select_db($this->db_name);
	}
	
	public function disconnect()
	{
		mysql_close();
	}
	
}
?>