<?php
namespace Admin\Logic;
use Think\Model\ViewModel;
class GroomLogic extends  ViewModel{
    protected $viewFields = array(
        'Groom'=>array('id'=>'gid','cid','title','image_id','description','author_name','is_use','pub_time','author_id','link','is_del',"_type"=>"LEFT"),
        'Classify'=>array('id'=>'aid','name','pinyin','_on'=>'Groom.cid=Classify.id'),
        'Attachment'=>array('id','image_address','_on'=>"Groom.image_id=Attachment.id")
    );
    /**
     * 添加内容
     * @param unknown $data
     * @return boolean
     */
    public function addGroomLogic($data){
        $groom_model =D('Groom');
        $res['status'] = false;
        if($groom_model->create($data)){
            if($data['id']){
                if($groom_model->save()){
                    $res['status']  = true;
                }else{
                    $res['message'] = L("OPERATION_FAILED");
                }
            }else{
                if($groom_model->add()){
                    $res['status']  = true;
                }else{
                    $res['message'] = L("OPERATION_FAILED");
                }
            }
        }else{
            $res['message']= $groom_model->getError();
        }
        return $res;
    }
    

    
    /**
     * 获取推荐总数
     */
    public function getGroomCount($cid){
        $where['is_del'] = 0;
        if($cid){
            $where['cid'] = $cid;
        }
        return $this->where($where)->count();
    }
    
    public function getGroomPageLogic($page,$cid){
        $total = $this->getGroomCount($cid);
        $pagesize = C("PAGESIZE");
        $data['total'] = 0;
        if($total){
            $data['total'] = ceil($total/$pagesize);
            $where['is_del'] = 0;
            if($cid){
                $where['cid'] = $cid;
            }
            $pageData =  $this->where($where)->page($page,$pagesize)->order('pub_time desc,id desc')->select();
            $data['list'] = formatLogicImage($pageData);
        }
        return $data;
    }
    /**
     * 获取某个推荐数据的通过ID
     * @param unknown $id
     * @return unknown
     */
    public function getGroomInfoById($id){
        $data = $this->where(array('gid'=>$id))->find();
        return formatLogicImage($data);
    }
}