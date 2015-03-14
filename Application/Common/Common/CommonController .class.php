<?php
 namespace Common\Controller;
 use Think\Controller;
 class CommonController extends Controller {
    public function _initialize () {
        $AUTH = new \Think\Auth();
        //类库位置应该位于ThinkPHP\Library\Think\
        if(!$AUTH->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, session('uid'))){
            $this->error('没有权限');
        }
    }
 }