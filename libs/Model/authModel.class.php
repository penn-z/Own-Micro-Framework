<?php
class authModel {
	private $auth = null;	//当前管理员的信息

	/**
	 * 获取登录信息
	 * @return boolean
	 */
	public function loginSubmit() {
		if( empty($_POST['username']) || empty($_POST['password']) ) {	//账户或密码为空时
			return false;
		}
		$username = addslashes($_POST['username']);
		$password = addslashes($_POST['password']);
		if( $this->auth = $this->checkUser($username, $password) ) {
			$_SESSION['account'] = $this->auth['username'];	//用户名
			$_SESSION['accountId'] = $this->auth['id'];	//用户id
			$_SESSION['is_login'] = 1;	//把登录成功的状态标记为1
			return true;
		} else {
			return false;
		}
	}

	/**
	 * 验证登录信息
	 * @param string $username username
	 * @param string $password password
	 * @return mix boolean false 密码错误 | int 0 用户不存在 | array $info 用户信息
	 */
	private function checkUser($username, $password) {
		$adminObj = M('admin');	//实例化admin模型
		$info = $adminObj->findUserInfo($username);	//调用admin对象方法

		if(empty($info)) {
			return 0;	//0为不存在该用户
		}
		if( $info['password'] == md5($password) ) {
			return $info;	//返回用户信息
		} else {
			return false;	//密码错误
		}
	}

	/**
	 * 退出登录
	 * @return void
	 */
	public function logout() {
		$_SESSION = array();	//清楚session中登录信息
		$this->auth = null;	//清除登录信息
	}
}