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
        $this->display();
    }
    /**
     * 添加banner图
     */
    public function addbanner(){
        $this->display();
    }
}