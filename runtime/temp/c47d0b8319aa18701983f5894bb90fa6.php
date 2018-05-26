<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"C:\laragon\www\shop\public/../application/admin\view\bill\index.html";i:1527171479;s:59:"C:\laragon\www\shop\application\admin\view\public\head.html";i:1525238179;s:64:"C:\laragon\www\shop\application\admin\view\public\common_js.html";i:1525249231;}*/ ?>
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
            <!-- 表格 -->
            <div class="col-lg-12">
                <h3 class="text-center">订单列表</h3>
                <table class="table table-hover table-bordered text-center">
                    <thead class="theme-color text-white">
                        <tr>
                            <th>订单编号</th>
                            <th>购买时间</th>
                            <th>订单总价</th>
                            <th>购买用户</th>
                            <td>详细信息</td>
                            <th>当前状态</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($bills) || $bills instanceof \think\Collection || $bills instanceof \think\Paginator): $i = 0; $__LIST__ = $bills;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bill): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td> <?php echo $bill->id; ?> </td>
                            <td> <?php echo $bill->create_time; ?> </td>
                            <td> <?php echo $bill->total_price; ?> </td>
                            <td> <?php echo getName('user', $bill->user_id); ?> </td>
                            <td> <?php echo getBillInfo($bill->deal_ids, $bill->deal_numbers); ?> </td>
                            <td> <?php echo getStatus($bill->status ); ?> </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12">
                <?php echo $bills->render();; ?>
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