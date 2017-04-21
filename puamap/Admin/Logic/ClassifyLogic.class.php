<?php
namespace Admin\Logic;
use Think\Model;
class ClassifyLogic extends Model{
    /**
     * 添加分类0
     */
    public function addClassifyLogic($data){
        $classify_model = D("Classify");
        $res['status'] = false;
        if($classify_model->create($data)){
            if($data['id']){
                if($classify_model->save()){
                    $res['status'] = true;
                }else{
                    $res['message'] =L("OPERATION_FAILED");
                }
            }else{
                if($classify_model->add()){
                    $res['status'] = true;
                }else{
                    $res['message'] =L("OPERATION_FAILED");
                }
            }
        }else{
            $res['message'] = $classify_model->getError();
        }
        return $res;
    }
    /**
     * 获取分页信息
     * @param unknown $page
     * @return unknown
     */
    public function getClassifyPageInfoLogic($page){
         $classify_model = D("Classify");
         $pagesize = C("PAGESIZE");
         $data['total'] = ceil($classify_model->getCount() / $pagesize);
         if($data['total']){
             $data['list'] = $classify_model->getClassifyPageInfo($page,$pagesize);
         }
         return $data;
    }
}