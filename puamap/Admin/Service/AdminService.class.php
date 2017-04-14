<?php
namespace Admin\Service;
use Think\Model;
class AdminService extends  Model{
    /**
     * 进行表单验证
     */
    public function loginService($data){
        $admin_logic = D("Admin","Logic");
            $data = $admin_logic->loginLogic($data);
            if($data['status']){
                session('auth',$data['message']);
                unset($data['message']);
            }
        return $data;
    }
}