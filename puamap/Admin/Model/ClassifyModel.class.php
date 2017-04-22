<?php
namespace Admin\Model;
use Think\Model;
class ClassifyModel extends Model{
    protected $_validate = array(
        array('name','require',"{%CLASSIFY_NAME_REQUIRED}",3),
        array('name','checkExistsName',"{%CLASSIFY_EXISIT}",1,'callback'),
    );
    
    protected $_auto =array(
        array('add_time','time',1,'function'),
        array('pinyin','fomartNameToPinYin',3,"callback")
    );
    public function checkExistsName($name){
        $params = I('post.info');
        $id = $params['id'];
        if($id){
            if($this->where(array('name'=>trim(addslashes($name)),'id'=>array('neq',$id)))->find()){
                return false;
            }
        }else{
            if($this->where(array('name'=>trim(addslashes($name))))->find()){
                return false;
            }
        }
        return true;
    }
    
    /**
     * 通过名称获取拼音
     */
    public function fomartNameToPinYin(){
        vendor('Vendor.PinYin',APP_PATH."admin");
        $params = I("post.info",array());
        return \Admin\Vendor\PinYin::utf8_to($params['name']);
    }
    /**
     * 統計总数
     */
    public function getCount(){
        return $this->where(array('is_del'=>0))->count();
    }
    /**
     * 获取分页情况
     * @param unknown $page
     * @param unknown $pagesize
     */
    public function getClassifyPageInfo($page,$pagesize){
       return $this->where(array('is_del'=>0))->order('sort asc,id desc')->page($page,$pagesize)->select();
    }
    /**
     * 获取可用的分类
     */
    public  function  getUsedList(){
        return $this->where(array('is_use'=>1,'is_del'=>0))->order('sort asc,id desc')->select();
    }
    
    
}