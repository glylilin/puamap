<?php
namespace Admin\Logic;
use Think\Model;
class SettingLogic extends Model{
	/**
	 * 添加系统配置
	 * @param unknown $data
	 */
	public function addSettingLogic($data){
		if(empty($data)){
			return false;
		}
		$setting_model = D("Setting");
		foreach($data as $k=>$v){
			$temp = array(
				'title'=>filterString($k),
				'desc'=>filterString($v)
			);
			if(!$setting_model->addSetting($temp)){
				return false;
			}
			C(strtoupper($temp['title']),$temp['desc']);
		}
		return true;
	}
	
}