<?php
	$config = array(
		'viewtype'   =>	'smarty',

		'viewconfig' =>	array(
			'LeftDelimiter'		=>	'{',
			'RightDelimiter' 	=>	'}',
			'TemplateDir'		=>	'tpl',
			'CompileDir'		=>	'data/template_c',
			'CacheDir'			=>	'data/cache',
			// 'Caching'			=> 	"Smarty::CACHING_LIFETIME_CURRENT)",
			// 'CacheLifetime'		=>	10
		),

		'dbconfig' => array(
			'dbtype'	=>	'mysql',
			'host'		=>	'localhost',
			'username'	=>	'root',
			'password'	=>	'root',
			'dbname'	=>	'study_mvc',
			'port'		=>	3306,
			'charset'	=>	'utf8'
		)
	);