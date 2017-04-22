<?php
namespace Admin\Controller;
class VideoController extends BaseController{
    /**
     *视频分类
     */
    public function type(){
        $video_type_service = D("VideoType","Service");
        $page = I('get.page',1,'intval');
        $data = $video_type_service->getVideoTypePageListService($page);
        $this->assign('data',$data);
        $this->display();
    }
    /**
     * 视频分类添加
     */
    public function addType(){
        $message= '';
        $video_type_logic = D("VideoType","Logic");
        if(IS_POST){
            $data = I('post.info',array());
            $data['is_use'] = isset($data['is_use']) ? intval($data['is_use']) : 0;
            $data['is_special'] = isset($data['is_special']) ? intval($data['is_special']) : 0;
            $data[C("TOKEN_NAME")] = I("post.".C("TOKEN_NAME"),"",'trim');
            $result = $video_type_logic->addVideoTypeLogic($data);
            if(!$result['status']){
                $message = $result['message'];
            }else{
                $this->success(L("OPERATION_SUCCESS"),'/admin/video/type');exit();
            }
        }
        $id = I("get.id",0,'intval');
        $data = $video_type_logic->getVideoTypeInfoByIdLogic($id);
        $this->assign('info_data',$data);
        $this->assign('message',$message);
        $this->display();
    }
    /**
     * 删除视频分类
     */
    public function deltype(){
        $res['status'] = false;
        if(IS_AJAX){
            $id = I('post.id',0,'intval');
            $video_type_model = D("VideoType");
            if($video_type_model->where(array('id'=>$id))->save(array('is_del'=>1))){
                $res['status'] = true;
            }else{
                $res['message'] = L("OPERATION_FAILED");
            }
        }else{
            $res['message'] = L("ILLEGAL_OPERATION");
        }
        $this->ajaxReturn($res);
    }
    /**
     * 视频列表
     */
    public function movie(){
       $video_service =  D("Video",'Service');
       $page = I("get.page",1,'intval');
       $data = $video_service->getVideoPageListService($page);
       $this->assign('data',$data);
      $this->display();
    }
    /**
     * 添加视频
     */
    public function addMovie(){
        if(IS_POST){
            $data = I('post.info',array());
            $data['is_use'] = isset($data['is_use']) ? intval($data['is_use']) : 0;
            $data[C("TOKEN_NAME")] = I("post.".C("TOKEN_NAME"),"",'trim');
            $video_logic = D('Video',"Logic");
            $result = $video_logic->addVideoLogic($data);
            if(!$result['status']){
                $message = $result['message'];
            }else{
                $this->success(L("OPERATION_SUCCESS"),'/admin/video/movie');exit();
            }
        }
        $id = I("get.id",0,'intval');
        $video_type_service=D("VideoType","Service");
        $typelist = $video_type_service->getUseVideoTypeService();
        $video_service = D("Video",'Service');
        $info_data = $video_service->getVideoInfoByIdService($id);
        $this->assign('typelist',$typelist);
        $this->assign('message',$message);
        $this->assign('info_data',$info_data);
        $this->display();
    }
    
    /**
     * 删除视频
     */
    public function delmovie(){
        $res['status'] = false;
        if(IS_AJAX){
            $id = I('post.id',0,'intval');
            $video_model = D("Video");
            if($video_model->where(array('id'=>$id))->save(array('is_del'=>1))){
                $res['status'] = true;
            }else{
                $res['message'] = L("OPERATION_FAILED");
            }
        }else{
            $res['message'] = L("ILLEGAL_OPERATION");
        }
        $this->ajaxReturn($res);
    }
}