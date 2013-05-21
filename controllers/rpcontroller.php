<?php
require_once "classes/maincontroller.php";
require_once "classes/view.php";

class RpController extends MainController
{
	public function __construct($action,$params)
	{
		parent::__construct($action,$params);
		require "models/rpmodel.php";
		$this->model = new RpModel();
	}
	
	public function index()
	{
		if($this->isConnected())
		{
			$pageTitle = "Acceuil du Responsable Projet";
			$this->view = new View(get_class($this),$this->action);
			$this->view->show($pageTitle);
		}
		else
		{
			$this->action = "login";
			$this->login();
		}
	}
	
	public function login()
	{
		$pageTitle = "Authentification Responsable Projet";
		$this->view = new View(get_class($this),$this->action);
		$this->view->show($pageTitle);
	}
	
	public function isConnected()
	{
		if(isset($_SESSION["rpusername"]) || isset($_COOKIE["rpusername"]))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function auth()
	{
		if($_POST)
		{
			$cb = false;
			if(isset($_POST["checkbox"]))
			{
				$cb = true;
			}
			
			if($this->model->login($_POST["login"],$_POST["pass"],$cb))
			{
				$this->action = "index";
				$this->index();
			}
			else
			{
				$this->action = "login";
				$this->login();
				echo "login failed";
			}
		}
		else
		{
			$this->action = "index";
			$this->index();
		}
	}
	
	public function disconnect()
	{
		if(isset($_SESSION['rpusername']))
		{
			session_destroy();
		}
		else if(isset($_COOKIE['rpusername']))
		{
			setcookie('rpusername',$_COOKIE['rpusername'],time()-3600);
		}
		$this->action = "index";
		$this->index();
	}
}
?>