<?php
/**
 * 数据库操作类
 * @author penn
 * @email penn_z@aliyun.com
 * @date 2016-12-12
 */
interface Idb {
	public function insertData($_table,&$_data);
	public function deleteData($_table,$_where);
	public function updateData($_table,&$_data,$_where);
	public function getOneRow($_table,$_where);
	public function getList($_table,$_where);
	public function counts($_table,$_where);
}

/**
 * 数据库类
 */
class Mysql implements Idb {
	private $_host = null;	//定义一个变量存储相关登录信息
	private $_link = null;	//登录句柄
	private $_debug = false;	//打印sql语句开关
	/**
	 * 构造方法，赋值登录信息
	 * @param array $host array($host,$username,$password,$dbname,$port,$charset)
	 * @return void
	 */
	public function __construct($host) {
		$this->_host = $host;
	}

	/**
	 * 连接数据库,内部私有化
	 *
	 */
	private function connect() {
		extract($this->_host);	//把登录信息数组还原为变量
		//连接数据库,失败则弹出错误提示
		if(!@$this->_link = mysqli_connect( $host,$username,$password,$dbname,$port )) die("Connect Error:".mysqli_connect_error());
		if(!@mysqli_query($this->_link,"set names $charset")) die("Error:".mysqli_error($this->_link));	//设定字符编码格式*/
	}

	/**
	 * 打印sql语句开关
	 * @param boolean $bool
	 * @return void
	 */
	public function setDebug($bool) {
		$this->_debug = $bool;
	}

	/**
	 * 执行Sql语句,私有化内部使用
	 * @param $sql sql语句
	 * @return void
	 */
	private function query($sql) {
		if($this->_link == null) $this->connect();	//首先先登录数据库
		if( $this->_debug == true ) echo "Query:".$sql."<br/>";	//如果debug开关打开,则打印sql语句
		if(!($query = mysqli_query($this->_link,$sql)) ) die("Query:'$sql' is wrong AND Error : ".mysqli_error($this->_link));
		else return $query;
	}

	/**
	 * 添加数据
	 * @param string $_table 数据表
	 * @param array $_data 数据数组
	 * @return boolean fasle | int 新添数据id
	 */
	public function insertData($_table, &$_data) {
		//INSERT INTO table(col_name1,col_name2...) VALUES('val1','val2'...)

		// sql语句拼接方法一
		/*$fields = null;
		$values = null;
		foreach( $_data as $key => $val ){
			if( $fields == null ) $fields = $key;	//第一个键名
			else $fields .= ",$key";	//非第一个键名

			if( $values == null ) $values = "'".$val."'";	//第一个值
			else $values .= ",'".$val."'";	//非第一个值
		}*/

		//sql语句拼接方法二
		$fields = implode(',',array_keys($_data));	//获取字段名
		$values = "'".implode("','",array_values($_data))."'";	//获取值
		$sql = "INSERT INTO $_table(".$fields.") VALUES(".$values.")";
		$result = $this->query($sql);
		if( $result == false ) return false;	//数据插入失败，返回false
		return mysqli_insert_id($this->_link);	//返回数据成功插入后的id
	}

	/**
	 * Delete Data
	 * @param string $_table table_name
	 * @param string $_where condition
	 * @return void
	 */
	public function deleteData($_table, $_where) {
		// DELETE FROM table WHERE condition
		$sql = "DELETE FROM $_table WHERE $_where";
		$result = $this->query($sql);
		return $result != false ? mysqli_affected_rows($this->_link) : false;
	}

	/**
	 * Update Data
	 * @param string $_table table_name
	 * @param string $_data will be update data
	 * @param string $_where update condition
	 * @return boolean false | int affected_rows
	 */
	public function updateData($_table, &$_data, $_where) {
		//UPDATE tbl_name SET col_name1 = value1,col_name2 = value2...

		// sql与语句拼接方法一
		$fields = ' ';
		foreach( $_data as $key => $val ){
			if( $fields == ' ' ) $fields = $key."='$val'";
			else $fields .= ",".$key."='$val'";
		}
		$sql = "UPDATE $_table SET ".$fields." WHERE $_where";

		// sql语句拼接方法二
		/*$sets = array();
		foreach( $_data as $key => $value ){
			 array_push($sets, $key."='".$value."'");
		}
		$sql = "UPDATE $_table SET " . implode(',', $sets) . " WHERE $_where";*/
		
		$result = $this->query($sql);
		if( $result == false ) return false;
		return mysqli_affected_rows($this->_link);	//return the affected rows
	}

	/**
	 * get one row data 
	 * @param string $_table table_name
	 * @param string $_target column_name
	 * @param string $_where condition
	 * @return array $row data_array
	 */
	public function getOneRow($_table, $_where, $_target = '*') {
		// SELECT * FROM table WHERE condition
		$sql = "SELECT $_target FROM $_table WHERE $_where";
		$result = $this->query($sql);
		$row = mysqli_fetch_assoc($result);
		if($row == null) return false;
		return $row;
	}

	/**
	 * 获取数据列表
	 * @param string $_table table_name
	 * @param string $_target column_name
	 * @param string $_where condition
	 * @return array $rows data_array
	 */
	public function getList($_table, $_where, $_target = '*') {
		//SELECT * FROM table WHERE 1 = 1
		$sql = "SELECT $_target FROM $_table WHERE $_where";
		$result = $this->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		if(empty($rows)) return false;
		return $rows;
	}

	/**
	 * count the rows
	 * @param $_table table_name
	 * @param $_where condition
	 * @return boolean fasle | int $num
	 */
	public function counts($_table, $_where = null) {
		// SELECT count(0)  FROM table WHERE condition
		$sql = "SELECT count(0) FROM $_table";
		if($_where != null) $sql .= " WHERE $_where";
		$result = $this->query($sql);
		if($result){
			$row = mysqli_fetch_row($result);
			return $row[0];
		}
		return false;
	}

	/**
	 * close Mysql
	 */
	public function __destruct() {
		if( $this->_link != null ) mysqli_close($this->_link);
		$this->_link = null;
	}
}


/*	 以下为测试数据库	*/
/*$host = array(
	'host' 	   => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'dbname'   => 'study_mvc',
	'port'     => 3306,
	'charset'  => 'utf8' 
	);
$Mysql = new Mysql($host);*/

/* 测试查询数据记录 */
/*$rows = $Mysql->getOneRow('article','1=1');
print_r($rows);*/

/*测试插入数据*/
/*$data = array(
	'title' => '再来测试一次',
	'author' => 'penn',
	'description' => '乱七八糟的描述',
	'content' => '真的是乱乱的',
	'dateline' => time()
	);
echo $Mysql->insertData('article',$data);*/

/*测试更新数据*/
/*$data = array(
	'title' => '更新文章测试',
	'description' => '内容更新测试',
	'dateline' => time()
	);
$Mysql->setDebug(true);
echo $Mysql->updateData('article',$data,"author='penn'");*/

/* 删除数据测试 */
/*$Mysql->setDebug(true);
echo $Mysql->deleteData('article','id = 13');*/

/* 测试获取记录条数 */
/*$Mysql->setDebug(true);
echo $Mysql->counts('article',"author = 'penn'");*/

