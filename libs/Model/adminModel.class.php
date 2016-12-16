<?php
/**
 * 从数据库取用户信息
 */
class adminModel {
	//定义表名
	public $_table = 'admin';

	/**
	 * 通过用户名获取用户信息
	 * @param string $username username
	 * @return mix
	 */
	function findUserInfo($username) {
		$where = "username = '$username'";
		return DB::getOneRow($this->_table, $where);
	}
}