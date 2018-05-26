<?php

namespace app\api\controller;

use think\Controller;

class GetSecond extends Controller
{
    public function getSecondInfo() {
        // 获取数据
        $data = input('post.');
        // 验证数据
        $valiRes = $this->validate($data, 'Second.getInfo');
        if($valiRes !== true) {
            return [
                'status' => 0,
                'msg' => $valiRes
            ];
        }
        //实例化模型 并调用模型方法查询数据
        $model = model($data['model']);
        $info = $model->getSecondInfo($data['pid']);
        if($info) {
            return [
                'status' => 1,
                'info' => $info
            ];
        }else {
            return [
                'status' => 0,
                'msg' => '暂无数据！'
            ];
        }
    }
}