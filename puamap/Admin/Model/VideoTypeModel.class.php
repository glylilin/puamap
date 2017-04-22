<?php
namespace Admin\Model;
use Think\Model;
class VideoTypeModel extends Model{
    protected  $_validate = array(
        array('tname','require',"{%CLASSIFY_NAME_REQUIRED}"),
        array('image_id','require',"{%IMAGE_UPLOAD_REQUIRED}"),
    );
    
    protected $_auto = array(
        array('add_time','time',1,'function'),
        array('pinyin','fomartNameToPinYin',3,'function')
    );
    /**
     * 获取可用的视频分类
     */
    public function getUseVideoType(){
        return $this->where(array('is_use'=>1,'is_del'=>0))->order('sort asc,id desc')->select();
    }
    
}