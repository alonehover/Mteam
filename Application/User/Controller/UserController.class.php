<?php
namespace User\Controller;
use Think\Controller;
class UserController extends Controller {
    public function list_user(){
    	$data=M('auther')->select();
    	$sum=M('auther')->count();
    	$this->assign('user_sum',$sum);
    	$this->assign('authers',$data);
    	$this->display('User/list_user');
    }

    public function add_user(){
    	# code...
    	$this->display();
    }
}