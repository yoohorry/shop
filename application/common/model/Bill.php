<?php

namespace app\common\model;

use think\Model;

class Bill extends Model
{
    // 获取所有订单并分页
    public static function getAllBillsAndPaginate() {
        $order = [
            'status' => 'asc',
            'update_time' => 'desc',
        ];
        // 执行查询并分页默认 5条/页
        return Self::order($order)->paginate(5);
    }
}
