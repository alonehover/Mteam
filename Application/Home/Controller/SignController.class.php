<?php

/**
 * 登录注册
 */

namespace Home\Controller;
use Think\Controller;
class SignController extends Controller {
	/**
	 * 登录
	 */
  	public function signin()
	{
		$this->display('sign_in');
	}

	/**
	 * 登录处理
	 */
	public function signin_action()
	{
		if(isset($_POST)){
			$data = array(
				'password' => md5(I('password')),
				'stunum' => I('stunum'),
			);
			$flag=$this->check_stunum(I('stunum'));
			if($flag){
				$result=M('author')->where($data)->find();
				if($result){
					session('leader',$result['leader']);
					session('stunum',I('stunum'));
          session('uid',$result['id']);
					$this->success('欢迎进入MGroup!',U('Home/Index/index'));
				}else{
					$this->error('密码错误，请重新输入');
				}
			}else{
				$this->error('用户不存在，请先注册！');
			}
		}
	}

	/**
	 * 注册
	 */
	public function signup()
	{
		$this->display('sign_up');
	}

	/**
	 * 注册处理
	 */
	public function signup_action()
	{
		if(!IS_POST) $this->error('页面不存在');
		if(isset($_POST)){
			$data = array(
				'password' 	=> MD5(I('password')),
				'stunum' 	=> I('stunum'),
				'email'		=> I('email'),
				'logintime' => time(),
			);
			$flag=$this->check_stunum(I('stunum'));
			if($flag){
				$this->error('学号已存在');
			}else{
				$status=M('author')->add($data);
				$this->success('恭喜你，注册成功~ 快去登录吧',U('Home/Sign/signin'));
			}
		}
	}
	/**
	 * 退出
	 */
	public function signout(){
		session(null);
		$this->success('正在注销账户，感谢您的使用',U('Home/Index/index'));
	}

	/**
	 * 验证学号是否存在
	 */
	public function check_stunum($val)
	{
		$str = array('stunum' => $val);
		$flag=M('author')->where($str)->select();
		$result = ($flag) ? 1 : 0 ;		//已存在输出1
		return $result;
	}

}
