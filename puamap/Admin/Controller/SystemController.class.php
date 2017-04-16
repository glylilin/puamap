<?php
namespace Admin\Controller;
class SystemController extends BaseController{
	/**
	 * 参数设置
	 */
	public function Params(){
		if(IS_POST){
			$data = I('post.info',array());
			$setting_service = D("Setting","Service");
			if($setting_service->autoCheckToken($_POST)){
				$setting_service->addSettingService($data);
			}
		}
		 
		$this->display();
	}
}