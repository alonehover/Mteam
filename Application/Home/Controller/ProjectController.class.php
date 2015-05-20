<?php

namespace Home\Controller;
use Home\Controller\CommonController;

class ProjectController extends CommonController {

	public function index()
	{
		# code...
		$data=M('project')->select();
		foreach ($data as $key => $value) {
			$data[$key]['skill']=explode(',', $value['skill']);
		}
		$this->assign('list',$data);
		$this->assign('active','project');
		$this->display();
	}

	public function get_info()
	{
		# code...
		$map['id']=I('id');
		$info=M('project')->where($map)->getField('desc');
		echo $info;
	}

	public function apply_project()
	{
		# code...
		if (IS_POST) {
			$map['id']=I('id');
			$stu['stunum']=I('stu');
			$group=M('author')->where($stu)->getField('group');
			if ($group) {
				$array = array('pid' => $map['id'], 'gid'=>$group,'apply_time'=>time());
				$flag=M('apply_project')->add($array);
				if ($flag) {
					$map['status']='2';
					$s=M('project')->save($map);
					echo "success";
				}else{
					echo "error";
				}
			}else{
				echo "没有加入团队，不能申请项目";
			}
		}
	}
}
 ?>
