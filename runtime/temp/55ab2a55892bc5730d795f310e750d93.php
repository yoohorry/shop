<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:67:"C:\laragon\www\shop\public/../application/admin\view\tjw\index.html";i:1527644166;s:59:"C:\laragon\www\shop\application\admin\view\public\head.html";i:1525238179;}*/ ?>
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
                <h3 class="text-center">推荐位管理</h3>
                <table class="table table-hover table-bordered text-center">
                    <thead class="bg-info">
                        <tr>
                            <th>图片</th>
                            <th>简介</th>
                            <th>编辑</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($tjw) || $tjw instanceof \think\Collection || $tjw instanceof \think\Paginator): $i = 0; $__LIST__ = $tjw;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td>
                                <img src="/uploads/<?php echo $v->image; ?>" alt="<?php echo $v->image; ?>" style="width: 30px; height: 30px;">
                            </td>
                            <td><?php echo $v->desc; ?></td>
                            <td>
                                <a href="<?php echo url('Tjw/edit', ['id' => $v->id]); ?>" class="btn btn-sm btn-info">编辑</a>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </body>
</html> 