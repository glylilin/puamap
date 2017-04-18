<?php
namespace Admin\Model;
use Think\Model;
class MenuModel extends  Model{
    /**
     * 添加导航
     * @param unknown $data
     */
    public function addMenu($data){
        return $this->add($data);
    }
    /**
     * 根据名称获取内容
     * @param unknown $menu_name
     */
    public function getMenuInfoByMenuName($menu_name){
        return $this->where(array('menu_name'=>$menu_name))->find();
    }
    /**
     * 修改栏目
     * @param unknown $data
     */
    public function saveMenu($data){
        return $this->save($data);
    }
    /**
     * 获取总数
     */
    public function getTotalCount(){
        return $this->count();
    }
    /**
     * 获取分页数据
     * @param unknown $page
     * @param unknown $pagesize
     */
    public function getPageInfo($page,$pagesize){
        $limit = ($page - 1)*$pagesize.",".$pagesize;
        return $this->order("sort asc,id asc")->limit($limit)->select();
    }
}