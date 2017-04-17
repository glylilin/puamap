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
				'var'=>filterString($k),
				'value'=>filterString($v)
			);
			$setting_model->addSetting($temp);
		}
		$this->cacheAllLogic();
		return true;
	}
	
	public function  cacheAllLogic(){
	    $config = $this->select();
	    if (is_array($config)) {
	        $config_data = array();
	        foreach ($config as $k=>$v) {
	            $v['var'] = strtoupper($v['var']);
	            $config_data[$v['var']] = $v['value'];
	        }
 	        return setCache('params', $config_data, ALL_PARAMS_PATH);//写入配置缓存文件
	    }
	    return false;
	}
}