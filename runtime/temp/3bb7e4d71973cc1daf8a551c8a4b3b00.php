<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"C:\laragon\www\shop\public/../application/admin\view\deal\read.html";i:1527171163;s:59:"C:\laragon\www\shop\application\admin\view\public\head.html";i:1525238179;s:64:"C:\laragon\www\shop\application\admin\view\public\common_js.html";i:1525249231;}*/ ?>
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
                <h3 class="text-center">商品详情</h3>
                <p><small>商品id：</small> <?php echo $deal->id; ?> </p>
                <p><small>商品名称：</small> <?php echo $deal->name; ?> </p>
                <p><small>商品图片：<img src="/uploads/<?php echo $deal->image; ?>" style="max-height: 200px;"> </p>
                <p><small>商品简介：</small> <?php echo $deal->desc; ?> </p>
                <p><small>商品价格：</small>￥<?php echo $deal->origin_price; ?> / ￥<?php echo $deal->selling_price; ?> </p>
                <p><small>创建时间：</small> <?php echo $deal->create_time; ?> </p>
                <p><small>更新时间：</small> <?php echo $deal->update_time; ?> </p>
                <p><small>备注说明：</small> <?php if($deal->note): ?> <?php echo $deal->note; else: ?> 暂无说明 <?php endif; ?> </p>
                <p><small>当前状态：</small> 
                    <a href="<?php echo url('Deal/status', ['id'=>$deal->id, 'status'=>$deal->status==0?1:0 ]); ?>">
                        <?php echo getStatus($deal->status); ?>
                    </a>
                </p>
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