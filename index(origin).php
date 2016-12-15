<?php
	//url形式　index.php?controller=控制器&method=方法名
	require_once 'function.php';
	/*允许访问的控制器名与方法名*/
	$controller_allow = array('test','index');
	$method_allonw = array('test','index','show');
	//为允许访问的控制器与方法时，调用相应控制器或方法，否则调用index控制器或方法（默认的）
	$controller = in_array($_GET['controller'],$controller_allow)?addslashes($_GET['controller']):'index';
	$method = in_array($_GET['method'],$method_allonw)?addslashes($_GET['method']):'index';
	C($controller,$method);