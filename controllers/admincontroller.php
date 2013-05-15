<?php
require_once "classes/maincontroller.php";
require_once "classes/view.php";

class AdminController extends MainController
{
	public function __construct($action,$params)
	{
		parent::__construct($action,$params);
		require "models/adminmodel.php";
		$this->model = new AdminModel();
	}
	
	public function index()
	{
		if($this->isConnected())
		{
			$pageTitle = $this->model->index();
			$this->view = new View(get_class($this),$this->action);
			$this->view->show($pageTitle);
		}
		else
		{
			$this->action = "login";
			$this->login();
		}

	}
	public function edit()
	{
		$pageTitle = $this->model->edit();
		$this->view = new View(get_class($this),$this->action);
		$this->view->show($pageTitle);
	}
	
	public function isConnected()
	{
		if(isset($_SESSION["username"]) || isset($_COOKIE["username"]))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function login()
	{
		$pageTitle = "Authentification";
		$this->view = new View(get_class($this),$this->action);
		$this->view->show($pageTitle);
	}
	
	public function auth()
	{
		if($_POST)
		{
			$this->model->login($_POST["login"],$_POST["pass"],$_POST["cb"]);
		}
	}
}
?>