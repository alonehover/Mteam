<?php
namespace Home\Controller;
use Think\Controller;
use Think\Image;
/**
 * 文件控制器
 * 主要用于下载模型的文件上传和下载
 */
class FileController extends Controller {


    /**
     * 上传图片
     * @author ah
     */
    public function uploadPicture(){

        if (!empty($_FILES)) {
            $setting=C('PICTURE_UPLOAD');

            // 实例化上传类
            $upload = new \Think\Upload($setting);
            $info   =   $upload->upload();    
            die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            // if($info){
            //         /* 记录文件信息 */
            //         foreach ($info as $value) {
            //             //在模板里的url路径
            //             $return['filename']=$value['savename'];
            //             $return['url']= substr($setting['rootPath'],0).$value['savepath'].$value['savename'];
            //             $return['s_url']=substr($setting['rootPath'],0).$value['savepath'].'s_'.$value['savename'];
            //             //文件存放的路径
            //             $return['path'] = substr($setting['rootPath'],0).$value['savepath']; 
            //             $return['status'] = 1;
            //             $return = array_merge($info['download'], $return);
            //         }
            //         /*生成缩略图*/
            //         $image = new Image();
            //         $image->open($return['url'])->thumb(400,400)->save($return['s_url']);
            //     }else {
            //         $return['status'] = 0;
            //         $return['info']   = $upload->getError();
            //     }
            // echo $info;
            /* 返回JSON数据 */
            // $this->ajaxReturn($return);
            // echo json_encode($return);  //两种方式
            // die('{"jsonrpc" : "2.0", "result" : $return, "id" : "id"}');
        }
    }

    /**
     * 图片删除
     * @param  [type]  $path   [待删除目录路径]
     * @param  boolean $delDir [是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）]
     * @return [type]          [description]
     */
    public function delDirAndFile($path,$delDir = FALSE) {

    //判断变量类型是否为数组类型。
    if (is_array($path)) {
        foreach ($path as $subPath)
            $this->delDirAndFile($subPath, $delDir);
    }else{
    // is_dir() 函数检查指定的文件是否是目录。
    if (is_dir($path)) {
        /*opendir() 函数打开一个目录句柄，若成功，则该函数返回一个目录流，否则返回 false 以及一个 error*/
        $handle = opendir($path);
        if ($handle) {
            /*readdir() 函数返回由 opendir() 打开的目录句柄中的条目。
                若成功，则该函数返回一个文件名，否则返回 false。
            */
            while (false !== ( $item = readdir($handle) )) {
                if ($item != "." && $item != "..")
                    is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
            }
            closedir($handle);
            if ($delDir)
                return rmdir($path);
        }
    } else {
        if (file_exists($path)) {
           if(unlink($path)){
                clearstatcache();
                return true;
           }else{
                return false;
           }
        } else {
            return false;
        }
    }
    }
    }
}
