<?php

namespace app\common\validate;

use think\Validate;

class Listorder extends Validate
{
    protected $rule = [
         ['id', 'require|number', '必须传入主键|主键错误'],
         ['listorder', 'require|number|egt:0|elt:255', '必须传入排序序号|序号必须是数字|序号不能小于0|序号不能大于255'],
    ];

    protected $scene = [
        'doListorder' => ['model', 'id', 'listorder'],
    ];
}