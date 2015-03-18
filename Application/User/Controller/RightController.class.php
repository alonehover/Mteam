<?php
namespace User\Controller;
use Think\Controller;
class RightController extends Controller {
    public function list_right(){
    	$data=M('auth_rule')->select();
    	$this->assign('list_rule',$data);
    	$this->display();
    }

    public function add_right(){
    	# code...
    	$this->display();
    }

    public function list_role(){
    	# code...
        $data=M('auth_group')->select();
        $this->assign('list_role',$data);
    	$this->display();
    }

    public function add_role(){
        # code...
        $this->display();
    }

    public function add_role_action(){

        if (isset($_POST)) {
            $data=array(
                'title'  => I('role_name'),
                'status' => I('status_role'),
                'desc'   => I('role_desc')
                );
            $sel=M('auth_group')->where(array('title'=>I('role_name')))->find();
            if (!$sel) {
                $flag=M('auth_group')->add($data);
                if ($flag) {
                    $this->success('添加成功！',U('User/Right/list_role'));
                }else{
                    $this->error('添加失败，请重试！');
                }
            }else{
                $this->error('添加失败，角色已存在！');
            }
        }
           
    }

    public function edit_role_right(){
        # code...
        
    }
}