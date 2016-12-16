<?php
class adminController {
	private $auth = null;	//save the information after login-success

	public function __construct() {
		//判断当前是否已经登录-->auth 模型处理
		// 若无登录，无法进行操作，则跳转到登录页进行登录
		if(!isset($_SESSION['is_login']) && Engine::$method != 'login' ) {
			$this->showMessage("未登录，登录后再操作...","index.php?controller=admin&method=login");
			exit();
		}
	}

	/**
	 * the page after successful-login
	 * @function show the page
	 */
	public function index() {
		$newObj = M('news');
		$newsnum = $newObj->counts();	//获取新闻数量
		VIEW::assign( array('newsnum' => $newsnum) );
		VIEW::display('admin/index.html');
	}

	/**
	 * login
	 * @return void
	 */
	public function login() {
		if(isset($_POST['submit'])) {	//提交登录按钮时
			//进行登录处理
			//admin模型：从数据库取用户信息
			//auth模型：进行用户信息的核对
			$this->checkLogin();
		} else {	//进入登录页面时
			$_SESSION = array();	//进入登录页面即清除登录信息
			VIEW::display('admin/login.html');
		}
	}

	/**
	 * logout
	 * @return void
	 */
	public function logOut() {
		$authObj = M('auth');
		$authObj->logOut();
		$this->showMessage('成功退出登录！','index.php?controller=admin&method=login');
	}

	/**
	 * check login
	 * @return void
	 */
	public function checkLogin() {
		$authObj = M('auth');	//实例化auth模型
		if($authObj->loginSubmit()) {
			$this->showMessage("登录成功！","index.php?controller=admin&method=index");
		} else {
			$this->showMessage("登录失败 !","index.php?controller=admin&method=login");
		}
	}

	/**
	 * 添加、修改新闻
	 * @return void
	 */
	public function newsadd() {
		//判断是否为post过来的数据
		if(empty($_POST)) {	//没有post过来数据，显示添加、修改界面
			//显示修改页面时
			if( isset($_GET['id']) ) {
				$newsId = intval($_GET['id']);	//获取新闻id
				$newsObj = M('news');	//实例化读取信息对象
				$data = $newsObj->getNewsInfo($newsId);	//获取新闻信息
			} else {	//显示添加页面时,给$data赋一个空数组
				$data = array();
			}
			VIEW::assign( array('data' => $data) );
			VIEW::display('admin/newsadd.html');
		} else {	//有post过来的数据，进行添加、修改操作程序
			$this->adjustNewsRet();
		}
	}

	/**
	 * 判断提交新闻后的结果
	 */
	private function adjustNewsRet() {
		$newObj = M('news');
		$result = $newObj->newsSubmit($_POST);
		if($result == 0) {
			$this->showMessage('文章标题或内容不能为空','index.php?controller=admin&method=newsadd&id='.$_POST['id']);
		} elseif($result == 1) {
			$this->showMessage('文章添加成功！','index.php?controller=admin&method=newslist');
		} else {
			$this->showMessage('文章修改成功！','index.php?controller=admin&method=newslist');
		}
	}

	/**
	 * 显示新闻列表
	 * @return void
	 */
	public function newslist() {
		$data = M('news')->getList('','*','order by dateline desc');
		VIEW::assign(array('data' => $data));
		VIEW::display('admin/newslist.html');
	}

	/**
	 * delete the news
	 * @return void
	 */
	public function newsdel() {
		if($_GET['id']) {
			$id = intval($_GET['id']);
			$del_ret = M('news')->newsDel($id);
			if($del_ret != 0 && $del_ret != false) {
				$this->showMessage("删除成功！","index.php?controller=admin&method=newslist");
			} else {
				$this->showMessage('删除失败！','index.php?controller=admin&method=newslist');
			}
		}
	}

	/**
	 * remind and redirect url
	 * @param string $msg result message
	 * @param string $url url
	 * @return void
	 */
	private function showMessage($msg, $url) {
		echo "<script>alert('$msg');window.location.href='$url';</script>";
	}
}