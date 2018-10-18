<?php 
/**
 * SESSION
 */
class Session
{
	public function __construct()
	{
		session_start();//开始session数据保存 
	}
	// 设置session
	public function add($key,$value)
	{
		$_SESSION[$key] =$value;
		return true;
	}
	// 获取session
	public function get($key)
	{
		return $_SESSION[$key];
	}
	// 删除指定session
	public function del($key)
	{
		unset($_SESSION[$key]);
		return true;
	}
	//遍历删除所有的session
	public function deleteAll()
	{
		session_destory();//删除所有的session  
		// 或者
		foreach($_SESSION as $key=>$val){
	    	unset($_SESSION[$key]);
		}
		return true;
	}
	// 修改session
	public function update($key,$value)
	{
		$_SESSION[$key] =$value;
		return true;
	}
}