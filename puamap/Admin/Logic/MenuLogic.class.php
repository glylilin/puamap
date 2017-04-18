<?php
namespace Admin\Logic;
use Think\Model;
class MenuLogic extends Model{
    protected $_validate = array(
        array('menu_name','require','{%MENU_NAME_REQUIRED}'),
        array('menu_link','require','{%MENU_NAME_REQUIRED}'),
        array('menu_link','checkUrl','{%MENU_URL_FORMAT_ERROR}',3,'function'),
    );
    /**
     * url验证
     * @param unknown $value
     */
    public function checkUrl($value){
        $pattren = "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
        if(!preg_match($value)){
            return  false;
        }
        return true;
    }
    /**
     * 添加内容
     * @param unknown $data
     */
    public function addMenuLogic($data){
        $res['status'] = false;
        if($this->create($data)){
            $menu_model = D("Menu");
            if($data['id']){
                if($menu_model->saveMenu($data)){
                    $res['status'] = true;
                }else{
                    $res['message'] = L("OPERATION_FAILED");
                }
            }else{
                if($menu_model->getMenuInfoByMenuName($data['menu_num'])){
                    $res['message'] = L("MENU_EXISTS");
                }else{
                    if($menu_model->addMenu($data)){
                        $res['status'] = true;
                    }else{
                        $res['message'] = L("OPERATION_FAILED");
                    }
                }
            }
        }else{
            $res['message'] = $this->getError();
        }
        return $res;
    }
    /**
     * 获取分页数据
     * @param unknown $page
     */
    public function getPageInfoLogic($page){
        $pagesize = C("PAGESIZE");
        $menu_model = D("menu");
        $total = $menu_model->getTotalCount();
        $data['total']= ceil($total/$pagesize);
        if($data['total']){
            $data['list'] = $menu_model->getPageInfo($page,$pagesize);
        }
        return $data;
    }
}