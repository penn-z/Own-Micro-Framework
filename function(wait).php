<?php
	/**
	 * 控制器调用函数
	 * @param string $controller_name 控制器名称
	 * @param string $method 方法名称
	 * @return void
	 */
	function C($controller_name,$method){
		require_once './libs/Controller/'.$controller_name.'Controller.class.php'; //引入控制器
		// $testController = new testController();
		// $testController->show();
		// eval('$obj = new '.$controller_name.'Controller();$obj->'.$method.'();');　//对控制器进行实例化且调用方法
		$controller = $controller_name.'Controller';
		$obj = new $controller();
		$obj->$method();
	}

	/**
	 * 模型调用函数
	 * @param string $name　模型名称
	 * @return object
	 */
	function M($model_name){
		require_once './libs/Model/'.$model_name.'Model.class.php';
		$model = $model_name.'Model';
		$obj = new $model();
		return $obj;
	}

	/**
	 * 视图调用函数
	 * @param string $name 视图名称
	 * @return object
	 */
	function V($view_name){
		require_once './libs/View/'.$view_name.'View.class.php';
		$view = $view_name.'View';
		$obj = new $view();
		return $obj;
	}


?>