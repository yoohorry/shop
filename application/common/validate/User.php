<?php

namespace app\common\validate;

use think\Validate;

/**
 * User验证器
 * 验证针对的模型包括：后台admin 前台user 商户dealer
 */
class User extends Validate
{
    protected $rule = [
        ['captcha', 'require|captcha', '必须填写验证码！|验证码错误！'],
        ['username', 'require|min:8|max:25', '必须填写用户名！|用户名长度不正确！|用户名长度不正确！'],
        ['name', 'require|min:2|max:15', '必须填写昵称！|昵称长度不正确！|昵称长度不正确！'],
        ['password', 'require|min:8|max:25', '必须填写用户名！|密码长度不正确！|密码长度不正确！'],
    ];

    protected $scene = [
        'login' => ['captcha', 'username', 'password'],
        'register' => ['captcha', 'username', 'password', 'name']
    ];
}