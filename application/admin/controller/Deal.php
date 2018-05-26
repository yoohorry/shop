<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;

use app\common\model\Deal as DealM;
use app\Common\model\Dealer;

class Deal extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($status)
    {   
        $deals = DealM::getAllDealsAndPaginateAdmin($status);
        return $this->fetch('', [
            'deals' => $deals,
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
        $deal = DealM::find($id);
        return $this->fetch('',[
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
        $deal = DealM::find($id);
        if($deal == null) {
            $this->error("商品不存在！");
        }
        // 处理数据
        $data['id'] = $id;
        $data['status'] = $status;
        $data['update_time'] = time();
        // 写入数据
        $deal->update($data);
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
        $deal = DealM::find($id);
        if($deal == null) {
            $this->error("商品不存在！");
        }
        // 删除数据
        $res = $deal->delete();
        if($res) {
            $this->success('删除成功');
        }else {
            $this-error('删除失败');
        }
    }
}
