<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
    public function _initialize(){
        layout(false);
    }
    //登录页面
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
    /**
     * 退出登录
     */
    public function logout(){
    	session('auth',null);
    	session(null); //清空当前的session
    	session('[destroy]'); // 销毁session
    	$this->success(L("LOGOUT_SUCCESS"),'/admin');
    	exit();
    }
}