<?php
/**
 * 图片处理
 * @param unknown $data
 */
function formatLogicImage($data){
    if($data){
        foreach ($data as $k=>$v){
            $filepath = C("UPLOAD_DIR").$v['image_address'];
            if(file_exists($filepath)){
                $basename = substr($filepath,0,strripos($filepath,'.'));
                $ext = substr($filepath,strripos($filepath,'.'));
                $data[$k]['medium']=$basename.".medium".$ext;
                $data[$k]['small']=$basename.".small".$ext;
            }
        }
    }
    return $data;
}