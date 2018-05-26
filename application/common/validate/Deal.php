<?php

namespace app\common\validate;

use think\Validate;

class Deal extends Validate
{
    protected $rule = [
        ['captcha', 'require|captcha', '必须填写验证码|验证码有误!'],
        ['name', 
        'require|min:2|max:8|chs|unique:City', 
        '必须填写商品名称|商品名称过短|商品名称过长|商品名称必须是汉字|商品名称重复'],
        ['image', 'require', '请务必上传一张商品宣传图片'],
        ['desc', 'require', '请务必填写商品简介'],
        ['origin_price', 'require|number', '请务必填写商品原价|商品价格单位默认为rmb元，无须填写'],
        ['selling_price"', 'require|number', '请务必填写商品售价|商品价格单位默认为rmb元，无须填写'],
        ['id', 'require|number', '无法正确获取商品信息|无法正确获取商品信息'],
    ];

    protected $scene = [
        // 添加数据时验证
        'save' => ['captcha', 'name', 'image', 'desc', 'origin_price', 'selling_price'],
        'update' => ['captcha', 'name',  'desc', 'origin_price', 'selling_price', 'id'],
    ];
}