<?php
namespace Admin\Controller;
/**
 * 图片上传类
 * @author admin
 *
 */
class AttachmentController extends BaseController{
    public function upload(){
        $res['status'] = false;
        if(!isset($_FILES['file']) || empty($_FILES['file'])){
           $res['message'] = L('PLEASE_UPLOAD_PICTURES'); 
        }else{
            $temp_image = $_FILES['file'];
            /* $image_allowext = explode("|",C("IMAGES_ALLOWEXT"));
            $image_allow_size = intval(C("IMAGES_SIZE")) * 1024*1024;
            $image_type = substr($temp_image['type'],strripos($temp_image['type'],"/")+1);
            $image_size =$temp_image['size'];
            if(!in_array($image_type)){
                $res['message'] = L('PICTURE_FORMAT_ERROR');
            }elseif($image_allow_size < $image_size){
                $res['message'] = L('PICTURE_SIZE_BEYOND_LIMIT');
            }else{
                
            } */

            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = intval(C("IMAGES_SIZE")) * 1024*1024;
            $upload->exts  = explode("|",C("IMAGES_ALLOWEXT"));// 设置附件上传类型
            $upload->rootPath = C('UPLOAD_DIR');
            $upload->subName = date("Ymd");// 设置附件上传目录
            $upload->replace = true;//同名覆盖
            $upload->autoSub = true;//自动创建子目录
            if($info = $upload->upload()){
                $res['status'] = true;
                $res['message'] = $info;
            }else{
                $res['message'] = $upload->getError();
            }
        }
       $this->ajaxReturn($res);
    }
    
    public function formatWidthHeight($file){
        $filePath = C("UPLOAD_DIR").$file['savepath'].$file['name'];
        if(!file_exists($filePath)){
            return array('status'=>false,'message'=>L("PICTURE_DOES_NOT_EXIST"));
        }
        list($width,$height)= getimagesize($filePath);
        
    }
}