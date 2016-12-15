<?php
class VIEW{
	public static $view;	//存储视图引擎对象

	public static function init($viewtype,$config){
		self::$view = new $viewtype();

		/*//smarty五配置
		$smarty->setLeftDelimiter('{');	//左定界符
		$smarty->setRightDelimiter('}');	//右定界符
		$smarty->setTemplateDir('tpl');	//模板地址
		$smarty->setCompileDir('template_c');	//编译文件
		$smarty->setCacheDir('cache');	//缓存地址
		//开启缓存，smarty有特有的缓存机制，但现实际开发中已经不用
		$smarty->setCaching(Smarty::CACHING_LIFETIME_CURRENT);	//开启缓存
		$smarty->setCacheLifetime(10);	//缓存时间*/

		//配置smarty引擎
		foreach($config as $key => $value){
			$str = "set".$key;
			self::$view->$str($value);
		}
		// self::$view->setCaching(Smarty::CACHING_LIFETIME_CURRENT);
		// self::$view->setCacheLifetime(10);
	}

	/**
	 * @description :渲染变量
	 * @param array $data input data
	 * @return void
	 */
	public static function assign($data){
		foreach($data as $key => $value){
			self::$view->assign($key,$value);
		}
	}

	/**
	 * 渲染模板
	 * @param string $template template_dir
	 * @return void
	 */
	public static function display($template){
		self::$view->display($template);
	}
}