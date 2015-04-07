<?php
namespace User\Controller;
use Think\Controller;
class CommonController extends Controller {
  public function _initialize(){
  		//验证登陆,没有登陆则跳转到登陆页面
  		if(empty($_SESSION['stunum'])){
  			$this->redirect('Home/Sign/signin');
  		}

  		//权限验证
  		if(!authCheck(MODULE_NAME."/".CONTROLLER_NAME."/".ACTION_NAME,session('uid'))){
  			$this->error('你没有权限!');
  		}

  	}
}
