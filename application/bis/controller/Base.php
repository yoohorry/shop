<?php

namespace app\bis\controller;

use think\Controller;
use think\Session;

class Base extends Controller
{
    /**
     * 初始化方法：登陆验证
     */
    public function _initialize()
    {
        $hasId = Session::has('dealer_id', 'dealer');
        $hasName = Session::has('dealer_name', 'dealer');
        if(!$hasId || !$hasName) {
            $this->error('请先登陆！', 'User/login');
        }
    }
}
