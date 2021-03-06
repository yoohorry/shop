<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"C:\laragon\www\shop\public/../application/bis\view\index\index.html";i:1527302102;s:57:"C:\laragon\www\shop\application\bis\view\public\head.html";i:1525337733;s:62:"C:\laragon\www\shop\application\bis\view\public\common_js.html";i:1525337733;}*/ ?>
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
    <!-- 导航 -->
    <div class="nav theme-color">
        <div class="user text-center">
          <a href="">
            <img class="user-avatar" src="/static/assets/img/admin.jpg">
            <span class="user-username"><?php echo $username; ?></span>
          </a>
        </div>
        <div class="sidebar theme-color-secondary">
          <a href="<?php echo url('Index/index'); ?>" class="navs home home-active">
            <i class="fa fa-home" aria-hidden="true"></i> 首页
            <i class="fa fa-caret-right float-right" aria-hidden="true"></i>
          </a>
          <!-- 商品 -->
          <a href="javascript:;" class="navs">
            <i class="fa fa-sitemap" aria-hidden="true"></i> 商品管理
            <i class="fa fa-caret-down float-right" aria-hidden="true"></i>
          </a>
          <div class="links theme-color">
            <a href="javascript:;" onclick="loadPage(this, '<?php echo url('Bill/index'); ?>')" class="link"><i class="fa fa-bars" aria-hidden="true"></i>订单列表<i class="fa fa-caret-right float-right" aria-hidden="true"></i></a>
            <a href="javascript:;" onclick="loadPage(this, '<?php echo url('Deal/create'); ?>')" class="link"><i class="fa fa-plus" aria-hidden="true"></i>添加商品<i class="fa fa-caret-right float-right" aria-hidden="true"></i></a>
            <a href="javascript:;" onclick="loadPage(this, '<?php echo url('Deal/index', ['status'=>0]); ?>')" class="link"><i class="fa fa-clock-o" aria-hidden="true"></i>待审商品<i class="fa fa-caret-right float-right" aria-hidden="true"></i></a>
            <a href="javascript:;" onclick="loadPage(this, '<?php echo url('Deal/index', ['status'=>1]); ?>')" class="link"><i class="fa fa-th-list" aria-hidden="true"></i>在售商品<i class="fa fa-caret-right float-right" aria-hidden="true"></i></a>
            <a href="javascript:;" onclick="loadPage(this, '<?php echo url('Deal/index', ['status'=>-1]); ?>')" class="link"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>下架商品<i class="fa fa-caret-right float-right" aria-hidden="true"></i></a>
          </div>
        </div>
    </div>

    <!-- 内容区域 -->
    <div class="box">
        <div class="header theme-color">
          <a href="<?php echo url('User/logout'); ?>" class="logout float-right">退出登陆</a>
        </div>
        <div class="content">
          <iframe src="<?php echo url('Index/home'); ?>" frameborder="0" id="page"></iframe>
        </div>
        <div class="footer theme-color-secondary text-center">
          &copy; horry
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