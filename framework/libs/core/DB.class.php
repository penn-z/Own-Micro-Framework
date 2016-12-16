<?php
/**
 * 数据库工厂模式
 * @author penn
 * @email penn_z@aliyun.com
 * @date 2016-12-12
 */

/*-------------------------*/
/*
 目前只实现了MySQL的数据库类,日后须补充其他数据库的话,具体类写法流程参照Mysql类
*/
/*-------------------------*/
class DB {
	public static $db;	//存储数据库对象

	public function __construct() {

	}

	public static function init($dbtype,$config) {
		$grantfaher_dir = dirname(dirname(__FILE__));
		$dbtype = ucfirst(strtolower($dbtype));
		require_once $grantfaher_dir."/db/".$dbtype.'.class.php';
		self::$db = new $dbtype($config);	//实例化数据库类
		// return self::$db;
	}

	public static function getList($table, $where, $target = '*', $condition = '') {
		return self::$db->getList($table, $where, $target, $condition);
	}

	public static function getOneRow($table,$where,$target= '*') {
		return self::$db->getOneRow($table,$where,$target);
	}

	public static function insertData($table,&$data) {
		return self::$db->insertData($table,$data);
	}

	public static function updateData($table,&$data,$where) {
		return self::$db->updateData($table,$data,$where);
	}

	public static function deleteData($table,$where) {
		return self::$db->deleteData($table,$where);
	}

	public static function counts($table,$where = null) {
		return self::$db->counts($table,$where);
	}

	public function __destruct() {
		
	}
}