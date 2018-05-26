<?php

namespace app\bis\controller;

use think\Request;
use think\Session;

use app\common\model\Deal as DealM;
use app\Common\model\Dealer;

class Deal extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($status=0)
    {   
        $dealer_id = Session::get('dealer_id','dealer');
        $deals = DealM::getAllDealsAndPaginate($status, $dealer_id);
        return $this->fetch('', [
            'deals' => $deals,
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return $this->fetch();
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = $request->post();
        
        $valiRes = $this->validate($data, 'Deal.save');
        if($valiRes !== true) {
            $this->error($valiRes);
        }

        $data['dealer_id'] = Session::get('dealer_id','dealer');
        $dealer = Dealer::find($data['dealer_id']);
        $data['city_id'] = $dealer->city_id;
        $data['category_id'] = $dealer->category_id;
        $data['create_time'] = time();
        $data['update_time'] = time();
        unset($data['captcha']);

        $res = DealM::insert($data);
        if($res) {
            $this->success('添加商品成功', 'Deal/index');
        }else {
            $this->error('商品添加失败！');
        }
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
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $deal = DealM::find($id);
        return $this->fetch('',[
            'deal' => $deal,
        ]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->post();
        
        $valiRes = $this->validate($data, 'Deal.update');
        if($valiRes !== true) {
            $this->error($valiRes);
        }

        $deal = DealM::find($id);
        if(!$deal) {
            $this->error('无法正确获得商品信息');
        }
        
        unset($data['captcha']);
        $data['update_time'] = time();

        $res = $deal->update($data);
        if($res) {
            $this->success('商品信息修改成功', 'Deal/index');
        }else {
            $this->error('商品信息修改失败');
        }
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
