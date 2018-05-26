<?php

namespace app\common\model;

use think\Model;

class Category extends Model
{
    // 获取所有分类并分页
    public static function getAllCatesAndPaginate($status=1, $pid=0) {
        // 配置查询条件
        $where = [
            'pid' => $pid,
        ];
        if($status == 1) {
            $where['status'] = ['neq', -1];
        }else {
            $where['status'] = -1;
        }
        $order = [
            'listorder' => 'desc',
            'update_time' => 'desc',
            'status' => 'asc',
        ];
        // 执行查询并分页默认 5条/页
        return Self::where($where)->order($order)->paginate(5);
    }

    // 获取所有(pid=0, status=1)的“可用分类”
    public static function getUseableCate() {
        $where = [
            'pid' => 0,
            'status' => 1,
        ];
        $order = [
            'listorder' => 'desc',
            'update_time' => 'desc',
        ];
        return Self::where($where)->order($order)->select();
    }

    // 二级联动
    public function getSecondInfo($pid) {
        $where = [
            'pid' => $pid,
            'status' => 1,
        ];
        $order = [
            'listorder' => 'desc',
            'update_time' => 'desc',
        ];

        return $this->where($where)->order($order)->select();
    }

    // 首页：查询最前面6个分类
    public static function getIndexCates() {
        $where = [
            'pid' => ['neq', 0],
            'status' => 1,
        ];
        $order = [
            'listorder' => 'desc',
            'update_time' => 'desc',
        ];
        
        return Self::where($where)->order($order)->limit(5)->select();
    }
}
