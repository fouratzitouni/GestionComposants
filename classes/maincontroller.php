<?php
abstract class MainController
{
	protected $params;
	protected $action;
	protected $model;
	protected $view;
	
	public function __construct($action,$params)
	{
		$this->action = $action;
		$this->params = $params;
		
	}
	
	public function executeAction()
	{
		return $this->{$this->action}();
	}
	
}