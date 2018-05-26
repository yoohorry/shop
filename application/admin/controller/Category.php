<?php

namespace app\admin\controller;

use think\Request;
use app\common\model\Category as CategoryM;

class Category extends Base
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($status=1, $pid=0)
    {
        // 获取城市并分页
        $cates = CategoryM::getAllCatesAndPaginate($status, $pid);
        // 抓取视图并传值
        return $this->fetch('', [
            'cates' => $cates,
        ]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        // 获取所有可用分类
        $cates = CategoryM::getUseableCate();
        // 传值跳转
        return $this->fetch('', [
            'cates' => $cates,
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
        $valiRes = $this->validate($data, 'Category.save');
        if($valiRes !== true) {
            $this->error($valiRes);
        }
        // 处理数据：时间和状态写入
        $data['create_time'] = time();
        $data['update_time'] = time();
        $data['status'] = 1;
        // 写入数据
        $res = CategoryM::insert($data); //返回的是影响的行数
        if($res > 0) {
            $this->success('添加分类成功！', 'Category/index');
        }else {
            $this->error('添加分类失败！请重试');
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
        $cate = CategoryM::find($id);
        // 跳转
        return $this->fetch('', [
            'cate' => $cate,
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
        // 获取所有可用分类
        $cates = CategoryM::getUseableCate();
        // 获取当前要编辑的分类
        $cate = CategoryM::find($id);
        return $this->fetch('', [
            'cates' => $cates,
            'cate' => $cate,
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
        $valiRes = $this->validate($data, 'Category.save');
        if($valiRes !== true) {
            $this->error($valiRes);
        }
        // 通过id获取数据
        $cate = CategoryM::find($id);
        if($cate == null) {
            $this->error("分类不存在！");
        }
        // 处理时间
        $data['update_time'] = time();
        // 写入数据
        $res = $cate->update($data);
        if($res) {
            $this->success('编辑成功', 'Category/index');
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
        $cate = CategoryM::find($id);
        if($cate == null) {
            $this->error("分类不存在！");
        }
        // 处理数据
        $data['id'] = $id;
        $data['status'] = $status;
        $data['update_time'] = time();
        // 写入数据
        $cate->update($data);
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
        $cate = CategoryM::find($id);
        if($cate == null) {
            $this->error("城市不存在！");
        }
        // 删除数据
        $res = $cate->delete();
        if($res) {
            $this->success('删除成功');
        }else {
            $this-error('删除失败');
        }
    }
}
