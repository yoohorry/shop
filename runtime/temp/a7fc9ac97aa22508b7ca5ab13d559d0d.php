<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"C:\laragon\www\shop\public/../application/admin\view\index\home.html";i:1527242640;s:59:"C:\laragon\www\shop\application\admin\view\public\head.html";i:1525238179;s:64:"C:\laragon\www\shop\application\admin\view\public\common_js.html";i:1525249231;}*/ ?>
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
            <div class="col-lg-12">
                <h1 class="text-center">Welcome, horry</h1>
                <p>以下是一些默认样式</p>
            </div>
            <hr>
            <!-- 表格 -->
            <div class="col-lg-12">
                <h3 class="text-center">表格</h3>
                <table class="table table-hover table-bordered text-center">
                    <thead class="theme-color text-white">
                        <tr>
                            <th>表头</th>
                            <th>表头</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>内容</td>
                            <td>内容</td>
                            <td>
                                <div class="btn-group">
                                    <a href="" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>确定</a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>编辑</a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>删除</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>内容</td>
                            <td>内容</td>
                            <td>
                                <div class="btn-group">
                                    <a href="" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>确定</a>
                                    <a href="" class="btn btn-warning"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>编辑</a>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>删除</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- 表单 -->
            <div class="col-lg-12">
                <h3 class="text-center">表单</h3>
                <form action="" method="">
                    <div class="form-group">
                        <label for="input-email">邮箱地址</label>
                        <input type="email" class="form-control" id="input-email" name="email">
                        <span class="help-block">请输入您的电子邮箱地址</span>
                    </div>
                    <div class="form-group">
                        <label for="input-username">用户名</label>
                        <input type="username" class="form-control" id="input-username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="input-password">密码</label>
                        <input type="password" class="form-control" id="input-password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="input-text">文本域</label>
                        <textarea class="form-control" rows="5" id="input-text" name="text"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="input-select">下拉框</label>
                        <select class="form-control" id="input-select" name="select">
                            <option value="0">选项</option>
                        </select>
                    </div>
                    <button type="reset" class="btn btn-secondary">重置</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </form>
            </div>
            <!-- 模态框表单 -->
            <div class="col-lg-12">
                <h3 class="text-center">模态框表单</h3>
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">点击打开</button>
                <!-- 模态框 -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">标题</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="" method="">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="input-email-modal">邮箱地址</label>
                                        <input type="email" class="form-control" id="input-email-modal" name="email">
                                        <span class="help-block">请输入您的电子邮箱地址</span>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-username-modal">用户名</label>
                                        <input type="username" class="form-control" id="input-username-modal" name="username">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-secondary">重置</button>
                                    <button type="submit" class="btn btn-primary">提交</button>
                                </div>
                            </form>
                            </div>
                    </div>
                </div>
            </div>
            <!-- 图片上传 -->
            <div class="col-lg-12">
                <h3 class="text-center">图片上传</h3>
                <p>依赖fileinput(引入css/js及中文包zh.js) 详细逻辑写于admin_home.js，需要自行编写上传接口</p>
                <input type="file" id="uploadImage" name="file">
                <!-- 图片上传后，用js写入地址 -->
                <input type="hidden" id="image-url" name="image">
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
            "uploadPhoto": "<?php echo url('api/UploadPhoto/upload'); ?>",
        };
    </script>
    <!-- fileinput JS -->
    <script src="/static/assets/js/fileinput.min.js"></script>
    <script src="/static/assets/js/zh.js"></script>
    <!-- admin_home JS(内有图片上传) -->
    <script src="/static/assets/js/admin_home.js"></script>
  </body>
</html> 