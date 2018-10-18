<?php 
/**
 * 
 */
class Controller 
{
	private $className;
	private $actionName;
	public $view;
	function __construct($className,$actionName)
	{

		$this->className = $className;
		$this->actionName = $actionName;
		
		$this->view = new View($className,$actionName);
		// var_dump($this->view);die;
	}

	
}