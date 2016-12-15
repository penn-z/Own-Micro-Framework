<?php
	header("Content-type:text/html;charset=utf8");
	session_start();
	require_once 'config.php';
	require_once 'framework/Engine.php';
	Engine::run($config);
	// print_r(get_included_files());