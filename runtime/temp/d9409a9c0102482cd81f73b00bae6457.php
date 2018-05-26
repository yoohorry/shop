<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"C:\laragon\www\shop\public/../application/bis\view\user\register.html";i:1525583544;s:57:"C:\laragon\www\shop\application\bis\view\public\head.html";i:1525337733;s:62:"C:\laragon\www\shop\application\bis\view\public\common_js.html";i:1525337733;}*/ ?>
<!doctype html>
<html lang="zh-CN">
  <head>
    <!-- 编码 -->
    <meta charset="utf-8">
    <!-- 页面支持响应式 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="/static/assets/css/bootstrap.min.css">
    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="/static/assets/css/font-awesome.min.css">
    <!-- admin CSS -->
    <link rel="stylesheet" href="/static/assets/css/admin.css">
    <!-- fileinput CSS -->
    <link rel="stylesheet" href="/static/assets/css/fileinput.min.css">
    <title>后台管理</title>
  </head>
  <body>
    <!-- 内容 -->
    <div class="container">
        <div class="row">
            <!-- 表单 -->
            <div class="col-lg-12">
                <h3 class="text-center">商户入驻申请</h3>
                <form action="<?php echo url('User/insertInfo'); ?>" method="POST" enctype="multipart/form-data">
                    <h4>商户信息</h4>
                    <hr>
                    <div class="form-group">
                        <label for="input-name">商户名称</label>
                        <input type="text" class="form-control" id="input-name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="input-file">LOGO(宣传图)</label>
                        <input type="file" id="input-file" name="file">
                        <!-- 图片上传后，用js写入地址 -->
                        <input type="hidden" id="image-url" name="logo">
                    </div>
                    <div class="form-group">
                        <label for="input-category">主要经营</label>
                        <div class="clearfix"></div>
                        <select id="input-category" class="form-control" style="width:50%; float:left;">
                            <option value="default"> 请选择分类 </option>
                            <?php if(is_array($cates) || $cates instanceof \think\Collection || $cates instanceof \think\Paginator): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $cate->id; ?>"><?php echo $cate->name; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <select name="category_id" id="cates" class="form-control" style="width:50%; float:left;"></select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label for="input-city">所在城市</label>
                        <div class="clearfix"></div>
                        <select id="input-city" class="form-control" style="width:50%; float:left;">
                            <option value="default"> 请选择城市 </option>
                            <?php if(is_array($cities) || $cities instanceof \think\Collection || $cities instanceof \think\Paginator): $i = 0; $__LIST__ = $cities;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$city): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $city->id; ?>"><?php echo $city->name; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                        <select name="city_id" id="cities" class="form-control" style="width:50%; float:left;"></select>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label for="input-address">具体地址</label>
                        <input type="text" class="form-control" id="input-address" name="address">
                    </div>
                    <h4>银行信息</h4>
                    <hr>
                    <div class="form-group">
                        <label for="input-bname">开户银行</label>
                        <input type="text" class="form-control" id="input-bname" name="bank_name">
                    </div>
                    <div class="form-group">
                        <label for="input-buser">开户人</label>
                        <input type="text" class="form-control" id="input-buser" name="bank_user">
                    </div>
                    <div class="form-group">
                        <label for="input-bnumb">银行卡号</label>
                        <input type="text" class="form-control" id="input-bnumb" name="bank_numb">
                    </div>
                    <h4>账号信息</h4>
                    <hr>
                    <div class="form-group">
                        <label for="input-email">注册邮箱</label>
                        <input type="email" class="form-control" id="input-email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="input-username">登陆账号</label>
                        <input type="text" class="form-control" id="input-username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="input-password">登陆密码</label>
                        <input type="password" class="form-control" id="input-password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="input-captcha">验证码</label>
                        <img src="<?php echo captcha_src(); ?>" id="captcha" width="100%" height="60" style="margin-bottom: 15px;" onclick="this.src='<?php echo captcha_src(); ?>'" style="cursor: pointer;">
                        <input type="text" class="form-control" id="input-captcha" placeholder=" 请输入验证码..." name="captcha">
                    </div>
                    <button type="reset" class="btn btn-secondary">重置</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            </div>
        </div>
    </div>

    <!-- jquery JS -->
<script src="/static/assets/js/jquery3.2.1.min.js"></script>
<!-- popper JS -->
<script src="/static/assets/js/popper.min.js"></script>
<!-- bootstrap JS -->
<script src="/static/assets/js/bootstrap.min.js"></script>
<!-- admin JS -->
<script src="/static/assets/js/admin.js"></script>
    <!-- 页面常量定义 -->
    <script>
        var API = {
            "uploadPhoto": "<?php echo url('api/UploadPhoto/upload'); ?>",
            "getSecond": "<?php echo url('api/GetSecond/getSecondInfo'); ?>"
        };
    </script>
    <!-- fileinput JS -->
    <script src="/static/assets/js/fileinput.min.js"></script>
    <script src="/static/assets/js/zh.js"></script>
    <!-- register JS -->
    <script src="/static/assets/js/register.js"></script>
  </body>
</html> 