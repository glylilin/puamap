<?php
namespace Admin\Logic;
use Think\Model;
class FriendLinkLogic extends Model{
    protected $_auto =array(
        array('add_time','time',1,'function')//添加的时候完成
    );
    public function addLinkLogic($data){
        $res['status'] = false;
        $friend_link_model =  D("FriendLink");
        if($friend_link_model->create($data)){
            var_dump($friend_link_model);
            exit();
            if($friend_link_model->addLink($data)){
                $res['status'] = true;
            }else{
                $res['message'] = L('OPERATION_FAILED');
            }
        }else{
            $res['message'] = $this->getError();
        }
        return $res;
    }
}