<?php
/**
 * 图片处理
 * @param unknown $data
 */
function formatLogicImage($data){
    if($data){
        if(is_array($data[0])){
            foreach ($data as $k=>$v){
                $filepath = C("UPLOAD_DIR").$v['image_address'];
                if(file_exists($filepath)){
                    $basename = substr($filepath,0,strripos($filepath,'.'));
                    $ext = substr($filepath,strripos($filepath,'.'));
                    $data[$k]['medium']=$basename.".medium".$ext;
                    $data[$k]['small']=$basename.".small".$ext;
                }
            }
        }else{
            $filepath = C("UPLOAD_DIR").$data['image_address'];
            if(file_exists($filepath)){
                $basename = substr($filepath,0,strripos($filepath,'.'));
                $ext = substr($filepath,strripos($filepath,'.'));
                $data['medium']=$basename.".medium".$ext;
                $data['small']=$basename.".small".$ext;
            }
        }
        
    }
    return $data;
}

/**
 * 通过名称获取拼音
 */
function fomartNameToPinYin(){
    vendor('Vendor.PinYin',APP_PATH."admin");
    $params = I("post.info",array());
    return \Admin\Vendor\PinYin::utf8_to($params['name']);
}

