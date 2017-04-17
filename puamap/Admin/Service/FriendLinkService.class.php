<?php
namespace Admin\Service;
use Think\Model;
class FriendLinkService extends  Model{
    /**
     * 添加链接
     * @param unknown $data
     */
    public function addLinkServic($data){
        $friend_link_logic = D("FriendLink","Logic");
        if(!$data['id']){
        	return $friend_link_logic->addLinkLogic($data);
        }
        return $friend_link_logic->updateLinkLogic($data);
    }
    
    public function getPageInfoService($page){
    	$friend_link_logic = D("FriendLink","Logic");
    	$result = $friend_link_logic->getPageInfoLogic($page);
    	if($result['total']){
    		return $result;
    	}
    	return array();
    }
}