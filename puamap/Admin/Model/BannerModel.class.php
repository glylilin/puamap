<?php
namespace Admin\Model;
use Think\Model;
class BannerModel extends Model{
    protected $_auto = array(
        array('add_time','time',1,'function')
    );
    protected $_validate = array(
        array('title','require',"{%TITLE_REQUIRED}",3),
        array('image_id','require',"{%IMAGE_UPLOAD_REQUIRED}",3),
        array('link','require','{%URL_REQUIRE}',3),
        array('link',"checkUrl","{%MENU_URL_FORMAT_ERROR}",3,'callback')
    );
    /**
     * url验证
     * @param unknown $value
     */
    public function checkUrl($value){
        $pattren = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
        if(!preg_match($value)){
            return  false;
        }
        return true;
    }
   
    
}