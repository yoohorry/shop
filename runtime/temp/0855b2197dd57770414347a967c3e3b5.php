<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"C:\laragon\www\shop\public/../application/index\view\index\cart.html";i:1526439787;s:54:"C:\laragon\www\shop\application\index\view\layout.html";i:1527300641;}*/ ?>
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
  <!-- index CSS -->
  <link rel="stylesheet" href="/static/assets/css/index.css">
  <!-- 标题 -->
  
<title> 购物车 </title>

</head>

<body>
  <!-- 导航 -->
  <nav class="top-nav theme-color">
    <dir class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <a href="javascript:;" id="show-cities"> 当前城市：<?php echo getName('City' ,$defaultCity); ?> &nbsp;
            <i class="fa fa-caret-down" aria-hidden="true"></i>
          </a>
          &nbsp;&nbsp;
          <a href="<?php echo url('Index/index', ['cityId' => $defaultCity]); ?>">返回首页</a>
          <div class="btn-group float-right">
            <button type="button" class="btn btn-secondary dropdown-toggle user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="avatar">
                
              </div>
              <?php if(!$username): ?>
                &nbsp; 请您登陆
              <?php else: ?>
                <?php echo $username; endif; ?>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="javascript:;" data-toggle="modal" data-target="#exampleModal">登陆</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo url('User/register'); ?>">注册</a>
            </div>
          </div>
        </div>
      </div>
    </dir>
  </nav>

  <div id="cities" class="theme-color">
    <?php if(is_array($cities) || $cities instanceof \think\Collection || $cities instanceof \think\Paginator): $i = 0; $__LIST__ = $cities;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$city): $mod = ($i % 2 );++$i;?>
    <a href="<?php echo url('Index/index', ['cityId'=>$city->id]); ?>"> <?php echo $city->name; ?> </a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
  </div>

  <!-- logo & 搜索框 & 购物车 -->
  <header class="header">
    <div class="container">
      <div class="row">
        <h1 class="col-lg-3 logo"> Logo
          <small> 宣传语 </small>
          </a>
        </h1>
        <div class="col-lg-6 search">
          <form action="<?php echo url('index/search'); ?>" method="POST">
            <div class="input-group theme-color-border">
              <input type="text" name="keyword" placeholder="想要买些什么呢?...">
              <button type="submit">
                <i class="fa fa-search" aria-hidden="true"></i> 搜索
              </button>
            </div>
          </form>
        </div>
        <div class="col-lg-3 text-center cart">
          <a href="<?php echo url('Index/cart', ['cityId'=>$defaultCity]); ?>" class="theme-color">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="goods-number">0</span> 购物车</a>
        </div>
      </div>
    </div>
  </header>

  
<!-- 物品列表 -->
<section class="cart">
  <form method="POST" action="<?php echo url('Bill/setBill'); ?>">
          <table class="table text-center table-hover table-bordered">
              <thead class="theme-color">
                  <tr>
                      <th width="20%">缩略图</th>
                      <th width="40%">商品名称</th>
                      <th width="10%">商品价格</th>
                      <th class="text-danger ">总价：￥ <span class="totalPrice">0.00</span></th>
                  </tr>
              </thead>
              <tbody class="deal-list">
              </tbody>
          </table>
          <div class="buy">
              <button type="submit" class="btn btn-success btn-lg btn-block">
                  <i class="fa fa-check-square" aria-hidden="true"></i> 确认无误，下单~
              </button>
          </div>
  </form>
</section>


  <!-- 脚注 -->
  <footer>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-center theme-color-secondary">
          &copy; horry
        </div>
      </div>
    </div>
  </footer>

  <!-- 登陆模态框 -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">登陆</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="<?php echo url('User/login'); ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="username">账号</label>
              <input type="text" class="form-control" id="username" placeholder="请输入账号..." name="username">
            </div>
            <div class="form-group">
              <label for="password">密码</label>
              <input type="password" class="form-control" id="password" placeholder="请输入密码" name="password">
            </div>
            <div class="form-group">
              <label for="input-captcha">验证码</label>
              <img src="<?php echo captcha_src(); ?>" id="captcha" width="100%" height="60" style="margin-bottom: 15px;" onclick="this.src='<?php echo captcha_src(); ?>'"
                style="cursor: pointer;">
              <input type="text" class="form-control" id="input-captcha" placeholder=" 请输入验证码..." name="captcha">
            </div>
          </div>
          <div class="modal-footer">
            <button type="reset" class="btn btn-secondary">重置</button>
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
  <!-- index JS -->
  <script src="/static/assets/js/index.js"></script>  
<script src="/static/assets/js/cart.js"></script>

</body>

</html>