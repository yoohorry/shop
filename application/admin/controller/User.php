<?php

namespace app\admin\controller;

use think\Controller;
use think\Session;

use app\admin\model\Admin; 

class User extends Controller
{
    /**
     * 登陆页面
     */
    public function login() {
        return $this->fetch();
    }

    /**
     * 验证用户
     */
    public function checkUser() {
        // 接收数据
        $adminInfo = input('post.');
        // 验证数据
        $valiRes = $this->validate($adminInfo, 'User.login');
        if($valiRes !== true) {
            $this->error($valiRes);
        }
        // 验证用户
        $adminModel = new Admin;
        $res = $adminModel->login($adminInfo);
        if($res === -1) {
            $this->error('用户不存在！');
        }elseif($res === -2) {
            $this->error('密码错误！');
        }else {
            $this->success('欢迎您，管理员。', 'Index/index');
        }
    }

    /**
     * 退出登陆
     */
    public function logout() {
        // 清除admin作用域下的session
        Session::clear('admin');
        $this->success('Good Bye！', 'User/login');
    }
}