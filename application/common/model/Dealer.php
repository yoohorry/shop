<?php

namespace app\common\model;

use think\Model;
use think\Session;

class Dealer extends Model
{
    /**
     * 注册时入库并且返回id
     * 
     * @param array $data 写入的数据
     * 
     * @return int 写入数据的主键id
     */
    public function register($data) {
        $this->allowField(true)->save($data);
        return $this->id;
    }

    /**
     * 根据状态值返回列表形式的数据
     */
    public static function getDealersByStatus($status) {
        $where = [
            'status' => $status,
        ];
        $order = [
            'update_time' => 'desc',
        ];
        return Self::where($where)->order($order)->paginate(5);
    }

    /**
     * 用户信息验证
     * 
     * @return int
     */
    public function login($dealerInfo) {
        // 获取用户信息
        $dealer = $this->where('username', $dealerInfo['username'])->find();
        if(!$dealer) {
            return -1;
        }
        // 核对密码
        if($dealer->password != md5($dealerInfo['password'])) {
            return -2;
        }
        // 确定用户是否过审
        if($dealer->status != 1) {
            return -3;
        }
        // Session写入
        Session::set('dealer_id', $dealer->id, 'dealer');
        Session::set('dealer_email', $dealer->email, 'dealer');
        Session::set('dealer_name', $dealer->name, 'dealer');
        Session::set('dealer_login_ip', $dealer->login_ip, 'dealer');
        Session::set('dealer_login_time', $dealer->login_time, 'dealer');
        // 数据写入
        $dealer->create_time = time();
        $dealer->update_time = time();
        $dealer->login_ip = getIp();
        $dealer->login_time = time();
        $dealer->save();
        // 返回1代表成功
        return 1;
    }
}
