<?php

namespace app\common\validate;

use think\Validate;

class Dealer extends Validate
{
    protected $rule = [
        ['captcha', 'require|captcha', '必须填写验证码|验证码错误'],
        ['name', 'require|min:4|max:20|chs|unique:Dealer', '必须填写商户名称|商户名称过短|商户名称过长|商户名称必须是中文|商户名称重复'],
        ['logo', 'require', '必须传入缩略图'],
        ['category_id', 'require|number', '必须选择具体分类|number'],
        ['city_id', 'require|number', '必须选择所在城市|number'],
        ['address', 'require', '必须填写具体地址'],
        ['bank_name', 'require', '必须填写开户银行'],
        ['bank_user', 'require', '必须填写开户人'],
        ['bank_numb', 'require|number|unique:Dealer', '必须填写银行卡号|银行卡号不正确|银行卡号已被使用'],
        ['email', 'require|email|unique:Dealer', '必须填写邮箱|必须填写正确的邮箱地址|邮箱已被注册'],
        ['username', 'require|unique:Dealer', '必须填写登陆账号|用户名已被注册'],
        ['password', 'require|min:8|max:20', '必须填写登陆密码|密码过短|密码过长'],
    ];

    protected $scene = [
        'register' => ['captcha', 'name', 'logo', 'category_id', 'city_id', 'address', 'bank_name', 'bank_user', 'bank_numb', 'email', 'username', 'password'],
    ];
}