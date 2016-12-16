<?php
	header("Content-type:text/html;charset=utf8");
	date_default_timezone_set('Asia/Shanghai');
	session_start();
	require_once 'config.php';
	require_once 'framework/Engine.php';
	Engine::run($config);
