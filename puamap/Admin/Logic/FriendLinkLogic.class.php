<?php
namespace Admin\Logic;
use Think\Model;
class FriendLinkLogic extends Model{
    
    public function addLinkLogic($data){
        $res['status'] = false;
        $friend_link_model =  D("FriendLink");
        if($friend_link_model->create($data)){
        	if($friend_link_model->getLinkByName($data['name'])){
        		$res['message'] = L("FRIEND_LINK_EXISTS");
        	}else{
        		if($friend_link_model->add()){
        			$res['status'] = true;
        		}else{
        			$res['message'] = L('OPERATION_FAILED');
        		}
        	}
        }else{
            $res['message'] = $this->getError();
        }
        return $res;
    }
    
    function updateLinkLogic($data){
    	$res['status'] = false;
    	$friend_link_model =  D("FriendLink");
    	if($this->create($data)){
    		if($friend_link_model->updateLink($data)){
    			$res['status'] = true;
    		}else{
    			$res['message'] = L('OPERATION_FAILED');
    		}
    	}else{
    		$res['message'] = $this->getError();
    	}
    	return $res;
    }
    
    public function getPageInfoLogic($page){
    	$pagesize = C("PAGESIZE");
    	$friend_link_model = D("FriendLink");
    	$total = $friend_link_model->getTotalCount();
    	$data['total']= ceil($total/$pagesize);
    	if($data['total']){
    		$data['list'] = $friend_link_model->getPageInfo($page,$pagesize);
    	}
    	return $data;
    }
    
}