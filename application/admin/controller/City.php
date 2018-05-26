<?php

namespace app\admin\controller;

use think\Request;
use app\common\model\City as CityM;

class City extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($status=1, $pid=0)
    {
        // 获取城市并分页
        $cities = CityM::getAllCitiesAndPaginate($status, $pid);
        // 抓取视图并传值
        return $this->fetch('', [
            'cities' => $cities,
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        // 获取所有可用城市
        $cities = CityM::getUseableCity();
        // 传值跳转
        return $this->fetch('', [
            'cities' => $cities,
        ]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        // 接收数据
        $data = $request->post();
        // dump($data);die;
        // 验证数据
        $valiRes = $this->validate($data, 'City.save');
        if($valiRes !== true) {
            $this->error($valiRes);
        }
        // 处理数据：时间和状态写入
        $data['create_time'] = time();
        $data['update_time'] = time();
        $data['status'] = 1;
        // 写入数据
        $res = CityM::insert($data); //返回的是影响的行数
        if($res > 0) {
            $this->success('添加城市成功！', 'City/index');
        }else {
            $this->error('添加城市失败！请重试');
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
        // 通过id获取数据
        $city = CityM::find($id);
        // 跳转
        return $this->fetch('', [
            'city' => $city,
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
        // 获取所有可用城市
        $cities = CityM::getUseableCity();
        // 获取当前要编辑的城市
        $city = CityM::find($id);
        return $this->fetch('', [
            'cities' => $cities,
            'city' => $city,
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
        // 接收数据
        $data = $request->post();
        // 验证数据
        $valiRes = $this->validate($data, 'City.save');
        if($valiRes !== true) {
            $this->error($valiRes);
        }
        // 通过id获取数据
        $city = CityM::find($id);
        if($city == null) {
            $this->error("城市不存在！");
        }
        // 处理时间
        $data['update_time'] = time();
        // 写入数据
        $res = $city->update($data);
        if($res) {
            $this->success('编辑成功', 'City/index');
        }else {
            $this->error('编辑失败');
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
        $city = CityM::find($id);
        if($city == null) {
            $this->error("城市不存在！");
        }
        // 处理数据
        $data['id'] = $id;
        $data['status'] = $status;
        $data['update_time'] = time();
        // 写入数据
        $city->update($data);
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
        $city = CityM::find($id);
        if($city == null) {
            $this->error("城市不存在！");
        }
        // 删除数据
        $res = $city->delete();
        if($res) {
            $this->success('删除成功');
        }else {
            $this-error('删除失败');
        }
    }
}
