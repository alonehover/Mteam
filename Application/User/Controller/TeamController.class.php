<?php
namespace User\Controller;
use Think\Controller;
class TeamController extends Controller {
    public function list_team(){
    	$data=M('group')->select();
    	$this->assign('teams',$data);
    	$this->display();
    }

    public function list_apply(){
    	# code...
    	// $list=M('apply_group')->select();
        $list=D('ApplyGroup')->relation(true)->select();
    	$this->assign('list',$list);
    	$this->display();
    }
}