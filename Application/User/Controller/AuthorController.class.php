<?php
namespace User\Controller;
use Think\Controller;
class AuthorController extends Controller {
    public function list_user(){
    	$data=M('author')->select();
    	$sum=M('author')->count();
    	$this->assign('user_sum',$sum);
    	$this->assign('authors',$data);
    	$this->display();
    }

    public function add_user(){
    	# code...
    	$this->display();
    }
}