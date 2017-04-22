<?php
namespace Admin\Logic;
use Think\Model\ViewModel;
class VideoTypeLogic extends ViewModel{
   protected $name= "video_type";
   protected $viewFields = array(
       'VideoType'=>array('id'=>"vid",'name','image_id','pinyin','author_name','start','is_use','add_time','is_special','is_del','description','sort','_type'=>"LEFT"),
       'Attachment'=>array('id','image_address',"_on"=>"VideoType.image_id = Attachment.id")
   );
   /**
    * 視頻分類添加
    * @param unknown $data
    */
   public function addVideoTypeLogic($data){
       $video_type_model = D("VideoType");
       $res['status'] = false;
       if($video_type_model->create($data)){
           if($data['id']){
               if($video_type_model->save()){
                   $res['status'] = true;
               }else{
                   $res['message'] = L("OPERATION_FAILED");
               }
           }else{
               if($video_type_model->add()){
                   $res['status'] = true;
               }else{
                   $res['message'] = L("OPERATION_FAILED");
               }
           }
        
       }else{
           $res['message'] = $video_type_model->getError();
       }
       return $res;
   }
   
   /**
    * 获取没有删除的视频分类总数
    */
   public function getVideoTypeCountLogic(){
       return $this->where(array('is_del'=>0))->count();
   }
   /**
    * 获取分类的详情
    * @param unknown $page
    * @return number
    */
   public function getVideoTypePageListLogic($page){
       $total = $this->getVideoTypeCountLogic();
       $data['total'] = 0;
       $pagesize = C("PAGESIZE");
       if($total){
           $data['total'] = ceil($total / $pagesize);
           $temp  = $this->where(array('is_del'=>0))->order('sort asc,vid desc')->page($page,$pagesize)->select();
           $data['list'] =  formatLogicImage($temp);
       }
       return $data;
   }
   /**
    * 根据id获取视频分类详情
    * @param unknown $id
    */
   public function getVideoTypeInfoByIdLogic($id){
      $data =$this->where(array('vid'=>$id))->find();;
     
       return formatLogicImage($data);
   }
   

   
}