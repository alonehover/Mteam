<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/Mteam/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Mteam/Public/css/style.css">
<!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <title>注册</title>
    <style type="text/css">
    	.form-signup{
    		margin: 0 auto;
    		width: 330px;
    	}
    </style>
</head>
<body>
    <div class="container">
      <form class="form-signup" role="form" action="<?php echo U('Home/Sign/signup_action');?>" method="post">
        <h2 class="form-signup-heading">成为Mteamer</h2>
        <input type="email" name="uname" class="form-control" placeholder="填写你常用的邮箱" required autofocus>
        <input type="password" name="pwd" class="form-control" placeholder="设置你的登录密码" required>
        <input type="stunum" name="stunum" class="form-control" placeholder="输入你的学号" required>
        <input type="major" name="major" class="form-control" placeholder="输入你的专业" required>
        <input type="qq" name="qq" class="form-control" placeholder="输入你的qq号码" required>
        <input type="phone" name="phone" class="form-control" placeholder="输入你的手机号码" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me" checked="checked"> 同意遵守《Mteam注册协议》
          </label>
        </div>
        <button class="btn btn-primary btn-block" type="submit">注册</button>
	    <a href="<?php echo U('Home/Index/index');?>" class="btn btn-primary btn-block">返回首页</a>
      </form>
    </div> <!-- /container -->
</body>
    <script src="/Mteam/Public/js/jquery.min.js"></script>
<script src="/Mteam/Public/bootstrap/js/bootstrap.min.js"></script>
</html>