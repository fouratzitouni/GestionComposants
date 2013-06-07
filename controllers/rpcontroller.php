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
		$this->view->show($pageTitle,"rplogintemplate");
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
	
	public function ajoutcl()
	{
		if(!$_POST)
		{
			$pageTitle = "Ajouter un Composant logiciel";
			$this->view = new View(get_class($this),$this->action);
			$this->view->show($pageTitle);
		}
		else
		{
			$type = $_POST["type"];
			$nature = $_POST["nature"];
			$licence = $_POST["licence"];
			$cout = $_POST["cout"];
			$version = $_POST["version"];
			$rp = $this->model->getId($_SESSION['rpusername']);
			
			if($this->model->insertCL($type,$nature,$licence,$cout,$rp,$version))
			{
				$this->action = "index";
				$this->index();
			}
			
		}
	}
	
	public function ajoutpl()
	{
		if(!$_POST)
		{
			$pageTitle = "Ajouter un Produit logiciel";
			$this->view = new View(get_class($this),$this->action);
			$this->view->show($pageTitle);
		}
		else
		{
			$type = $_POST["type"];
			$nature = $_POST["nature"];
			$licence = $_POST["licence"];
			$cout = $_POST["cout"];
			$version = $_POST["version"];
			$rp = $this->model->getId($_SESSION['rpusername']);
			$client = $_POST["client"];
			$titre = $_POST["titre"];
			$etat = $_POST["etat"];
			
			if($this->model->insertPL($type,$nature,$licence,$cout,$rp,$version,$client,$titre,$etat))
			{
				$this->action = "index";
				$this->index();
			}
			
		}
	}
	
	public function getMyPL($id)
	{
	}
}
?>