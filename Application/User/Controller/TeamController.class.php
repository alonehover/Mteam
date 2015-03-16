<?php
namespace User\Controller;
use Think\Controller;
class TeamController extends Controller {
    public function list_all(){
    	$data=M('auther')->select();
    	$this->assign('teams',$data);
    	$this->display('Team/list_all');
    }
}