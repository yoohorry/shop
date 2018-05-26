<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"C:\laragon\www\shop\public/../application/bis\view\deal\edit.html";i:1525689383;s:57:"C:\laragon\www\shop\application\bis\view\public\head.html";i:1525337733;s:62:"C:\laragon\www\shop\application\bis\view\public\common_js.html";i:1525337733;}*/ ?>
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
                <h3 class="text-center">商品编辑</h3>
                <form action="<?php echo url('Deal/update', ['id'=>$deal->id]); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $deal->id; ?>">
                    <div class="form-group">
                        <label for="input-name">商品名称</label>
                        <input type="text" class="form-control" id="input-name" name="name" value="<?php echo $deal->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="input-desc">商品简介</label>
                        <textarea name="desc" id="input-desc" cols="30" rows="5" class="form-control"><?php echo $deal->desc; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="origin_price">价格</label>
                        <div class="clearfix"></div>
                        <input type="text" class="form-control" style="width:50%; float:left" id="origin_price" placeholder=" 请输入商品原价..." name="origin_price" value="<?php echo $deal->origin_price; ?>">
                        <input type="text" class="form-control" style="width:50%; float:left" placeholder=" 请输入商品售价..." name="selling_price" value="<?php echo $deal->selling_price; ?>">
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group">
                        <label for="input-total">商品现有数量</label>
                        <input type="text" id="input-total" class="form-control" placeholder=" 请输入商品库存，若可以一直生产，可以不填写此项" name="total" value="<?php echo !empty($deal->total)?$deal->total:''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="input-note">备注说明</label>
                        <textarea name="note" id="input-note" cols="30" rows="2" class="form-control"><?php echo $deal->note; ?></textarea>
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