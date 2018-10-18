<?php 
/**
 * COOKIE
 */
class Cookie
{
	// 设置cookie
	public function add($key,$value)
	{
		setcookie($key,$value);
		return true;
	}
	// 获取cookie
	public function get($key)
	{
		return $_COOKIE[$key];
	}
	// 删除指定cookie
	public function del($key)
	{
		setcookie($key,"",time()-10);
	}
	//遍历删除所有的cookie
	public function deleteAll()
	{
		foreach($_COOKIE as $key=>$val){
	    	setcookie($key,"",time()-10);
		}
		return true;
	}
	// 修改cookie
	public function update($key,$value)
	{
		setcookie($key,$value,time()+30);
		return true;
	}
}