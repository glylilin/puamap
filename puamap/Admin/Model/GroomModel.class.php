<?php
namespace Admin\Model;
use Think\Model;
class GroomModel extends Model{
    protected $_validate = array(
        array('title','require','{%TITLTE_REQUIRED}'),
        array('title','checkTitleExists','{%TITLE_EXISIT}',2,'callback'),
        array('link',"checkUrl","{%MENU_URL_FORMAT_ERROR}",2,'callback'),
        array('image_id','require',"{%IMAGE_UPLOAD_REQUIRED}"),
        array('cid','require',"{%IMAGE_UPLOAD_REQUIRED}"),
        array('description','require',"{%DESCRIPTION_REQUIRED}")
    );
    
    protected $_auto = array(
        array('add_time','time',1,'function')
    );
    public function checkUrl($value){
        $pattren = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
        if(!preg_match($pattren,$value)){
            return  false;
        }
        return true;
    }
    
    public function checkTitleExists($title){
        $params = I("post.info");
        $where['title'] = trim(addslashes($title));
        if($params['id']){
            $where['id'] = array('neq',$params['id']);
        }
        if($this->where($where)->find()){
            return false;
        }
        return true;
    }
}