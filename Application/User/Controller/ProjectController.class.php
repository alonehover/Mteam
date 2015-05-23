<?php
namespace User\Controller;
use User\Controller\CommonController;
class ProjectController extends CommonController {
    public function list_project(){
        $data=M('project')->select();
        $this->assign('project',$data);
    	  $this->display();
    }

    public function list_project_apply(){
        $List=D('ApplyProject');
        $list=$List->relation(true)->select();
        $this->assign('list',$list);
    	  $this->display('list_apply');
    }

    public function add_project(){
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

    public function pass_status(){
      if(IS_POST){
        $data['id']=I('id');
        $data['status']=1;
        $flag=M('apply_project')->save($data);
        if($flag){
          echo 1;
        }else{
          echo "error";
        }
      }
    }
    public function del_status(){
      if(IS_POST){
        $data['id']=I('id');
        $data['status']=2;
        $flag=M('apply_project')->save($data);
        if($flag){
          echo 2;
        }else{
          echo "error";
        }
      }
    }

}
