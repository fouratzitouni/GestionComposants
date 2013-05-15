<?php

class View
{
	protected $viewFile;
	
	public function __construct($controller,$action)
	{
		$controllerName = str_replace("Controller","",$controller);
		$this->viewFile = "views/".$controllerName."/".$action.".php";
	}
	
	public function show($pageTitle,$template = "maintemplate")
	{
		$templateFile = "views/".$template.".php";
		if(file_exists($this->viewFile))
		{
			if(file_exists($templateFile))
			{
				require $templateFile;
			}
			else
			{
				require "views/maintemplate.php"; // template not found error !!
			}
		}
		else
		{ // view not found error !!
		}
	}
}

?>