<?php
namespace Admin\Model;
use Think\Model\ViewModel;
class BannerViewModel extends ViewModel{
    protected  $name= "banner";
    protected  $viewFields  = array(
        'Banner'=>array('id'=>'bid','title','image_id','link','add_time','is_use','sort','_type'=>"LEFT"),
        "Attachment"=>array('image_address','id','_on'=>"Banner.image_id = Attachment.id")
    );

    /**
     * 获取banner图总数
     */
    public function getBannerCount(){
       return $this->count();
    }
    /**
     * 获取banner图的分页信息
     * @param unknown $page
     * @param unknown $pagesize
     */
    public function getBannerInfo($page,$pagesize){
        $limit = ($page - 1) * $pagesize.",".$pagesize;
        return $this->order('sort asc ,id desc')->limit($limit)->select();
    }
    
}