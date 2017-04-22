<?php
namespace Admin\Model;
use Think\Model;
class VideoModel extends Model{
     protected  $_validate = array(
        array('movie_name','require',"{%MOVIE_NAME_REQUIRE}"),
        array('movie_name','checkExistsMovieName',"{%MOVIE_NAME_EXISIT}",1,'callback'),
        array('link','require',"{%LINK_REQUIRE}"),
        array('link',"checkUrl","{%MENU_URL_FORMAT_ERROR}",1,'callback'),
        array('link','checkExistsMovieLink',"{%MOVIE_LINK_EXISIT}",1,'callback'),
        array('image_id','require',"{%IMAGE_UPLOAD_REQUIRED}"),
        array('tid','require',"{%MOVIE_TYPE_REQUIRE}"),
    );

     protected $_auto = array(
         array('add_time','time',1,'function'),
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
     
     public function checkExistsMovieLink($value){
         $where['is_del']=0;
         $where['link'] = filterString($value);
         $params = I("post.info",array());
         if($params['id']){
             $where['id'] = array('neq',$params['id']);
         }
         $data = $this->where($where)->find();
        
         if($data){
             return false;
         }
         return true;
     }
    
     public function checkExistsMovieName($value){
         $where['is_del']=0;
         $where['movie_name'] = filterString($value);
         $params = I("post.info",array());
         if($params['id']){
             $where['id'] = array('neq',$params['id']);
         }
         $data = $this->where($where)->find();
         if($data){
             return false;
         }
         return true;
     }
     
}