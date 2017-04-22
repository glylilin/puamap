<?php
namespace Admin\Logic;
use Think\Model;
class BannerLogic extends  Model{
    /**
     * 添加banner
     * @param unknown $data
     * @return boolean
     */
    public function addBannerlogic($data){
        $Banner_model = D('Banner');
        $res['status'] = false;
        if($Banner_model->create($data)){
            if($data['id']){
                if($Banner_model->save()){
                    $res['status'] = true;
                }else{
                    $res['message']=L("OPERATION_FAILED");
                }
            }else{
                if($Banner_model->add()){
                    $res['status'] = true;
                }else{
                    $res['message']=L("OPERATION_FAILED");
                }
            }
        }else{
            $res['message'] = $Banner_model->getError();
        }
       
        return $res;
    }
    /**
     * 获取分页信息
     * @param unknown $page
     * @return unknown
     */
    public function getBannerInfoLogic($page){
        $banner_model = D("BannerView");
        $data['total'] = ceil($banner_model->getBannerCount() / C("PAGESIZE"));
        if($data['total']){
            $data['list'] = formatLogicImage($banner_model->getBannerInfo($page,C("PAGESIZE")));
        }
        return $data;
    }
   
}