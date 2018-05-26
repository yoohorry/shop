<?php

namespace app\index\controller;

use think\Controller;
use think\Session;

use app\common\model\Deal;
use app\common\model\Bill as BillM;

class Bill extends Controller 
{
    /**
     * 创建订单
     */
    public function setBill() {
        $data = input('post.');
        $totalPrice = $this->totalPrice($data);
        // 处理数据
        $bill = [
            'user_id' => Session::get('user_id', 'index'),
            'user_email' => Session::get('user_email', 'index'),
            'deal_ids' => implode(",", $data['id']),
            'deal_numbers' => implode(",", $data['number']),
            'create_time' => time(),
            'update_time' => time(),
            'total_price' => $totalPrice,
        ];

        // dump($bill);die;
        // 创建订单
        $res = BillM::insert($bill);
        if($res) {
            $this->success('购买成功，请等待商户确认！', 'Index/index');
        } else {
            $this->error('商品购买失败！请联系网站管理员');
        }
        
    }

    /**
     * 计算总价
     */
    private function totalPrice($data) {
        // 确定用户是否登陆
        if(!Session::has('user', 'index')) {
            $this->error('您还未登录， 请您先点击右上角登陆！');
        }
        // 查询数据库核对价格
        return Deal::totalPrice($data['id'], $data['number']);
    }

    /**
     * 支付页面
     */
    public function pay($id) {
        $bill = BillM::find($id);
        dump($bill);die;
        // 在这里根据订单总价，编号，调取 微信支付 页面
        
    }
}