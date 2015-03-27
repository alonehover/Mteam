<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
  <head>
	  <meta charset="utf-8">
<title>MGroup</title>
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
	  <link rel="stylesheet" type="text/css" href="/Mteam/Public/home/css/home.css"/>
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
        <a class="navbar-brand" href="<?php echo U('Home/Index/index');?>">MGroup</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li <?php if('index' == $active): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
          <li <?php if('team' == $active): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/Team/index');?>">团队</a></li>
          <li <?php if('project' == $active): ?>class="active"<?php endif; ?>><a href="<?php echo U('Home/Project/index');?>">项目</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php if(session('stunum')): ?><li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo (session('stunum')); ?><span class="caret"></a>
            <ul class="dropdown-menu" role="menu">
            <?php if(session('leader') == 0): ?><li><a href="<?php echo U('Home/Team/team_creat');?>">创建团队</a></li>
            <?php elseif(session('leader') == 1): ?>
              <li><a href="<?php echo U('User/Index/index');?>">管理团队</a></li>
            <?php else: ?>
              <li><a href="#">我的团队</a></li><?php endif; ?>
              <li><a href="#">个人信息</a></li>
            </ul>
          </li>
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
	        <h1>MGroup</h1>
	        <p class="lead"><kbd>&lt;team&gt;基于html5的校园项目团队管理系统&lt;/team&gt;</kbd></p>
      </div>
    </div><!-- /.container-top -->
    <div class="container">
      <div class="projects-header page-header text-center">
        <h2>优秀团队推荐</h2>
        <p>这些团队是根据团队完成项目数和好评度筛选出来的</p>
      </div>
      <div class="row">
      <?php if(is_array($team)): $i = 0; $__LIST__ = $team;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-4 col-lg-3 ">
            <div class="thumbnail text-center">
              <a href="<?php echo U('Home/Team/team_info',array('id'=>$v['id']));?>" title="<?php echo ($v["name"]); ?>" target="_blank" onclick="">
                <img class="lazy" src="<?php if(empty($v["img"])): ?>/Mteam/Public/home/img/sm_bg.jpg<?php else: echo ($v["img"]); endif; ?>" width="300" height="150" data-src="<?php echo ($v["img"]); ?>" alt="<?php echo ($v["name"]); ?>">
              </a>
              <div class="caption">
                <h3> 
                  <a href="<?php echo U('Home/Team/team_info',array('id'=>$v['id']));?>" title="" target="_blank" onclick=""><?php echo ($v["name"]); ?><br></a>
                </h3>
                <?php if(is_array($v["skill"])): $i = 0; $__LIST__ = $v["skill"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span class="label label-info"><?php echo ($vo); ?></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
              </div>
            </div>
          </div><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
    </div>
    <footer class="footer">
  <div class="container">
    <hr>
    <div class="row footer-bottom">
      <ul class="list-inline text-center">
        <li>
          <a href="http://www.miibeian.gov.cn/" target="_blank">蜀ICP备14028912号</a>
        </li>
        <li>@alonehover.com</li>
      </ul>
    </div>
  </div>
</footer>
    <script src="/Mteam/Public/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>