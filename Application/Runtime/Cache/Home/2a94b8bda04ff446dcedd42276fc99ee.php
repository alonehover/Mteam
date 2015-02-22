<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
  <title>Bootstrap</title>
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
    	.starter-template {
		    padding: 40px 15px;
		    text-align: center;
		}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Mteam</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">首页</a></li>
            <li><a href="#about">团队</a></li>
            <li><a href="#contact">项目</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo U('Home/Sign/signin');?>" tppabs="">登录</a></li>
            <li><a href="<?php echo U('Home/Sign/signup');?>" tppabs="">注册</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <div class="starter-template">
        <h1>alonehover毕业设计</h1>
        <p class="lead">基于html5的校园项目团队管理系统</p>
      </div>
    </div><!-- /.container -->
    <script src="/Mteam/Public/js/jquery.min.js"></script>
<script src="/Mteam/Public/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>