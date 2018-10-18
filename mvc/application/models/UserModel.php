<?php 
/**
 * 
 */
class UserModel extends Model
{
	public $_table = 'test';

	
	// 添加数据
	public function addUser($arr)
	{
		return $this->insertRecord($arr);
	}
	// 删除数据
	public function updateUser($where)
	{
		return $this->updateRecord($arr,$where);
	}
	// 修改数据
	public function deleteUser($where)
	{
		return $this->deleteRecord($where);
	}
	// 获取数据
	public function getUserInfo()
	{
		return $this->selectRecord();
	}
	// 获取数据
	public function getOneInfo($where)
	{
		return $this->findRecord($where);
	}

	
}