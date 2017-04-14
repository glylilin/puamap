<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function _initialize(){
        layout(false);
    }
    public function index(){
       
        $message = "";
        if(IS_POST){
           $data = $_POST;
           $admin_service =  D("Admin",'Service');
           $result = $admin_service->loginService($data);
           if($result['status']){
                   $this->success(L('LOGIN_SUCCESS'),"/admin");
                   exit();
           }
           $message = $result['message'];
        }
       $this->assign('message',$message);
       $this->display();
    }
}