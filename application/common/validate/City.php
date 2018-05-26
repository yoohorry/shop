<?php

namespace app\common\validate;

use think\Validate;

class City extends Validate
{
    protected $rule = [
        ['name', 
        'require|min:2|max:8|chs|unique:City', 
        '必须填写城市名称|城市名称过短|城市名称过长|城市名称必须是汉字|城市名称重复'],
        ['pid', 'require|number', '必须选择所属城市|所属城市代号不正确'],
    ];

    protected $scene = [
        // 添加数据时验证
        'save' => ['name', 'pid'],
    ];
}