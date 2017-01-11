<?php
	class indexController {
		/**
		 * 前台首页
		 * @return void
		 */
		public function index() {
			$newObj = M('news');
			$data = $newObj->getNewsList();
			VIEW::assign(array('list' => $data));
			VIEW::display('index/list.html');
		}

		/**
		 * 新闻详情
		 * @return void
		 */
		public function newsshow() {
			if(isset($_GET['id'])) {
				$id = intval($_GET['id']);
				$news_detail = M('news')->getNewsInfo($id);
			} else {
				$news_detail = array();
			}
			VIEW::assign(array('detail' => $news_detail));
			VIEW::display("index/show.html");
		}

		/**
		 * show about
		 * @return void
		 */
		public function about() {
			$data = M('about')->aboutInfo();
			VIEW::assign(array('about' => $data));
			VIEW::display('index/about.html');
		}

		/**
		 * search
		 * @return void
		 */
		public function search() {
			if( isset($_POST['key']) ) {
				$key = addslashes($_POST['key']);
				$result = M('news')->search($key);
				if(!$result) {
					$result = array();
				}
				VIEW::assign(array('data' => $result));
				VIEW::display('index/search.html');
			}
		}
	}
