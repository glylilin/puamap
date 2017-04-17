<?php
namespace Admin\Model;
use Think\Model;
class  FriendLinkModel extends Model{
	protected $_auto =array(
			array('add_time','time',1,'function')//添加的时候完成
	);
   /**
    * 获取内容通过名称
    * @param unknown $name
    */
	public function getLinkByName($name){
		return $this->where(array('name'=>trim($name)))->find();
	}
	/**
	 * 获取总数
	 */
	public function getTotalCount(){
		return $this->count();
	}
	/**
	 * 根据页数返回数据
	 * @param unknown $page
	 * @param unknown $pageSize
	 */
	public function getPageInfo($page,$pageSize){
		$limit = ($page - 1)*$pageSize.",".$pageSize;
		return $this->order("id desc")->limit($limit)->Select();
	}
	/**
	 * 修改友链
	 * @param unknown $data
	 */
	public function updateLink($data){
		return $this->save($data);
	}
}