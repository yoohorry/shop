<?php

namespace app\api\controller;

use think\Controller;

class Listorder extends Controller
{
    public function doList() {
        // 接收数据
        $data = input('post.');
        // 验证数据
        $valiRes = $this->validate($data, 'Listorder.doListorder');
        if($valiRes !== true) {
            return [
                'status' => 0,
                'msg' => $valiRes
            ];
        }
        // 实例化模型并处理掉 $data['model']这个数据 写入更新时间
        $model = model($data['model']);
        unset($data['model']);
        $data['update_time'] = time();
        // 插入数据
        $res = $model->update($data);
        if($res) {
            return [
                'status' => 1,
                'msg' => 'success'
            ];
        }else {
            return [
                'status' => 0,
                'msg' => '排序功能出现错误！'
            ];
        }
    }
}
