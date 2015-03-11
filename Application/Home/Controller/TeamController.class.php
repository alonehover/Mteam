<?php 

namespace Home\Controller;
use Think\Controller;
class TeamController extends Controller {

	public function index()
	{
		# code...
		$this->assign('active','team');
		$this->display();
	}


}
 ?>