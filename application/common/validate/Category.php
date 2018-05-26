<?php

namespace app\common\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule = [
        ['name', 
        'require|min:2|max:8|unique:City', 
        '必须填写分类名称|分类名称过短|分类名称过长|分类名称重复'],
        ['pid', 'require|number', '必须选择所属分类|所属分类代号不正确'],
    ];

    protected $scene = [
        // 添加数据时验证
        'save' => ['name', 'pid'],
    ];
}