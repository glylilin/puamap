<?php
namespace Admin\Controller;
class IndexController extends BaseController {
    public function index(){
    
    	$this->display();
    }
    
    public function main(){
    	$this->display();
    }
    /**
     * 轮播图设置
     */
    public function banner(){
        $message = "";
        if(IS_POST){
            $data = I('post.info',array());
            $data['is_use'] = isset($data['is_use']) ? intval($data['is_use']) : 0;
            $data[C("TOKEN_NAME")] = I("post.".C("TOKEN_NAME"),"",'trim');
            $banner_logic = D("Banner","Logic");
            $result = $banner_logic->addBannerlogic($data);
            if(!$result['status']){
                $message = $result['message'];
            }
        }
        $page = I("get.page",1,'intavl');
        $banner_service = D('Banner','Service');
        $data = $banner_service->getBannerInfoService($page);
        $this->assign('message',$message);
        $this->assign('data',$data);
        $this->display();
    }
   /**
    * 杀出轮播图
    */
    public function  delbanner(){
        $res['status'] = false;
        if(IS_AJAX){
            $id = I('post.id',0,'intval');
            $banner_model = D("Banner");
   
            if($banner_model->where(array('id'=>$id))->delete()){
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
     * 推荐分类
     */
    public function classify(){
        $message = "";
        if(IS_POST){
            $data = I('post.info',array());
            $data['is_use'] = isset($data['is_use']) ? intval($data['is_use']) : 0;
            $data[C("TOKEN_NAME")] = I("post.".C("TOKEN_NAME"),"",'trim');
            $classify_logic = D("Classify",'Logic');
            $result = $classify_logic->addClassifyLogic($data);
            if(!$result['status']){
                $message = $result['message'];
            }
        }
        $classify_service = D("Classify",'Service');
        $page = I("get.page",1,'intval');
        $data = $classify_service->getClassifyPageInfoService($page);

        $this->assign('data',$data);
        $this->assign('message',$message);
        $this->display();
    }
    /**
     * 删除分类
     */
    public function delclassify(){
        $res['status'] = false;
        if(IS_AJAX){
            $id = I('post.id',0,'intval');
            $classify_model = D("Classify");
             
            if($classify_model->where(array('id'=>$id))->save(array('is_del'=>1))){
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
     * 推荐主题
     */
    public function groom(){
        
        $this->display();
    }
    
   
}