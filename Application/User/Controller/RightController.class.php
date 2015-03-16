<?php
namespace User\Controller;
use Think\Controller;
class RightController extends Controller {
    public function list_right(){
    	$data=M('auth_rule')->select();
    	$this->assign('list_rule',$data);
    	$this->display();
    }

    public function add_right(){
    	# code...
    	$this->display();
    }
}