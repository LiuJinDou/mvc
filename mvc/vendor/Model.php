<?php 
/**
 * 
 */
class Model  extends SQL
{
	// public static $_config;
	// public static $res;
	// function __construct()
	// {
	// 	// 方式一
	// 	self::$res = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
	// 	@mysql_select_db(DB_NAME);

	// 	// 方式二
	// 	self::$res = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8;',DB_USER,DB_PASSWORD);
	// 	// var_dump(self::$res);die;
	// }

	

	// 添加数据
	public function insertRecord($sql)
	{

		$res = $this->insert($sql);
		return $res;

		// if(is_string($sql)){
		// 	$res = self::$res->exec($sql);
		// 	return true;
		// }else{
		// 	return false;
		// }
	}

	// 删除数据
	public function deleteRecord($where)
	{
		$res = $this->delete($where);
		return $res;
	}
	// 修改所有数据
	public function updateRecord($arr,$where)
	{
		$res = $this->update($arr,$where);
		return $res;
	}
	// 查询所有数据
	public function selectRecord()
	{
		$res = $this->select();
		return $res;
	}
	// 查询一条记录
	public function findRecord($where)
	{
		$res = $this->find($where);
		return $res;
	}
	// 查询所有数据
	public function queryAll($sql)
	{
		// 方式一
		// $res = mysql_query($sql);
		// $res = mysql_fetch_array($res);
		// if(is_string($sql)){
		// 	$res = self::$res->query($sql)->fetchAll();
		// 	return $res;
		// }else{
		// 	return false;
		// }
		
	}



}