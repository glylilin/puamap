<?php
namespace Admin\Service;
use Think\Model;
class VideoService extends Model{
    /**
     * 获取分页信息
     * @param unknown $page
     * @return unknown
     */
    public function getVideoPageListService($page){
       $video_logic =  D("Video","Logic");
       $data =  $video_logic->getVideoPageListLogic($page);
       return $data;
    }
    /**
     * 获取视频信息通过ID
     * @param unknown $id
     * @return unknown
     */
    public function getVideoInfoByIdService($id){
        $video_logic = D('Video',"Logic");
        $data = $video_logic->getVideoInfoByIdLogic($id);
        return $data;
    }
    
}