<?php
namespace Home\Controller;
use Think\Controller;
class SignController extends Controller {
	/**
	 * 登录
	 */
  	public function signin()
	{
		# code...
		$this->display('sign_in');
	}  

	public function signin_action()
	{
		# code...
		p($_POST);
	}

	/**
	 * 注册
	 */
	public function signup()
	{
		# code...
		$this->display('sign_up');
	}
	public function signup_action()
	{
		# code...
		if(!IS_POST) halt('页面不存在');
		p($_POST);
	}
}