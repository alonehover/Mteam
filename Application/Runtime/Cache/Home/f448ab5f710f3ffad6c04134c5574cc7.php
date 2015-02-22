<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>登录</title>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/Mteam/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Mteam/Public/css/style.css">
<!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style type="text/css">
    	.form-signin{
    		margin: 0 auto;
    		width: 330px;
    	}
    </style>
</head>
<body>
    <div class="container">
      <form class="form-signin" role="form">
        <h2 class="form-signin-heading text-center">Mteam</h2>
        <input type="email" name="uname" class="form-control" placeholder="请输入邮箱" required autofocus>
        <input type="password" name="pwd" class="form-control" placeholder="请输入密码" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 记住密码
          </label>
        </div>
        <button class="btn btn-primary btn-block" type="submit">登录</button>
	    <a href="<?php echo U('Home/Index/index');?>" class="btn btn-primary btn-block">返回首页</a>
      </form>
    </div> <!-- /container -->
    <script src="/Mteam/Public/js/jquery.min.js"></script>
<script src="/Mteam/Public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>