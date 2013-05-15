<?php
require_once "classes/maincontroller.php";
require_once "classes/view.php";
class HomeController extends MainController
{
	public function __construct($action,$params)
	{
		parent::__construct($action,$params);
		require "models/homemodel.php";
		$this->model = new HomeModel();
	}
	
	public function index()
	{
		$title = $this->model->index();
		$this->view = new View(get_class($this),$this->action);
		$this->view->show($title);
	}
}
?>