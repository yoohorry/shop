<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"C:\laragon\www\shop\public/../application/admin\view\tjw\edit.html";i:1527644736;s:59:"C:\laragon\www\shop\application\admin\view\public\head.html";i:1525238179;s:64:"C:\laragon\www\shop\application\admin\view\public\common_js.html";i:1525249231;}*/ ?>
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
                <h3 class="text-center">编辑推荐位</h3>
                <form action="<?php echo url('Tjw/update', ['id'=>$tjw->id]); ?>" method="POST">
                    <input type="hidden" name="id" value="<?php echo $tjw->id; ?>">
                    <div class="form-group">
                        <label for="input-url">地址</label>
                        <input type="text" class="form-control" id="input-url" name="url" value="<?php echo $tjw->url; ?>">
                    </div>
                    <div class="form-group">
                        <label for="input-desc">推荐位简介</label>
                        <input type="text" class="form-control" id="input-desc" name="desc" value="<?php echo $tjw->desc; ?>">
                    </div>
                    <div class="form-group">
                        <label for="input-file">图片</label>
                        <input type="file" id="input-file" name="file">
                        <!-- 图片上传后，用js写入地址 -->
                        <input type="hidden" id="image-url" name="image">
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
    <script>
        var API = {
            "uploadPhoto": "<?php echo url('api/UploadPhoto/upload'); ?>",
        };
    </script>
    <!-- fileinput JS -->
    <script src="/static/assets/js/fileinput.min.js"></script>
    <script src="/static/assets/js/zh.js"></script>
    <!-- register JS -->
    <script src="/static/assets/js/register.js"></script>
  </body>
</html> 