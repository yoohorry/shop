<?php

namespace app\bis\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\common\model\City;
use app\common\model\Category;
use app\common\model\Dealer;

class User extends Controller
{
    /**
     * 登陆页面
     */
    public function login() {
        return $this->fetch();
    }

    /**
     * 登陆方法
     */
    public function checkUser() {
        // 接收数据
        $dInfo = input('post.');
        // 验证数据
        $valiRes = $this->validate($dInfo, 'User.login');
        if($valiRes !== true) {
            $this->error($valiRes);
        }
        // 验证用户
        $dModel = new Dealer;
        $res = $dModel->login($dInfo);
        if($res === -1) {
            $this->error('用户不存在！');
        }elseif($res === -2) {
            $this->error('密码错误！');
        }elseif($res === -3) {
            $this->error('您的账户还在审核，请耐心等待');
        }else {
            $this->success("欢迎您！", 'Index/index');
        }
    }

    /**
     * 注销方法
     */
    public function logout() {
        // 清除admin作用域下的session
        Session::clear('dealer');
        $this->success('Good Bye！', 'User/login');
    }

    /**
     * 注册页面
     */
    public function register() {
        // 获取一级城市和分类
        $cities = City::getUseableCity();
        $cates = Category::getUseableCate();
        return $this->fetch('', [
            'cities' => $cities,
            'cates' => $cates
        ]);
    }

    /**
     * 根据地址获取经纬度后
     * 发送邮件
     */
    public function insertInfo(Request $request) {
        // 接收数据
        $data = $request->post();
        // 验证数据
        $valiRes = $this->validate($data, 'Dealer.register');
        if($valiRes !== true) {
            $this->error($valiRes);
        }
        // 根据地址获取经纬度
        $position = \Map::getLngLat($data['address']);
        $data['x_point'] = isset($position['result']['location']['lng'])?$position['result']['location']['lng']:'暂未能获取具体经纬度';
        $data['y_point'] = isset($position['result']['location']['lat'])?$position['result']['location']['lat']:'暂未能获取具体经纬度';
        // dump($data);
        // 处理时间和状态并加密密码
        $data['create_time'] = time();
        $data['update_time'] = time();
        $data['password'] = md5($data['password']);
        // 插入数据
        $dealer = new Dealer;
        $id = $dealer->register($data);
        if($id > 0) {
            $title = "欢迎注册";
            $content = "正在审核您的注册信息，查看审核状态：" . request()->domain().url('bis/user/registerWaiting', ['id'=>$id]);
            $res = sendMail($data['email'], $title, $content);
            if($res) {
                $this->success('注册成功，请查看您的邮件');
            }else {
                $this->error('邮件发送失败！请联系管理员');
            }
        }else {
            $this->error('信息入库失败！');
        }
    }

    /**
     * 审核状态查看
     */
    public function registerWaiting($id) {
        if($id < 1) {
            $this->error('参数错误');
        }
        $dealer = Dealer::find($id);
        if($dealer->status == 1) {
            $this->success('您的账号已经通过审核！现在可以开始经营了');
        }else {
            return 
            '<h1> 审核ing ... 请耐心等待 </h1>';
        }
    }
}
