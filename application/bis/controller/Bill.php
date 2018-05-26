<?php

namespace app\bis\controller;

use think\Request;
use think\Session;

use app\common\model\Bill as BillM;
use app\common\model\User;

class Bill extends Base
{
    /**
     * 显示订单列表
     */
    public function index() {
        $bills = BillM::getAllBillsAndPaginate();
        // dump($bills);die;
        return $this->fetch('', [
            'bills' => $bills
        ]);
    }

    /**
     * 接收订单
     */
    public function accept($id) {
        // 查询订单和购买人信息
        $bill = BillM::find($id);
        $user = User::find($bill->user_id);
        // 修改订单状态
        $bill->status = 1;
        $bill->save();
        // 发送邮件通知用户前往 “我的订单” 中扫码付款
        $title = "您的订单已被商家接收";
        $content = "点击这里前往支付页面进行支付" . request()->domain().url('index/bill/pay', ['id' => $bill->id]);
        $res = sendMail($user->email, $title, $content);
        if($res) {
            $this->success('接收订单成功，已发送邮件通知用户进行付款');
        }else {
            $this->error('邮件发送失败！请联系管理员');
        }
    }

    /**
     * 拒绝订单
     */
    public function refuse($id) {
         // 查询订单和购买人信息
         $bill = BillM::find($id);
         $user = User::find($bill->user_id);
         // 修改订单状态
         $bill->status = -1;
         $bill->save();
         // 发送邮件通知用户
         $title = "sorry， 订单被拒接了.";
         $content = "你的订单因某些原因被商家拒绝，如有疑问，请联系商家";
         $res = sendMail($user->email, $title, $content);
         if($res) {
             $this->success('已拒绝订单，已发送邮件通知用户');
         }else {
             $this->error('邮件发送失败！请联系管理员');
         }
    }
}
