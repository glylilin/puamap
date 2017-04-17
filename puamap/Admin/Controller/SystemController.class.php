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
        
        $this->display();
    }
    
    /**
     * 友情链接
     */
    public function addFriendLink(){
        $message  ="";
        if($_POST){
            $data = I('post.info', array());
            $data['is_use'] = isset($data['is_use']) ? intval($data['is_use']) : 0;
            $data[C("TOKEN_NAME")] = I("post.".C("TOKEN_NAME"),"",'trim');
            $friend_link_service = D('FriendLink','Service');
            $result = $friend_link_service->addLinkServic($data);
            if(!$result['status']){
                $message = $result['message'];
            }else{
                $this->success(L('OPERATION_SUCCESS'),'/admin/system/friendlink');exit();
            }
        }
        $this->assign('message',$message);
        $this->display();
    }
}