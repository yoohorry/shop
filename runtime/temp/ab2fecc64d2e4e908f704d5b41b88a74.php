<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"C:\laragon\www\shop\public/../application/admin\view\city\create.html";i:1525243477;s:59:"C:\laragon\www\shop\application\admin\view\public\head.html";i:1525238179;s:64:"C:\laragon\www\shop\application\admin\view\public\common_js.html";i:1525249231;}*/ ?>
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
                <h3 class="text-center">添加城市</h3>
                <form action="<?php echo url('City/save'); ?>" method="POST">
                    <div class="form-group">
                        <label for="input-name">城市名称</label>
                        <input type="text" class="form-control" id="input-name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="input-select">所属城市</label>
                        <select class="form-control" id="input-select" name="pid">
                            <option value="0">省级城市</option>
                            <?php if(is_array($cities) || $cities instanceof \think\Collection || $cities instanceof \think\Paginator): $i = 0; $__LIST__ = $cities;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$city): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $city->id; ?>">--<?php echo $city->name; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
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
  </body>
</html> 