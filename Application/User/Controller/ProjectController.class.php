<?php
namespace User\Controller;
use Think\Controller;
class ProjectController extends Controller {
    public function list_project(){
        $data=M('project')->select();
        $this->assign('project',$data);
    	$this->display();
    }

    public function list_project_apply(){
    	# code...
    	$this->display('list_apply');
    }

    public function add_project(){
    	# code...
        if (IS_POST) {
           $data = array(
                'name'=> I('project_name'),
                'skill'=>implode(',',(array)I('skill')),
                'apply_endtime' => strtotime(I('apply_end')),
                'project_endtime' => strtotime(I('project_end')),
                'status' => I('status'),
                'desc' => I('project_desc'),
                'public_time' => time(),
            );
            $flag=M('project')->add($data);
            if ($flag) {
                # code...
                $this->success('添加成功！',U('User/Project/list_project'));

            }else{
                $this->error('添加失败！');
            }
        }else{
            $skill=M('skill')->select();
            $this->assign('skill',$skill);
            $this->display();
        }
        
    }


}