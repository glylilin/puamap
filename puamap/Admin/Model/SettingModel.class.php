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
		if($this->getSetingByTitle($data['var'])){
			$this->where(array('var'=>$data['var']))->save(array('value'=>$data['value']));
		}else{
			$this->add(array('var'=>$data['var'],'value'=>$data['value']));
		}
		return true;
	}
	/**
	 * 根据title设置获取内容
	 */
	public function getSetingByTitle($title){
		return $this->where(array('var'=>$title))->find();
	}
}