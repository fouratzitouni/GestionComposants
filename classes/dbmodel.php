<?php
require_once "config.php";

abstract class DbModel
{
	protected $c;
	
	public function __construct()
	{
		$c = new Config();
	}

}
?>