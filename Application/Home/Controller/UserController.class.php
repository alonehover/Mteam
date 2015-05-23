<?php
namespace Home\Controller;
use Home\Controller\CommonController;
class UserController extends CommonController {
  public function show(){

    $data['id']=session('uid');
    $info = M('author')->where($data)->find();
    // dump($info);
    $skill=M('skill')->select();
    $this->assign('skill',$skill);
    $this->assign('info',$info);
    $this->display('Index/userinfo');
  }

  public function edit(){
      if (IS_POST) {
          # code...
          $data = array(
              'id' => session('uid'),
              'authorname' => I('username'),
              'password' => MD5(I('password')),
              'sex' => I('sex'),
              'skill' => implode(',',(array)I('skill')),
              'info'  => I('info'),
           );
          $flag=M('author')->save($data);
          if ($flag) {
              $this->success('修改成功！');
          }else{
              $this->error('修改失败！');
          }
      }
  }
}
