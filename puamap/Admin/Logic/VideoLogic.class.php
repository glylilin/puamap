<?php
namespace Admin\Logic;
use Think\Model\ViewModel;
class VideoLogic extends ViewModel{
    protected $viewFields = array(
        'Video'=>array('id'=>"vid",'movie_name','image_id','link','tid','play','comment','description','pub_time','is_use','is_del','sort','send_time','_type'=>"LEFT"),
        'Attachment'=>array('image_address','id'=>'aid','_on'=>'Video.image_id = Attachment.id'),
        'VideoType'=>array('name','id','_on'=>"Video.tid = VideoType.id")
    );
    /**
     * 添加视频信息
     * @param unknown $data
     */
    public function addVideoLogic($data){
        $video_model = D("Video");
        $res['status'] = false;
        if($video_model->create($data)){
            if($data['id']){
                if($video_model->save()){
                    $res['status'] = true;
                }else{
                    $res['message'] = L("OPERATION_FAILED");
                }
            }else{
                if($video_model->add()){
                    $res['status'] = true;
                }else{
                    $res['message'] = L("OPERATION_FAILED");
                }
            }
          
        }else{
            $res['message'] = $video_model->getError();
        }
        return $res;
    }
    /**
     * 获取未删除视频总数
     */
    public function getVideoCountLogic(){
        return $this->where(array('is_del'=>0))->count();   
    }
    /**
     * 根据视频页数获取视频的分页信息
     * @param unknown $page
     */
    public function getVideoPageListLogic($page){
        $pagesize = C('PAGESIZE');
        $total =$this->getVideoCountLogic();
        $data['total'] = 0;
        if($total){
            $data['total'] = ceil($total / $pagesize);
            $result = $this->where(array('is_del'=>0))->page($page,$pagesize)->order('pub_time desc,id desc,sort asc')->select();
            $data['list'] = formatLogicImage($result);
        }
        return $data;
    }
    
    /**
     * 获取视频信息
     * @param unknown $id
     */
    public function getVideoInfoByIdLogic($id){
        $data = $this->where(array('vid'=>$id))->find();
        return formatLogicImage($data);
    }
    
}