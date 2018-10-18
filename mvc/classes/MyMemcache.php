<?php 
/**
 * memcache类
 */
class MyMemcache
{

	protected $MemObj;

	public function __construct($host='127.0.0.1',$port='11211')
	{
		$this->MemObj = new memcache();
		@$this->MemObj->connect($host,$port);
	}

	/**
	 * [set 添加memcache缓存]
	 * @param [type] $key      [description]
	 * @param [type] $value    [description]
	 * @param string $deadline [description]
	 */
	public function set($key,$value,$deadline='0')
	{
		$this->MemObj->set($key,$value,false,$deadline);
		return true;
	}


	/**
	 * [get 取memcache值]
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function get($key)
	{
		return $this->MemObj->get($key);
	}

	/**
	 * [delete 删除缓存]
	 * @param  [type] $key [description]
	 * @return [type]      [description]
	 */
	public function delete($key)
	{

		$this->MemObj->delete($key);
		return true;
	}

	/**
	 * [deleteAll 删除所有缓存]
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function deleteAll($value='')
	{
		$this->MemObj->flush();
		return true;
	}


	/**
	 * [getStats 获取服务器统计信息]
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function getStats($value='')
	{
		return	$this->MemObj->getStats();	
	}

	/**
	 * [close 关闭连接]
	 * @param  string $value [description]
	 * @return [type]        [description]
	 */
	public function close($value='')
	{
		$this->MemObj->close();
	}
}