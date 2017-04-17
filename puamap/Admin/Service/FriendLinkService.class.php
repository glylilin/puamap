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
        return $friend_link_logic->addLinkLogic($data);
    }
}