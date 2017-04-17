<?php
/**
 *简单处理字符串
 * @param unknown $str
 */
function filterString($str){
	return addslashes(trim($str));
}
/**
 * 简单读入缓存
 * @param unknown $filename
 * @param unknown $data array
 * @param unknown $filepath
 */
function setCache($filename,$data,$filepath){
    if(!is_array($data)){
       return false; 
    }
    $arrStr ="<?php\r\nreturn array(\r\n";
    foreach ($data as $k=>$v){
        $arrStr.="'".$k."'=>'".$v."',\r\n";
        C($k,$v);
    }
    $arrStr .=");";
   
    return file_put_contents($filepath.$filename.".php",$arrStr);
}

