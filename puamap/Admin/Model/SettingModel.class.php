<?php
namespace Admin\Model;
use Think\Model;
class SettingModel extends Model{
	/**
	 * 添加或修改内容
	 * @param unknown $data
	 */
	public function addSetting($data){
		if(empty($data)){
			return false;
		}
		if($this->getSetingByTitle($data['title'])){
			$this->where(array('title'=>$data['title']))->save(array('desc'=>$data['desc']));
		}else{
			$this->add(array('title'=>$data['title'],'desc'=>$data['desc']));
		}
		return true;
	}
	/**
	 * 根据title设置获取内容
	 */
	public function getSetingByTitle($title){
		return $this->where(array('title'=>$title))->find();
	}
}