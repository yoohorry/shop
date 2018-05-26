<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"C:\laragon\www\shop\public/../application/admin\view\dealer\read.html";i:1527170376;s:59:"C:\laragon\www\shop\application\admin\view\public\head.html";i:1525238179;s:64:"C:\laragon\www\shop\application\admin\view\public\common_js.html";i:1525249231;}*/ ?>
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
                <h3 class="text-center">商户详情</h3>
                <p><small>商户id：</small> <?php echo $deal->id; ?> </p>
                <p><small>商户名称：</small> <?php echo $deal->name; ?> </p>
                <p><small>注册邮箱：<?php echo $deal->email; ?></small></p>
                <p><small>用户名：<?php echo $deal->username; ?></small></p>
                <p><small>开户银行：<?php echo $deal->bank_name; ?></small></p>
                <p><small>开户人：<?php echo $deal->bank_user; ?></small></p>
                <p><small>银行卡号：<?php echo $deal->bank_numb; ?></small></p>
                <p><small>Logo：<img src="/uploads/<?php echo $deal->logo; ?>" style="max-height:200px;"></small></p>
                <p><small>主营业务：</small><?php echo getName('category', $deal->category_id); ?></p>
                <p><small>创建时间：</small> <?php echo $deal->create_time; ?> </p>
                <p><small>更新时间：</small> <?php echo $deal->update_time; ?> </p>
                <p><small>当前状态：</small> <a href="<?php echo url('Dealer/guoshen', ['id'=>$deal->id]); ?>"><?php echo getStatus($deal->status); ?></a> </p>
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
  </body>
</html> 