<?php 

namespace Home\Controller;
use Think\Controller;
class TeamController extends Controller {

	public function index(){
		# code...
		$this->assign('active','team');
		$this->display();
	}

	public function team_info(){
		$this->display();
	}

	public function team_creat()
	{
		# code...
		if (IS_POST) {
			# code...
			p($_POST);
		}else{
			$this->display('creat_team');
		}
	}
}
 ?>