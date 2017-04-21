<?php
namespace Admin\Service;
use Think\Model;
class ClassifyService extends  Model{
    /**
     * 获取分类的总分页信息
     * @param unknown $page
     */
    public function getClassifyPageInfoService($page){
        $classify_logic = D('Classify','Logic');
        return $classify_logic->getClassifyPageInfoLogic($page);
    }
}