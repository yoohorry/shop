<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"C:\laragon\www\shop\public/../application/admin\view\dealer\heimingdan.html";i:1525682509;s:59:"C:\laragon\www\shop\application\admin\view\public\head.html";i:1525238179;s:64:"C:\laragon\www\shop\application\admin\view\public\common_js.html";i:1525249231;}*/ ?>
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
                <h3 class="text-center">黑名单</h3>
                <table class="table table-hover table-bordered text-center">
                    <thead class="theme-color text-white">
                        <tr>
                            <th>商户名称</th>
                            <th>拉黑时间</th>
                            <th>联系邮箱</th>
                            <th>当前状态</th>
                            <th>相关操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($dealers) || $dealers instanceof \think\Collection || $dealers instanceof \think\Paginator): $i = 0; $__LIST__ = $dealers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$dealer): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td>
                                <?php echo $dealer->name; ?>
                            </td>
                            <td>
                                <?php echo $dealer->update_time; ?>
                            </td>
                            <td>
                                <?php echo $dealer->email; ?>
                            </td>
                            <td>
                                <a href="<?php echo url('Dealer/status', ['id'=>$dealer->id, 'status'=>0 ]); ?>">
                                    <?php echo getStatus($dealer->status); ?>
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-danger" onclick="deleteConfirm('<?php echo url('Dealer/delete', ['id'=>$dealer->id]); ?>')"><i class="fa fa-eraser" aria-hidden="true"></i>彻底删除</button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12">
                <?php echo $dealers->render();; ?>
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