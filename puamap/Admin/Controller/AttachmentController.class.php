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
            /*$temp_image = $_FILES['file'];
             $image_allowext = explode("|",C("IMAGES_ALLOWEXT"));
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
                $res = $this->formatWidthHeight($info['file']);
            }else{
                $res['message'] = $upload->getError();
            }
        }
       $this->ajaxReturn($res);
    }
    /**
     * 图片宽高限制
     * @param unknown $file
     */
    public function formatWidthHeight($file){
        $filePath = C("UPLOAD_DIR").$file['savepath'].$file['savename'];
        if(!file_exists($filePath)){
            return array('status'=>false,'message'=>L("PICTURE_DOES_NOT_EXIST"));
        }

        $res['status'] = true;
        if(C("IMAGES_RATIO")){
        	list($width,$height)= getimagesize($filePath);
        	list($radio_width,$radio_height) = explode(":",C("IMAGES_RATIO"));
        	$real_radio = $width / $height;
        	$radio_radio = $radio_width / $radio_height;
        	if($real_radio > $radio_radio && (($width - $height * $radio_radio) > 10)){
        		$res['status'] = false;
        		$res['message'] = L("WIDTH_OUT_OF_PROPORTION");
        	}else if($real_radio < $radio_radio && ($height - $width / $radio_radio) > 10){
        		$res['status'] = false;
        		$res['message'] = L("HEIGHT_OUT_OF_PROPORTION");
        	}
        }
	    if(!$res['status']){
	       unlink($filePath);
	    }else{
	    	$this->makeFilterWaterMark($filePath);
	    }
        return $res;
    }
    /**
     * 加水印条件过滤
     */
    public function makeFilterWaterMark($filePath){
    	$enable_water_mark = false;
    	if(file_exists($filePath)){
	    	if(C("WATER_ISWATERMARK") && file_exists(C("WATER_PATH"))){
	    		list($width,$height)= getimagesize($filePath);
	    		list($water_width,$water_height) = getimagesize(C("WATER_PATH"));
	    		if($water_width < $width && $water_height < $height){
	    			if(C("IMAGE_MINWIDTH") && C("IMAGE_MINHEIGHT")){
	    				if($width > C("IMAGE_MINWIDTH") && height > C("IMAGE_MINHEIGHT")){
	    					$enable_water_mark = true;
	    				}
	    			}else{
	    				$enable_water_mark = true;
	    			}
	    		}
	    	}
    	}
    	if($enable_water_mark){
    		$this->addWaterMark($filePath);
    	}
    }
    /**
     * 添加水印
     * @param unknown $filePath
     */
    public function addWaterMark($filePath){
    	$position = C("UPLOAD_WATER_PLACE") ? C("UPLOAD_WATER_PLACE") : 1 ;
    	list($resource_width,$resource_height,$resource_type) = getimagesize($filePath);
    	list($dist_width,$dist_height,$dist_type) = getimagesize(C("WATER_PATH"));
    	//1 = GIF，2 = JPG，3 = PNG，4 = SWF，5 = PSD，6 = BMP，7 = TIFF(intel byte order)，8 = TIFF(motorola byte order)，9 = JPC，10 = JP2，11 = JPX，12 = JB2，13 = SWC，14 = IFF，15 = WBMP，16 = XBM
    	switch ($resource_type){
    		case 1:
    			$resource_image = imagecreatefromgif($filePath);
    			break;
    		case 2:
    			$resource_image = imagecreatefromjpeg($filePath);
    			break;
    		case 3:
    			$resource_image = imagecreatefrompng($filePath);
    			break;
    		default:
    			$resource_image = null;
    			break;
    	}
    	switch ($dist_type){
    		case 1:
    			$dist_image = imagecreatefromgif(C("WATER_PATH"));
    			break;
    		case 2:
    			$dist_image = imagecreatefromjpeg(C("WATER_PATH"));
    			break;
    		case 3:
    			$dist_image = imagecreatefrompng(C("WATER_PATH"));
    			break;
    		default:
    			$dist_image = null;
    			break;
    	}
    	
    	if($dist_image && $resource_image){
    		$position_x = 0;
    		$position_y = 0;
    		switch ($position){
    			case 1://上左
    				$position_x = 0;
    				$position_y = 0;
    				break;
    			case 2://上中
    				$position_x = ($resource_width -$dist_width) / 2;
    				$position_y = 0;
    				break;
    			case 3://上右
    				$position_x = $resource_width -$dist_width;
    				$position_y = 0;
    				break;
    			case 4://中左
    				$position_x = 0;
    				$position_y = ($resource_height - $dist_height) / 2;
    				break;
    			case 5://正中
    				$position_x = ($resource_width -$dist_width) / 2;
    				$position_y = ($resource_height - $dist_height) / 2;
    				break;
    			case 6://中右
    				$position_x = ($resource_width -$dist_width) / 2;
    				$position_y = ($resource_height - $dist_height) / 2;
    				break;
    			case 7://下左
    				$position_x = 0;
    				$position_y = $resource_height - $dist_height;
    				break;
    			case 8://下中
    				$position_x = ($resource_width -$dist_width) / 2;
    				$position_y = $resource_height - $dist_height;
    				break;
    			case 9://下右
    				$position_x = $resource_width -$dist_width;
    				$position_y = $resource_height - $dist_height;
    				break;
    		}
    		$alpha = C("WATER_TRANS") ? C("WATER_TRANS")  : 0;
    		imagecopymerge($resource_image,$dist_image,$position_x,$position_y,0,0,$dist_width,$dist_height,$alpha);
    		switch ($resource_type){
    			case 1:
    				imagegif($resource_image,$filePath);
    				break;
    			case 2:
    			
    				imagejpeg($resource_image,$filePath);
    				break;
    			case 3:
    				imagepng($resource_image,$filePath);
    				break;
    		}
    		imagedestroy($resource_image);
    		imagedestroy($dist_image);
    	}
    }
    /**
     * 缩略图
     */
    public function addThumbImage(){
    	
    }
    
}