<?php

namespace app\common\validate;

use think\Validate;

class Second extends Validate
{
    protected $rule = [
        ['model', 'require', '必须传入模型名'],
        ['pid', 'require|number', '必须传入外键id|外键id不正确'],
    ];

    protected $scene = [
        'getInfo' => ['model', 'pid'],
    ];
}