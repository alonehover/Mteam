<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$data=M('group')->order('praise')->limit(8)->select();
		foreach ($data as $key => $value) {
			$data[$key]['skill']=explode(',', $value['skill']);
		}
		$this->assign('team',$data);
    	$this->assign('active','index');
       	$this->display();
    }
}