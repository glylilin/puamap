<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model{
    /**
     * µÇÂ¼
     * @param unknown $username
     * @param unknown $password
     * @return unknown|boolean
     */
    public function login($username,$password){
        $data = $this->where(array('username'=>$username))->find();
        if($data && $data['password'] == $password){
            return $data;
        }
        return false;
    }
    
}