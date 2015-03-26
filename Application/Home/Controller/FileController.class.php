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

            /* 返回JSON数据 */
            $this->ajaxReturn($info);
            // echo json_encode($info);  //两种方式
            // die('{"jsonrpc" : "2.0", "result" : $info, "id" : "id"}');
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
