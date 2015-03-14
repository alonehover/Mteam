<?php
namespace User\Controller;
use Think\Controller;
class TeamController extends Controller {
    public function list_all(){
    	$this->display('Team/list_all');
    }
}