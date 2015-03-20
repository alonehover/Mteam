<?php
namespace User\Controller;
use Think\Controller;
class SettingController extends Controller {
    public function list_menu(){
    	$menu=M('menu')->select();
    	$this->assign('menus',$menu);
    	$this->display();
    }


    public function add_menu(){
    	# code...
    	$this->assign('info',array('pid'=>I('pid')));
        $menus = M('menu')->field(true)->select();
        $menus = D('Common/Tree')->toFormatTree($menus);
        $menus = array_merge(array(0=>array('id'=>0,'title_show'=>'顶级菜单')), $menus);
        $this->assign('menus', $menus);
        $this->meta_title = '新增菜单';
        $this->display();
    }

    public function add_menu_action(){

    	if (isset($_POST)) {
    		$data = array(
    			'title' => I('menu_name'),
    			'url'   => I('menu_url'),
    			'sort'  => I('menu_sort'),
    			'hide'  => I('menu_hide'),
    			'is_right' => I('menu_right'),
    			'pid'   => I('menu_parent'),
    			'tip'   => I('menu_desc')
    			);

    		if ($data['is_right']==1) {
    			$flag_right=$this->add_menu_right($data);
    			if ($flag_right) {
    				$this->success('权限添加成功！');
    			}else{
    				$this->error('权限添加失败！');
    			}
    		}else{
    			$flag_menu=M('menu')->add($data);
    			$flag_right=$this->add_menu_right($data);
    			if ($flag_menu&&$flag_right) {
    				# code...
    				$this->success('菜单添加成功!',U('User/Setting/list_menu'));
    			}else{
    				$this->error('菜单添加失败！');
    			}
    		}
    	}
    }


    public function add_menu_right($data){
    	$right=array(
    			'name'  => $data['url'],
    			'title' => $data['title'],
    		);
    	$flag=M('auth_rule')->add($right);

    	return $flag?true:false;
    }


    public function del_menu(){
        if (IS_POST) {
            $data['id']=I('id');
            $flag=M('menu')->where($data)->delete();
            if ($flag) {
               echo json_encode(1);
            }else{
                echo json_encode(0);
            }
        }
    }

    public function edit_menu(){
        # code...
        $data['id']=I('id');
        $edit=M('menu')->where($data)->find();
        $this->assign('edit',$edit);
        $menus = M('menu')->field(true)->select();
        $menus = D('Common/Tree')->toFormatTree($menus);
        $menus = array_merge(array(0=>array('id'=>0,'title_show'=>'顶级菜单')), $menus);
        $this->assign('menus', $menus);
        $this->display();
    }

    public function edit_menu_action(){
        # code...
        if (IS_POST) {
            # code...
            $map['id']=I('id');
            $data = array(
                'title' => I('menu_name'),
                'url'   => I('menu_url'),
                'sort'  => I('menu_sort'),
                'hide'  => I('menu_hide'),
                'pid'   => I('menu_parent'),
                'tip'   => I('menu_desc')
                );
            $flag=M('menu')->where($map)->save($data);
            if ($flag) {
                # code...
                $this->success('修改成功！',U('User/Setting/list_menu'));
            }else{
                $this->error('修改失败，请重试！');
            }
        }
    }


    public function list_skill(){
        # code...
        $data=M('skill')->select();
        $this->assign('skill',$data);
        $this->display();
    }


    public function add_skill(){
        # code...
        if (IS_POST) {
            # code...
            $data = array('name' => I('skill_name'));
            $flag=M('skill')->add($data);
            if ($flag) {
                # code...
                $this->success('添加成功！',U('User/Setting/list_skill'));
            }else{
                $this->error('添加失败！');
            }
        }else{
            $this->display();
        }
    }

    public function edit_skill(){
        if (IS_POST) {
            # code...
            $map['id']=I('id');
            $data=array('name'=> I('name'));
            $flag=M('skill')->where($map)->save($data);
            if ($flag) {
                # code...
                echo json_encode(1);
            }else{
                echo json_encode(0);
            }
        }
        
    }

    public function del_skill(){
        if (IS_POST) {
            # code...
            $data['id']=I('id');
            $flag=M('skill')->where($data)->delete();
            if ($flag) {
               echo json_encode(1);
            }else{
                echo json_encode(0);
            }
        }
    }
}