<?php
namespace Admin\Service;
use Think\Model;
class MenuService extends  Model{
    /**
     * 添加道航
     */
    public function addMenuService($data){
        $menu_logic = D('Menu',"Logic");
        return $menu_logic->addMenuLogic($data);
    }
    
    public function getPageInfoService($page){
       $menu_logic = D("Menu","Logic");
    	$result = $menu_logic->getPageInfoLogic($page);
    	if($result['total']){
    		return $result;
    	}
    	return array();
    }
}