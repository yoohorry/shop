<?php

namespace app\admin\model;

use think\Model;
use think\Session;

class Admin extends Model
{
    /**
     * 用户信息验证
     * 
     * @return int
     */
    public function login($adminInfo) {
        // 获取用户信息
        $admin = $this->where('username', $adminInfo['username'])->find();
        if(!$admin) {
            return -1;
        }
        // 核对密码
        if($admin->password != md5($adminInfo['password'])) {
            return -2;
        }
        // Session写入
        Session::set('admin_id', $admin->id, 'admin');
        Session::set('admin_name', $admin->name, 'admin');
        Session::set('admin_login_ip', $admin->login_ip, 'admin');
        Session::set('admin_login_time', $admin->login_time, 'admin');
        // 数据写入
        $admin->create_time = time();
        $admin->update_time = time();
        $admin->login_ip = getIp();
        $admin->login_time = time();
        $admin->save();
        // 返回1代表成功
        return 1;
    }
}
