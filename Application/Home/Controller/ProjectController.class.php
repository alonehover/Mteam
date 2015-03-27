<?php 

namespace Home\Controller;
use Think\Controller;
class ProjectController extends Controller {

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
}
 ?>