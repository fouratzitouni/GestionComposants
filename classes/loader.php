<?php
class Loader
{
	private $controller;
	private $action;
	private $params;
	
	public function __construct($params)
	{
		$this->params = $params;
		if($this->params["controller"] == "")
		{
			$this->controller = "home";
		}
		else
		{
			$this->controller = strtolower($this->params["controller"]);
		}
		if($this->params["action"] == "")
		{
			$this->action = "index";
		}
		else
		{
			$this->action = $this->params["action"];
		}
	}
	
	public function createController()
	{
		if(file_exists("controllers/".$this->controller."controller.php"))
		{
			require "controllers/".$this->controller."controller.php";
			if(in_array("MainController",class_parents($this->controller."Controller")))
			{
				$controllerClass = $this->controller."Controller";
				return new $controllerClass($this->action,$this->params);
			}
			else
			{
				die("Controller Error");
			}
		}
		else
		{
			die("404 Not found !!!");
		}
	}
}
?>