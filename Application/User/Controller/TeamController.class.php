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
    	$this->display();
    }
}