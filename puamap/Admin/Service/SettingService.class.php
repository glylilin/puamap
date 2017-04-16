<?php
namespace Admin\Service;
use Think\Model;
class SettingService extends Model{
	/**
	 * 添加系统配置
	 * @param unknown $data
	 */
	public function addSettingService($data){
		$setting_logic = D('Setting',"Logic");
		return $setting_logic->addSettingLogic($data);
	}
}