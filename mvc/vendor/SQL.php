<?php 
/**
 * 
 */
class SQL
{
	public static $_config;
	public static $res;
	function __construct()
	{
		self::$res = @mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
		@mysql_select_db(DB_NAME);
	}

	// 处理sql数据
	public function handleSql($arr,$type)
	{
		$sql = '';

		foreach ($arr as $key => $value) {
			if(is_numeric($value)){
				$sql .= " $key=$value $type "; 
			}else{
				$sql .= " $key='$value' $type "; 
			}
		}

		$sql = trim($sql,"' '|$type");

		return $sql;
	}

	// SQL添加
	public function insert($arr)
	{
		$type = ",";

		$handleSql = $this->handleSql($arr,$type);
	
		$realSql = "INSERT INTO {$this->_table} SET {$handleSql}";
		return $this->query($realSql);
	}

	// SQL删除
	public function delete($deleteWhere)
	{
		$deleteWhere = $this->handleSql($deleteWhere,'AND');

		$realSql = "DELETE FROM  {$this->_table}  WHERE {$deleteWhere}";

		return $this->query($realSql);
	}

	// SQL修改	
	public function update($updateValue,$updateWhere)
	{

		$updateValue = $this->handleSql($updateValue,',');

		$updateWhere = $this->handleSql($updateWhere,'AND');
	
		$realSql = "UPDATE  {$this->_table} SET {$updateValue} WHERE {$updateWhere}";

		return $this->query($realSql);
	}

	// SQL查询所有
	public function select()
	{
		$realSql = "SELECT * FROM  {$this->_table} ";

		return $this->query($realSql);
	}
	// 查询一条
	public function find($where)
	{
		$findWhere = $this->handleSql($where,'AND');
		$realSql = "SELECT * FROM  {$this->_table} WHERE {$findWhere}";

		return $this->query($realSql);
	}

	// 执行sql语句、返回结果
	public function query($sql)
	{
		$this->writeLog($sql);
		// echo $sql;die;		
		if(strpos($sql,'SELECT') !==false | strpos($sql,'select') !==false){
			return mysql_fetch_array(mysql_query($sql));
		}else{
		     return mysql_query($sql);
		}
	}

	//日志记录
	public function writeLog($data)
	{
		$dirName = APP_PATH.'runtime/log/'.date('Ym');
		is_dir($dirName) OR mkdir($dirName, 0777, true); // 如果文件夹不存在，将以递归方式创建该文件夹
		$time = date('Y-m-d H:i:s');
		$content = "[ ".$time." ]\n";
		!is_array($data) OR $data = json_encode($data);
		$content .= "[\n data : ".$data."\n]";
		$content .= "\n".'=========================================='."\n";
		file_put_contents($dirName.'/log.log',$content, FILE_APPEND);
	}

}