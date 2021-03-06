<?php
namespace Admin\Model;
use Think\Model;
class BannerModel extends Model{
    protected $_auto = array(
        array('add_time','time',1,'function')
    );
    protected $_validate = array(
        array('title','require',"{%TITLE_REQUIRED}"),
        array('image_id','require',"{%IMAGE_UPLOAD_REQUIRED}"),
        array('link','require','{%URL_REQUIRE}'),
        array('link',"checkUrl","{%MENU_URL_FORMAT_ERROR}",2,'callback')
    );
    /**
     * url验证
     * @param unknown $value
     */
    public function checkUrl($value){
        $pattren = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
        if(!preg_match($pattren,$value)){
            return  false;
        }
        return true;
    }
   
    
}