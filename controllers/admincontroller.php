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
		if($_POST)
		{
			$login = $_SESSION["username"];
			if($this->model->isPwdCorrect($login,$_POST["oldpassword"]))
			{
				$nom = $_POST["nom"];
				$pass = $_POST["oldpassword"];
				if($_POST["password"])
				{
					$pass = $_POST["password"];
				}
				$email = $_POST["email"];
				if($_POST["password"] == $_POST["verifpassword"])
				{
					if($this->model->editAdmin($_SESSION["username"],$nom,$pass,$email))
					{
						echo "admin modifie";
						header("location: http://localhost/GestionComposants/admin/index");
					}
					else
					{
						echo "erreur de connexion";
					}
				}
				else
				{
					 echo "verifier le mdp";
				}
			}
			else
			{
				echo "password incorrect";
			}
		}
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
		$pageTitle = "Authentification Administrateur";
		$this->view = new View(get_class($this),$this->action);
		$this->view->show($pageTitle,"adminlogintemplate");
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
		if(isset($_SESSION['username']))
		{
			session_destroy();
		}
		else if(isset($_COOKIE['username']))
		{
			setcookie('username',$_COOKIE['username'],time()-3600);
		}
		$this->action = "login";
		$this->login();
	}
	
	public function addrp()
	{
		if($_POST)
		{
			if($_POST["password"] == $_POST["password"])
			{
				$nom = $_POST["name"];
				$login = $_POST["login"];
				$mdp = $_POST["password"];
				$email = $_POST["mail"];
				if($this->model->addRP($nom,$login,$mdp,$email))
				{
					echo "rp ajoute";
					header("location: http://localhost/GestionComposants/admin/index");
				}
				else
				{
					echo "erreur de connexion";
				}
			}
			else
			{
				echo "erreur de saisie";
			}
		}
		else
		{
			$pageTitle = "Ajouter Responsable Projet";
			$this->view = new View(get_class($this),$this->action);
			$this->view->show($pageTitle);
		}
	}
	
	public function listrp()
	{
		$pageTitle = "Liste des Responsables projet";
		$this->view = new View(get_class($this),$this->action);
		$this->view->show($pageTitle);
	}
}
?>