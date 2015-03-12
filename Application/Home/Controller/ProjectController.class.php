<?php 

namespace Home\Controller;
use Think\Controller;
class ProjectController extends Controller {

	public function index()
	{
		# code...
		$this->assign('active','project');
		$this->display();
	}
}
 ?>