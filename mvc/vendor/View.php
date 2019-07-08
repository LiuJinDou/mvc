<?php 
/**
 * 视图基层
 */
class View
{
	public $_config;
	private $className;
	private $actionName;
	function __construct($className,$actionName)
	{
		$this->className = $className;
		$this->actionName = $actionName;
	}

	public function assign($key,$value)
	{
		$this->_config[$key] = $value;
		// echo 'This is assign';
		
	}

	public function display($filename=null)
	{
		!empty($this->_config)?extract($this->_config):'';
		$filename = empty($filename)?$this->actionName:$filename;
		require  APP_PATH."application/views/{$this->className}/{$filename}";
		// require APP_PATH.;
		// echo 'This is display';
	}
}