<?php
namespace Admin\Service;
use Think\Model;
class VideoTypeService extends Model{
    /**
     * 获取可用的视频分类
     */
    public function getUseVideoTypeService(){
        return D('VideoType')->getUseVideoType();
    }
    /**
     * 获取视频分类类别分信息
     * @param unknown $page
     * @return unknown
     */
    public function getVideoTypePageListService($page){
        $video_type_logic = D("VideoType","Logic");
        $data = $video_type_logic->getVideoTypePageListLogic($page);
        return $data;
    }
}