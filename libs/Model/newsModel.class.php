<?php
class newsModel {
	private $_table = 'news';

	/**
	 * @description : count the number of news
	 * @return int
	 */
	public function counts() {
		return DB::counts($this->_table);
	}

	/**
	 * 读取一条新闻
	 * @return array the news' detail
	 */
	public function getNewsInfo($id) {
		return DB::getOneRow($this->_table, "id = $id");
	}

	/**
	 * 提交新闻
	 * @param array $data 新闻数据
	 * @return int 0:标题或内容为空 | 1:添加 | 2:修改
	 */
	public function newsSubmit($data) {
		extract($data);	//把数组转换为字符串 = 值
		if( empty($title) || empty($content) ) {	//标题或内容为空时
			return 0;
		}
		
		$data = array(
			'title'		=>	addslashes($title),
			'content'	=>	addslashes($content),
			'author'	=>	addslashes($author),
			'source'	=>	addslashes($source),
			'dateline'	=>	time()
		);

		if(empty($_POST['id'])) {	//添加操作
			DB::insertData($this->_table, $data);
			return 1;
		} else {	//修改操作
			DB::updateData($this->_table, $data, "id=$id");
			return 2;
		}
	}

	/**
	 * 后台获取新闻列表
	 * @param string $where where_condition
	 * @param string $target target
	 * @param sring $condition condition 
	 * @return mix : array | false
	 */
	public function getList($where = '', $target = '*', $condition = '') {
		return DB::getList($this->_table ,$where ,$target ,$condition);
	}

	/**
	 * 删除新闻
	 * @param int $id the id of news
	 * @return mix: int(-1:false | 0:no affected row | >0:the affected row) | false
	 */
	public function newsDel($id) {
		return DB::deleteData($this->_table, "id = $id");
	}

	/**
	 * 前台获取新闻列表
	 * @return array
	 */
	public function getNewsList() {
		if( ($data = $this->getList('', '*', 'ORDER BY dateline DESC')) == false ) {	//无数据时
			return $data = array();	//错误或无数据时，返回空数组
		}
		// 对取得的数据进行处理
		foreach($data as $key => $val) {
			// 新闻内容列表展示时，最大显示长度为100
			if( mb_strlen(strip_tags($data[$key]['content'])) > 200) {
				$data[$key]['content'] = mb_substr(strip_tags($data[$key]['content']),0,200)."...";
			}
			$data[$key]['dateline'] = date("Y-m-d H:i:s",$data[$key]['dateline']);
		}
		return $data;
	}

	/**
	 * search the news
	 * @param string $key
	 * @return array | boolean:false
	 */
	public function search($key) {
		return DB::getList($this->_table, "title like '%$key%'","*","order by dateline desc" );
	}
}