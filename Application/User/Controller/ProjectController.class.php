<?php
namespace User\Controller;
use Think\Controller;
class ProjectController extends Controller {
    public function list_project(){
    	$this->display();
    }

    public function list_project_apply(){
    	# code...
    	$this->display('list_apply');
    }

    public function add_project(){
    	# code...
    	$this->display();
    }
}