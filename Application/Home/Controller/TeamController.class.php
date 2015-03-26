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
			$array=C('PICTURE_UPLOAD');
			$group=M('group');
			$have=$group->where('name="'.I('groupname').'"')->find();
			if ($have) {
				# code...
				$this->error('名称已存在,请重新输入');
			}else{
					$data = array(
						'name' => I('groupname'), 
						'declare' => I('declare'),
						'info' => I('info'),
						'img' => __ROOT__.'/'.$array['rootPath'].I('url'),
						'creat_time' => time()
					);
					$flag=M('group')->add($data);
					if ($flag) {
						# code...
						$map['stunum']=session('stunum');
						$save['leader'] = 1;
						M('author')->where($map)->save($save);
						$this->success('创建成功！');
					}else{
						$this->error('创建失败！');
					}

			}

		}else{
			$this->display('creat_team');
		}
	}
}
 ?>