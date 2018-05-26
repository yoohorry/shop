<?php

namespace app\admin\controller;

use think\Controller;
use think\Session;

class Base extends Controller
{
    /**
     * 初始化方法：登陆验证
     */
    public function _initialize()
    {
        $hasId = Session::has('admin_id', 'admin');
        $hasName = Session::has('admin_name', 'admin');
        if(!$hasId || !$hasName) {
            $this->error('请先登陆！', 'User/login');
        }
    }
}
