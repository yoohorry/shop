<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:66:"C:\laragon\www\shop\public/../application/bis\view\index\home.html";i:1527211338;s:57:"C:\laragon\www\shop\application\bis\view\public\head.html";i:1525337733;}*/ ?>
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
    <h1>商户管理</h1>
    <p><small>商户名称：</small> <?php echo $dealer->name; ?> </p>
    <p><small>商户LOGO：</small> <img src="/uploads/<?php echo $dealer->logo; ?>" style="max-height: 200px;"> </p>
    <p><small>商户编号：</small> <?php echo $dealer->id; ?> </p>
    <p><small>商户主要经营:</small> <?php echo getName('Category', $dealer->category_id); ?> </p>
    <p><small>店面所在城市:</small> <?php echo getName('City', $dealer->city_id); ?> </p>
    <p><small>店面具体位置:</small> <?php echo $dealer->address; ?> </p>
    <p><small>地图：</small>
      <img style="margin:20px" width="400" height="300" src="<?php echo url('Index/getMap', ['lng'=>$dealer->x_point, 'lat'=>$dealer->y_point]); ?>">
    </p>
  </body>
</html> 