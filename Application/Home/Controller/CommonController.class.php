<?php
namespace Home\Controller;
use Think\Controller;
Class CommonController extends Controller{

  public function _initialize(){
    if(null!=session('stunum')){
      $get_str = 'id,stunum,authorname,img,group,leader';
      $map['stunum']=session('stunum');
      $user_info = M('author')->where($map)->field($get_str)->find();
      $this->assign('MYINFO',$user_info);
    }
  }
}
