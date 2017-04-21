<?php
namespace Admin\Service;
use Think\Model;
class BannerService extends  Model{
    public function getBannerInfoService($page){
        $banner_logic = D("Banner","Logic");
        return $banner_logic->getBannerInfoLogic($page);
    }
}