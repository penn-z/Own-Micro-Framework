<?php
	require_once('./libs/Controller/testController.class.php');
	require_once('./libs/Model/testModel.class.php');
	require_once('./libs/View/testView.class.php');
	$testController = new testController();
	$testController->show();
?>