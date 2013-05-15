<?php
require_once "classes/maincontroller";
require_once "classes/view.php";

class InstallController
{
	public function __construct($action,$params)
	{
		parent::__construct($action,$params);
		require "models/installmodel.php";
		$this->model = new InstallModel();
	}
	
	public function index()
	{
	}
}
?>