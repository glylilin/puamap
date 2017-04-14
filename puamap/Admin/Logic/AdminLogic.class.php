<?php
namespace Admin\Logic;
use Think\Model;
class AdminLogic extends Model{
    protected $_login_validate  = array(
        array(
            'username','require','{%USER_NAME_REQUIRED}'
        ),
        array(
            'password','require','{%PASSWORD_REQUIRED}'
        ),
        array(
            'password','checkPassword','{%PASSWORD_RANGE}',1,'function'
        ),
    );
    
    protected  $_login_auto = array(
        array('username','trim',1,'function'),
        array('username','strtolower',1,'function'),
        array('username','addslashes',1,'function'),
        array('password','strtolower',1,'function'),
        array('password','md5',1,'function'),
    );
    public function loginLogic($data){
            $res['status'] = false;
          //create()方法会对token进行验证
            if($this->validate($this->_login_validate)->auto($this->_login_auto)->create($data)){
                $admin_model =  D("Admin");
                $data = $admin_model->login($this->username,$this->password);
                if($data){
                    $res['status'] = true;
                    $res['message'] = $data;
                }else{
                    $res['message'] = L("ACCUNT_OR_PASSWORD_ERROR");
                }
            }else{
                $res['message'] = $this->getError();
           } 
  
        return $res;    
    }
    /**
     * 密码验证֤
     * @param unknown $value
     * @return boolean
     */
    public function checkPassword($value){
        if(strlen(trim($value)) < 6){
            return false;
        }
        return true;
    }
    
    
    
}