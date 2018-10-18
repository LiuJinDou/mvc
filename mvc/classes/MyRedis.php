<?php 
/**
 * Redis
 */
class MyRedis
{
	protected $RedisObj;

	public function __construct($host='127.0.0.1',$port='11211'){

		$this->RedisObj = new Redis();
		
		$this->RedisObj->connect($host,$port);
	}
	// 设置reids
	public function set($key,$value)
	{
		$this->RedisObj->set($key,$value);
		return true;
	}
	// 获取reids
	public function get($key)
	{
		return $this->RedisObj->get($key);
	}
	// 删除指定reids
	public function del($key)
	{
		$this->RedisObj->delete($key);
		return true;
	}
	// 修改reids
	public function update($key,$value)
	{
		$this->RedisObj->set($key,$value);
		return true;
	}
}