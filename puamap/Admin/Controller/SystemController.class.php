<?php
namespace Admin\Controller;
class SystemController extends BaseController{
    /**
     * 参数设置
     */
    public function Params()
    {
        if (IS_POST) {
            $data = I('post.info', array());
            $data['onoff'] = isset($data['onoff']) ? intval($data['onoff']) : 0;
            $setting_service = D("Setting", "Service");
            if ($setting_service->autoCheckToken($_POST)) {
                $setting_service->addSettingService($data);
            }
        }
        $this->display();
    }
    
    public function company(){
        if (IS_POST) {
            $data = I('post.info', array());
            $setting_service = D("Setting", "Service");
            if ($setting_service->autoCheckToken($_POST)) {
                $setting_service->addSettingService($data);
            }
        }
        $this->display();
    }
    /**
     *附件设置
     */
    public function access(){
      if (IS_POST) {
            $data = I('post.info', array());
            $data['is_cut'] = isset($data['is_cut']) ? intval($data['is_cut']) : 0;
            $data['water_iswatermark'] = isset($data['water_iswatermark']) ? intval($data['water_iswatermark']) : 0;
            $setting_service = D("Setting", "Service");
            if ($setting_service->autoCheckToken($_POST)) {
                $setting_service->addSettingService($data);
            }
        }
        $this->display();
    }
    /**
     * 友情链接
     */
    public function friendLink(){
        $page = I("get.page",1,'intval');
        $friend_link_service =  D("FriendLink",'Service');
        $data = $friend_link_service->getPageInfoService($page);
        $this->assign('data',$data);
        $this->assign('page',$page);
        $this->display();
    }
    
    /**
     * 友情链接
     */
    public function addFriendLink(){
        $message  ="";
        $friend_link_service = D('FriendLink','Service');
        $id = I("get.id",0,'intval');
        if($_POST){
            $data = I('post.info', array());
            $id = $id ? $id : $data['id'];
            $data['is_use'] = isset($data['is_use']) ? intval($data['is_use']) : 0;
            $data[C("TOKEN_NAME")] = I("post.".C("TOKEN_NAME"),"",'trim');
            $result = $friend_link_service->addLinkServic($data);
            if(!$result['status']){
                $message = $result['message'];
            }else{
                $this->success(L('OPERATION_SUCCESS'),'/admin/system/friendlink');exit();
            }
        }

        $data = array();
        if($id){
        	$data = $friend_link_service->where(array('id'=>$id))->find();
        }
        $this->assign('data',$data);
        $this->assign('message',$message);
        $this->display();
    }
    /**
     * 删除友链
     */
    public function delFriendLink(){
    	$res['status'] = false;
    	if(IS_AJAX){
    	    $id = I("post.id",0,'intval');
    	    $friend_link_service = D('FriendLink','Service');
    	    if($friend_link_service->where(array('id'=>$id))->delete()){
    	        $res['status'] = true;
    	    }else{
    	        $res['message'] = L('OPERATION_FAILED');
    	    }
    	}else{
    	    $res['message'] = L('ILLEGAL_OPERATION');
    	}
    	
    	$this->ajaxReturn($res);
    }
    /**
     * 导航列表
     */
    public function menu(){
    	$page = I("get.page",1,'intval');
        $menu_service =  D("Menu",'Service');
        $data = $menu_service->getPageInfoService($page);
        $this->assign('data',$data);
        $this->assign('page',$page);
        $this->display();
    }
    
    public function addmenu(){
        $message = "";
        $id = I("get.id",0,'intval');
        $menu_service  = D('Menu',"Service");
        if(IS_POST){
            $data = I('post.info',array());
            $data['is_use'] = isset($data['is_use']) ? intval($data['is_use']) : 0;
            $data[C("TOKEN_NAME")] = I("post.".C("TOKEN_NAME"),"",'trim');
            $id = $id ? $id : $data['id'];
            $result = $menu_service->addMenuService($data);
            if($result['status']){
                $this->success(L('OPERATION_SUCCESS'),'/admin/system/menu');exit();
            }
            $message = $result['message'];
        }
        $data = array();
        if($id){
            $data = $menu_service->where(array('id'=>$id))->find();
        }
        $this->assign('message',$message);
        $this->assign('data',$data);
    	$this->display();
    }
    
    public function delMenu(){
        $res['status'] = false;
        if(IS_AJAX){
            $id = I("post.id",0,'intval');
            $menu_service = D('Menu','Service');
            if($menu_service->where(array('id'=>$id))->delete()){
                $res['status'] = true;
            }else{
                $res['message'] = L('OPERATION_FAILED');
            }
        }else{
            $res['message'] = L('ILLEGAL_OPERATION');
        }
        
       $this->ajaxReturn($res);
    }
}