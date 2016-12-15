<?php
/**
 * @description ：启动引擎
 * @author : penn
 * @email : penn_z@aliyun.com
 * @date : 2016-12-14
 */
	$current_dir = dirname(__FILE__);	//当前文件所在目录
	require_once $current_dir.'/include.list.php';	//引入清单文件
	foreach($paths as $path) {
		require_once $current_dir.'/'.$path;	//引入清单所列出的文件
	}

	class Engine {
		public static $controller;
		public static $method;
		public static $config;

		/**
		 * 初始化DB引擎
		 */
		private static function init_db() {
			DB::init(self::$config['dbconfig']['dbtype'], self::$config['dbconfig']);
		}

		/**
		 * 初始化视图引擎
		 */
		private static function init_view() {
			VIEW::init(self::$config['viewtype'], self::$config['viewconfig']);
		}

		/**
		 * 初始化控制器
		 * @description :url没有输入controller时，初始化为index
		 */
		private static function init_controller() {
			self::$controller = isset($_GET['controller'])?addslashes($_GET['controller']):'index';
		}

		/**
		 * 初始化方法
		 * @description : url没有输入method时，初始化为index
		 */
		private static function init_method() {
			self::$method = isset($_GET['method'])?addslashes($_GET['method']):'index';
		}

		/**
		 * 启动程序
		 * @param array $config 系统配置：view引擎、db引擎...
		 */
		public static function run($config) {
			self::$config = $config;	//赋值给本静态$config
			self::init_db();
			self::init_view();
			self::init_controller();
			self::init_method();
			C(self::$controller, self::$method);	//调用控制器
		}
	}

	