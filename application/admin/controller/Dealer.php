<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;

use app\common\model\Dealer as DealerM;

class Dealer extends Controller
{
    /**
     * 显示待审商户列表
     */
    public function daishen()
    {
        // 获取城市并分页
        $dealers = DealerM::getDealersByStatus(0);
        // dump($dealers);die;
        // 抓取视图并传值
        return $this->fetch('', [
            'dealers' => $dealers,
        ]);
    }
    
    /**
     * 过审
     */
    public function guoshen($id) {
        // echo $id;die;
        $dealer = DealerM::find($id);
        $dealer->status = 1;
        $dealer->update_time = time();
        $toWho = $dealer->email;
        $title = '您的账号已经通过审核';
        $content = "点击这里登陆通过用户名和密码登陆" . request()->domain().url('bis/user/login');
        // 数据库保存 邮件发送
        $sql = $dealer->save();
        $mail = sendMail($toWho, $title, $content);
        if($sql && $mail) {
            $this->success('修改状态成功');
        }
    } 

    /**
     * 营业商户
     */
    public function yingye() {
        $dealers = DealerM::getDealersByStatus(1);
        // dump($dealers);die;
        // 抓取视图并传值
        return $this->fetch('', [
            'dealers' => $dealers,
        ]);
    }

    /**
     * 黑名单
     */
    public function heimingdan() {
        $dealers = DealerM::getDealersByStatus(-1);
        // dump($dealers);die;
        // 抓取视图并传值
        return $this->fetch('', [
            'dealers' => $dealers,
        ]);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        // 通过id获取数据
        $deal = DealerM::find($id);
        // 跳转
        return $this->fetch('', [
            'deal' => $deal,
        ]);
    }

    /**
     * 状态修改
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function status($id, $status) {
        // 通过id获取数据
        $dealer = DealerM::find($id);
        if($dealer == null) {
            $this->error("城市不存在！");
        }
        // 处理数据
        $data['id'] = $id;
        $data['status'] = $status;
        $data['update_time'] = time();
        // 写入数据
        $dealer->update($data);
        $this->success('操作成功！');
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        // 通过id获取数据
        $dealer = DealerM::find($id);
        if($dealer == null) {
            $this->error("城市不存在！");
        }
        // 删除数据
        $res = $dealer->delete();
        if($res) {
            $this->success('删除成功');
        }else {
            $this-error('删除失败');
        }
    }
}
