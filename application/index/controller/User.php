<?php

namespace app\index\controller;

use think\Controller;
use think\Session;

use app\common\model\User as UserM;

class User extends Controller 
{
    /**
     * 登陆校验
     */
    public function login() {
        $data = input('post.');

        $valiRes = $this->validate($data, 'User.login');
        if($valiRes !== true) {
            $this->error($valiRes);
        }

        $userInfo = UserM::where('username', $data['username'])->find();
        if(!$userInfo) {
            $this->error('账号不存在!');
        }
        if($userInfo->password !== md5($data['password'])) {
            $this->error('密码错误!');
        }
        
        $userInfo->login_ip = getIp();
        $userInfo->login_time = time();
        $userInfo->save();

        Session::set('user', $userInfo->name, 'index');
        Session::set('user_id', $userInfo->id, 'index');
        Session::set('user_email', $userInfo->email, 'index');
        $this->success('欢迎');
    }

    /**
     * 注册页面
     */
    public function register() {
        return $this->fetch();
    }

    /**
     * 添加用户
     */
    public function createUser() {
        $data = input('post.');

        // 验证数据
        $valiRes = $this->validate($data, 'User.register');
        if($valiRes !== true) {
            $this->error($valiRes);
        }  

        // 处理数据
        $data['create_time'] = time();
        $data['update_time'] = time();
        $data['status'] = 1;
        $data['password'] = md5($data['password']);
        unset($data['captcha']);

        // 插入数据
        $res = UserM::insert($data);
        if($res) {
            $this->success('注册成功，即将跳转到主页...', 'Index/index');
        }else {
            $this->error('创建用户失败，请重试');
        }
    }
}