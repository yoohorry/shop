<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"C:\laragon\www\shop\public/../application/admin\view\user\login.html";i:1525238562;}*/ ?>
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
  </head>
  <body class="theme-color">
    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
     
          <!-- 模态框头部 -->
          <div class="modal-header">
            <h4 class="modal-title">请登陆，管理员</h4>
          </div>
     
          <!-- 模态框主体 -->
          <form action="<?php echo url('User/checkUser'); ?>" method="POST">
          <div class="modal-body">
              <div class="form-group">
                  <label for="input-username">用户名</label>
                  <input type="text" class="form-control" id="input-username" placeholder=" 请输入用户名..." name="username">
              </div>
              <div class="form-group">
                  <label for="input-password">密码</label>
                  <input type="password" class="form-control" id="input-password" placeholder=" 请输入密码..." name="password">
              </div>
              <div class="form-group">
                <label for="input-captcha">验证码</label>
                <img src="<?php echo captcha_src(); ?>" id="captcha" width="100%" height="60" style="margin-bottom: 15px;" onclick="this.src='<?php echo captcha_src(); ?>'" style="cursor: pointer;">
                <input type="text" class="form-control" id="input-captcha" placeholder=" 请输入验证码..." name="captcha">
              </div>
          </div>
     
          <!-- 模态框底部 -->
          <div class="modal-footer">
            <button type="reset" class="btn btn-default">重置</button>
            <button type="submit" class="btn btn-primary">登陆</button>
          </div>
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

    <script>
      $(function() {
        // 刷新验证码
        $("#captcha").attr('src', '<?php echo captcha_src(); ?>' + '?' + Math.random());
        // 载入模态框
        $("#myModal").modal();
      });
    </script>
  </body>
</html> 