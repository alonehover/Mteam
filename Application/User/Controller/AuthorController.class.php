<?php
namespace User\Controller;
use User\Controller\CommonController;
class AuthorController extends CommonController {
    public function list_user(){
    	$data=M('author')->select();
    	$sum=M('author')->count();
    	$this->assign('user_sum',$sum);
    	$this->assign('authors',$data);
    	$this->display();
    }

    public function add_user(){
    	# code...
        if (IS_POST) {
            # code...
            $data = array(
                'stunum' => I('stunum'),
                'authorname' => I('username'),
                'password' => MD5(I('password')),
                'sex' => I('sex'),
                'email' => I('email'),
                'skill' => implode(',',(array)I('skill')),
                'info'  => I('info'),
                'logintime' => time(),
             );
            $flag=M('author')->add($data);
            if ($flag) {
                # code...
                $this->success('添加成功！',U('User/Author/list_user'));
            }else{
                $this->error('添加失败！');
            }
        }else{
            $skill=M('skill')->select();
            $this->assign('skill',$skill);
            $this->display();
        }

    }


    public function del_user(){
        # code...
        if (IS_POST) {
            # code...
            $data['id']=I('id');
            $flag=M('author')->where($data)->delete();
            if ($flag) {
                # code...
                echo json_encode(1);
            }else{
                echo json_encode(0);
            }
        }
    }

    public function change_pwd(){
      if(IS_POST){
        $map['stunum']=session('stunum');
        $map['password']=md5(I('oldpwd'));
        $flag=M('author')->where($map)->getField('id');
        if($flag){
          $map['password']=md5(I('newpwd'));
          $map['id']=$flag;
          if(M('author')->save($map)){
            $this->success('修改成功！');
          }else{
            $this->error('修改失败~');
          }
        }
      }
    }
}
