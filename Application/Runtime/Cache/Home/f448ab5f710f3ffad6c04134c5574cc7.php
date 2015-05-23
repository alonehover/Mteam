<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<title>MTeam</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/Mteam/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Mteam/Public/common/css/style.css">
<link rel="stylesheet" type="text/css" href="/Mteam/Public/fonts/fontawesome/css/font-awesome.min.css">
<script src="/Mteam/Public/common/js/jquery-1.11.1.min.js"></script>

<!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="/Mteam/Public/home/css/home.css">
</head>
<body>
    <div class="container">
      <form class="form-sign center-block" action="<?php echo U('Home/Sign/signin_action');?>" role="form">
        <h1 class="form-signin-heading text-center">Mteam <small>sign in</small></h1>
        <div class="form-group">
            <input type="text" name="stunum" class="form-control" placeholder="输入你的学号" required>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="请输入密码" required>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 记住密码
          </label>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">登录</button>
        </div>
        <div class="form-group">
            <a href="<?php echo U('Home/Index/index');?>" class=""><i class="fa fa-hand-o-left"></i> 返回首页</a>
            <span class="pull-right">没有 Mteam 帐号？<a href="<?php echo U('Home/Sign/signup');?>">立即注册 <i class="fa fa-long-arrow-right"></i></a></span>
        </div>
      </form>
    </div> <!-- /container -->
    <script src="/Mteam/Public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>