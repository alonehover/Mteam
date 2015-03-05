<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
	  <meta charset="utf-8">
<title>Mteam</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="/Mteam/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Mteam/Public/css/style.css">
<!--[if lt IE 9]>
  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	  <link rel="stylesheet" type="text/css" href="/Mteam/Public/css/index.css"/>
  </head>
  <body>
  	  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo U('Home/Index/index');?>">Mteam</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
          <li><a href="#about">团队</a></li>
          <li><a href="#contact">项目</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php if(session('stunum')): ?><li><a href="#" tppabs=""><?php echo (session('stunum')); ?></a></li>
          <li><a href="<?php echo U('Home/Sign/signout');?>" tppabs="">[退出]</a></li>
        <?php else: ?>
          <li><a href="<?php echo U('Home/Sign/signin');?>" tppabs="">登录</a></li>
          <li><a href="<?php echo U('Home/Sign/signup');?>" tppabs="">注册</a></li><?php endif; ?>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  	<div class="masthead jumbotron">
    	<div class="container">
	        <h1>Mteam</h1>
	        <p class="lead">基于html5的校园项目团队管理系统</p>
      	</div>
    </div><!-- /.container-top -->
    <div class="container">
      <div class="row text-center mt-num">
        <div class="col-md-4">
          <div class="num">12</div>
          <h2>已有团队</h2>
        </div>
        <div class="col-md-4">
          <div class="num">12</div>
          <h2>注册用户</h2>
        </div>
        <div class="col-md-4">
          <div class="num">12</div>
          <h2>发布项目</h2>
        </div>
      </div>
    </div>
    <script src="/Mteam/Public/js/jquery.min.js"></script>
<script src="/Mteam/Public/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>