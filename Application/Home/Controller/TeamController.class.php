<?php 

namespace Home\Controller;
use Think\Controller;
class TeamController extends Controller {

	public function index(){
		# code...
		$data=M('group')->select();
		foreach ($data as $key => $value) {
			$data[$key]['skill']=explode(',', $value['skill']);
		}
		$this->assign('team',$data);
		$this->assign('skill' , $skill);
		$this->assign('active','team');
		$this->display();
	}

	public function team_info(){
		if (I('id')!= " ") {
			$map['id']=I('id');
			$data=M('group')->where($map)->find();
			$data['skill']=explode(',', $data['skill']);
			$per=$this->get_team_per(I('id'));
			$pro=$this->get_team_project(I('id'));
			$data['per_num']=count($per);
			$data['per_info'] = $per;
			$data['pro_num']= count($pro);
			$data['pro_info'] = $pro;
			$this->assign('info',$data);
			$this->display();
		}
	}

	public function team_creat()
	{
		if (IS_POST) {
			$array=C('PICTURE_UPLOAD');
			$Group=M('group');
			$have=$Group->where('name="'.I('groupname').'"')->find();
			if ($have) {
				$this->error('名称已存在,请重新输入');
			}else{
					$data = array(
						'name' => I('groupname'), 
						'declare' => I('declare'),
						'skill'=>implode(',',(array)I('skill')),
						'info' => I('info'),
						'img' => __ROOT__.'/'.$array['rootPath'].I('url'),
						'create_time' => time(),
						'create_person' => session('stunum')
					);
					$flag=$Group->add($data);
					if ($flag) {
						$map['stunum']=session('stunum');
						$save['leader'] = 1;
						$save['group']=$flag;
						$save['jointime']=time();
						if(M('author')->where($map)->save($save)){
							session('leader',1);
							$this->success('创建成功！',U('Index/index'));
						}else{
							$this->error('创建失败！');
						}
					}else{
						$this->error('创建失败！');
					}
			}
		}else{
			$skill=M('skill')->select();
            $this->assign('skill',$skill);
			$this->display('creat_team');
		}
	}

	//获取团队成员
	public function get_team_per($id)
	{
		$map['group']=$id;
		$num=M('author')->where($map)->getField('stunum,authorname,img,info,skill');
		return $num;
	}
	//获取团队项目
	public function get_team_project($id)
	{
		# code...
		$map['group']=$id;
		$num=M('project')->where($map)->select();
		return $num;
	}

	//点赞
	public function add_praise(){
		if (IS_POST) {
			$map['id']=I('id');
			$stu=I('stu');
			$data['praise'] = M('group')->where($map)->getField('praise');
			$data['praise']++;
			$flag=M('group')->where($map)->save($data);
			if ($flag) {
				# code...
				$array = array('group' => $map['id'], 'stu'=>$stu);
				M('praise')->add($array);
				echo $data['praise'];
			}else{
				echo "error";
			}
		}
	}

	public function apply_team()
	{
		if (IS_POST) {
			$map['id']=I('id');
			$stu=I('stu');
		
			$array = array('gid' => $map['id'], 'stu'=>$stu,'apply_time'=>time());
			$flag=M('apply_group')->add($array);
			if ($flag) {
				# code...
				echo "success";
			}else{
				echo "error";
			}
		}
	}
}
