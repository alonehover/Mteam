<?php
namespace User\Controller;
use Think\Controller;
class RightController extends UserController {
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
        if(isset($_POST['rules'])){
            sort($_POST['rules']);
            $_POST['rules']  = implode( ',' , array_unique($_POST['rules']));
        }

        $AuthGroup   =  M('auth_group');

            if ( empty($_POST['id']) ) {
                $r = $AuthGroup->add($_POST);
            }else{
                $r = $AuthGroup->save($_POST);
            }

            if($r===false){
                $this->error('操作失败');
            } else{
                $this->success('操作成功!',U('list_role'));
            }
    }


    public function del_role(){
        if (IS_POST) {
            $data['id']=I('id');
            $flag=M('auth_group')->where($data)->delete();
            if ($flag) {
                echo json_encode(1);
            }else{
                echo json_encode(0);
            }
        }
    }


    /**
     * 访问授权页面
     */
    public function access(){
        // $this->updateRules();
        // p(I('group_id'));
        $auth_group = M('auth_group')->where( array('status'=>array('egt','0')) )->getfield('id,title,rules');
        $node_list   = $this->returnNodes();
        // $map         = array('module'=>'admin','type'=>AuthRuleModel::RULE_MAIN,'status'=>1);
        $main_rules  = M('auth_rule')->where($map)->getField('name,id');
        // $map         = array('module'=>'admin','type'=>AuthRuleModel::RULE_URL,'status'=>1);
        $child_rules = M('AuthRule')->where($map)->getField('name,id');
        // p($node_list);
        $this->assign('main_rules', $main_rules);
        $this->assign('auth_rules', $child_rules);
        $this->assign('node_list',  $node_list);
        // $this->assign('auth_group', $auth_group);
        $this->assign('this_group', $auth_group[(int)$_GET['group_id']]);
        $this->display();
    }
}