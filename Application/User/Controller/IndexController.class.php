<?php
namespace User\Controller;
use Think\Controller;

class IndexController extends Controller {
    public function index(){
    	$aut_num=M('author')->count();
    	$pro_num=M('project')->count();
    	$gro_num=M('group')->count();
    	$this->assign('aut_num',$aut_num);
    	$this->assign('pro_num',$pro_num);

    	$this->display('Index/index');
    }
}