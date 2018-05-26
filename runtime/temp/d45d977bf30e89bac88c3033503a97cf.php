<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"C:\laragon\www\shop\public/../application/bis\view\deal\index.html";i:1527211701;s:57:"C:\laragon\www\shop\application\bis\view\public\head.html";i:1525337733;s:62:"C:\laragon\www\shop\application\bis\view\public\common_js.html";i:1525337733;}*/ ?>
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
                <h3 class="text-center">待审商品</h3>
                <table class="table table-hover table-bordered text-center">
                    <thead class="theme-color text-white">
                        <tr>
                            <th>商品名称</th>
                            <th>排序序号</th>
                            <th>创建时间</th>
                            <th>当前状态</th>
                            <th>相关操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($deals) || $deals instanceof \think\Collection || $deals instanceof \think\Paginator): $i = 0; $__LIST__ = $deals;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td><?php echo $deal->name; ?></td>
                            <td>
                                <input type="text" class="listorder" attr-id="<?php echo $deal->id; ?>" value="<?php echo $deal->listorder; ?>" style="width:30px;"> 
                            </td>
                            <td><?php echo $deal->create_time; ?></td>
                            <td>
                                <a href="<?php echo url('Deal/status', ['id'=>$deal->id, 'status'=>0]); ?>">
                                    <?php echo getStatus($deal->status); ?>
                                </a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <?php if($deal->status != -1): ?>
                                    <a href="<?php echo url('Deal/read', ['id'=>$deal->id]); ?>" class="btn btn-info"><i class="fa fa-info-circle" aria-hidden="true"></i>详情</a>
                                    <a href="<?php echo url('Deal/edit', ['id'=>$deal->id]); ?>" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>编辑</a>
                                    <a href="<?php echo url('Deal/status', ['id'=>$deal->id, 'status'=>-1]); ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>删除</a>
                                    <?php else: ?>
                                    <button class="btn btn-danger" onclick="deleteConfirm('<?php echo url('Deal/delete', ['id'=>$deal->id]); ?>')"><i class="fa fa-eraser" aria-hidden="true"></i>彻底删除</button>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12">
                <?php echo $deals->render();; ?>
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
            "model": 'Deal',
            "listorder_url": "<?php echo url('api/Listorder/doList'); ?>"
        }
    </script>
    <!-- 排序JS插件 -->
    <script src="/static/assets/js/listorder.js"></script>
  </body>
</html> 