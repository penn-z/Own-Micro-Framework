<?php
	class testController{
		public function index(){	//控制器的作用是调用视图，讲模型产生的数据传递给视图，并让相关视图去显示
			$testModel = M('test');
			$data = $testModel->get();
			$testView = V('test');
			$testView->display($data);
		}
	}
?>