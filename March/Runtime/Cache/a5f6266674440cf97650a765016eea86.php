<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>三月软件工作室</TITLE>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="fanchangfa" CONTENT="">
  <META NAME="Keywords" CONTENT="三月软件,三月,软件,工作室,三月软件工作室">
  <META NAME="Description" CONTENT="">
  <link href="__ROOT__/March/Common/css/common.css" rel="stylesheet">
  <link rel="stylesheet" href="__ROOT__/Common/css/bootstrap.css" type="text/css" />
   <script type="text/javascript" src="__ROOT__/Common/js/jquery.js"></script>
   <script src="__ROOT__/OA/Common/js/header.js" type="text/javascript"></script><!-- 在前台退出时,调用后台中的Index模块下的doLogout方法 -->
  <style type="text/css">
		.login_show_1{position:absolute;Z-index:1000; filter:blur(strength=0);}
  </style>
 </HEAD>
<script language="JavaScript">
  function keyLogin(){
  if (event.keyCode==13)   //回车键的键值为13
	if($("#btn_bool").val()!="1"||$("#login_show").css("display")=="none"){
		document.getElementById("btnsearch").click();  //调用登录按钮的登录事件
	}
	else{
		document.getElementById("btn_login").click();  //调用登录按钮的登录事件
	}
     
}
</script>
 <BODY onkeydown="keyLogin();">
<input type="hidden" value="0" id="btn_bool">

 <center id='centerOne'>
  <div id="main">
	<input type="hidden" id="url" value="__URL__">
	<input type="hidden" id="root" value="__ROOT__">
	<!--头部导航-->
	<div id="march_top">	
		
		<!--头部logo-->
		<div id="logo"></div>
		
		<!--搜索框-->
		<div id="search">
		
			<div id="search_div">
				<form action="http://www.google.com/search" id="tsf" method="GET"  name="f" target="_blank"> 
				<input type=hidden name=hl value="zh-CN">
				<input type=hidden name=newwindow value="1">
				<input type=hidden name=safe value="strict">
				<input type=hidden name=site value=""> 
				<input name="source" type="hidden" value="hp"/> 
					
				<input type="text" name="q" placeholder="请输入搜索文字"  id="search_inp">
				<input type=submit id="search_btn" value="">
				</form>
			</div>
			
		<!--登陆按钮-->
			<div id="login">
				<?php if($_SESSION['user_login']): ?><!-- 成立代表已经登录 -->
					<img src="__ROOT__/March/Common/img/index/message.png"/><a href="__ROOT__/oa.php/Index/index">消息&nbsp;<span class="count">(<?php echo getNotice_Num();?>)<span></a>

					<img src="__ROOT__/March/Common/img/index/user.png"/>
					<?php if($_SESSION['login']): ?><!-- 只有管理员才能跳转到事物管理 -->
				      	<a href="__ROOT__/oa.php/Personal/thing">
				    <?php else: ?>
				      	<a href="__ROOT__/oa.php/Personal/data"><?php endif; echo getName();?></a>&nbsp;
					<a name="doLogout" javascript:void(0) >[&nbsp;退出&nbsp;]</a>
				<?php else: ?>
					<a data-toggle="modal" href="#login_show" id="login_title">
						<img src="__ROOT__/March/Common/img/index/login.png">
					</a><?php endif; ?>
			</div>
		</div>
		
		<?php $nav = array('首页'=>'__ROOT__/index.php/Index/home', '新闻动态'=>'__ROOT__/index.php/News.html', '三月课堂'=>'__ROOT__/index.php/Lecture/index.html', '三月奖项'=>'__ROOT__/index.php/Prize/index.html', '相册'=>'__ROOT__/index.php/Photo/index.html', '项目展示'=>'__ROOT__/index.php/Project/project.html', '知识库'=>'__ROOT__/index.php/Knowledge/blog', '成长随笔'=>'__ROOT__/index.php/Grow/index', '关于我们'=>'__ROOT__/index.php/Introduce/introteam.html', ); ?>
		
		<!--导航-->
		<div id="nav">
			<?php $nav_key = array_keys($nav); $nav_val = array_values($nav); $total = count($nav); for($i = 0; $i < count($nav); $i++) { echo '<div class="nav_item"'; if($i == $total-1) echo 'style="background:none"'; echo '><a style="border:0px solid" href='.$nav_val[$i].'>'.$nav_key[$i].'</a></div>'; } ?>
		</div>
		
	</div>
	<div class="modal" id="login_show" style="width:450px;display:none;" >
	  <div class="modal-header">
		<a class="close" data-dismiss="modal" id="close" href="#">×</a>
		<h3>三月软件工作室_登录</h3>
	  </div>
	  <div class="modal-body">
		<p>用户名:&nbsp;&nbsp;&nbsp;
		<input type="text" style="height:30px" id="login_user" class="span3" placeholder="请输入用户名"></p>
		<p>密&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;&nbsp;
		<input style="height:30px" class="span3" id="login_pwd" type="password" placeholder="请输入密码"></p>
	  </div>
	  <div class="modal-footer">
		<a href="#" class="btn" data-dismiss="modal">取消</a>
		<a href="#" id="btn_login" class="btn btn-primary">登录</a>
	  </div>
	</div>
	<script type="text/javascript">
		//控制登陆框兼容性
		$(function(){
			if(document.all){
				$("#login_show").addClass("login_show_1");
			}
			
			$("#login_title").click(function(){
				$("#btn_bool").attr("value",'1');
			});
		});	
	</script>

<input type="hidden" class="nav" value="0">
	<head>
		<link href="/March/Common/css/index/index.css" rel="stylesheet">
		<style>
			body{padding:0px;margin:0px;
	background:url("__ROOT__/March/Common/img/index/bg.png");background-repeat:repeat-x;background-color:#FAFCFD;}
		</style>
	</head>
	<!--滚动切换图片-->
	<iframe height="350px" width="100%" style="background:transparent" allowtransparency="true"  frameborder="0" scrolling="no" src="__URL__/index_rmg"></iframe>
	
	<div id="intro_top">
		<!--简介-->
		<div class="intro_item">
			<div class="intro" id="intro_img"></div>
			<div class="intro" id="intro_txt"></div>
			<div class="intro_con" style="color:black;font-size:12px;height:130px;padding-left:0px">
				<?php echo ($intro); ?>
			</div>
			<div style="text-align:left;float:left;width:200px;padding-left:20px;">...</div>
			
			<div class="morecon">
				<a href="__ROOT__/index.php/Introduce/introteam.html" target="_blank">详细介绍</a>
			</div>
			
			<div style="clear:both"></div>
		</div>
		
		<!--新闻动态-->
		<div class="intro_item">
			<div class="intro" id="news_img"></div>
			<div class="intro" id="news_txt"></div>
			<div class="intro_con" style="padding-left:0px;line-height:18px">
				<!-- 新闻列表 -->
				<?php if(is_array($nlist)): $i = 0; $__LIST__ = $nlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nl): $mod = ($i % 2 );++$i;?><div class="news_list">
						<div id="n_tl">
							<a href="__ROOT__/index.php/News/show/nid/<?php echo ($nl[idmarch_news]); ?>.html"
							 title="<?php echo ($nl[news_title]); ?>" target="_blank"><?php echo ($nl['news_title']); ?></a>
						 </div>
						 <div id="n_date">
						 	<?php echo substr($nl["news_date"],0,10); ?><!-- <?php echo ($nl[news_date]); ?> -->
						 </div>
						 <div style="clear:both"></div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				
			</div>
			<div class="morecon">
				<a href="__ROOT__/index.php/News.html" target="_blank">更多新闻</a>
			</div>
			<div style="clear:both"></div>
		</div>
		
		<!--精华博客-->
		<div class="intro_item" style="background:none">
			<div class="intro" id="blog_img"></div>
			<div class="intro" id="blog_txt"></div>
			<div class="intro_con" style="width:100%">
				<!-- 新闻列表 -->
				<?php if(is_array($blog)): $i = 0; $__LIST__ = $blog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nl): $mod = ($i % 2 );++$i;?><div class="news_list">
						<div id="n_tl">
							<a href="__ROOT__/index.php/Knowledge/show/id/<?php echo ($nl[article_id]); ?>.html"
							 title="<?php echo ($nl[article_title]); ?>" target="_blank"><?php echo ($nl['article_title']); ?></a>
						 </div>
						 <div id="n_date">
						 	<?php echo ($nl[news_date]); ?>
						 </div>
						 <div style="clear:both"></div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			
			<div class="morecon">
				<a href="__ROOT__/index.php/Knowledge/knowledge.html" target="_blank">全部博客</a>
			</div>
			
			<div style="clear:both"></div>
		</div>
		
		<div style="clear:both"></div>
	
	</div>
	
	<div id="project">
		<div class="pro_item" id="pro_l"></div>
		<div class="pro_item" id="pro_m"><img src="__ROOT__/March/Common/img/index/project/txt.png"></div>
		<div class="pro_item" id="pro_r" style="float:right"></div>
		<div class="pro_item" id="pro_more" style="float:right">
			<a href="__ROOT__/index.php/Project/project.html" target="_blank">
				<img src="__ROOT__/March/Common/img/index/project/w2.png">
			</a>
		</div>
	</div>
	
	<div id="pro_show" class="row-fluid">
		<ul class="thumbnails">
		<?php if(is_array($project)): $i = 0; $__LIST__ = $project;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><li class="span4.5" style="float:left;display:inline-block;margin-left:30px;">
			 <a href="javascript:void(0);" class="thumbnail" title="<?php echo ($pro[project_title]); ?>">
		     <div style="background:url(<?php echo ($pro[project_img]); ?>);background-size: 100%; width:290px;height:456px;"></div>
		    </a>
		   </li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<div style="clear:both"></div>
	</div>
	
	
  </div>
	
	</div>
	 </center>

 <div id='footTop'>
	  <div id="foot">
		<div style="padding-top:50px;text-align:center;color:white">
			CopyRight &copy; 三月软件&nbsp;&nbsp;河南伽马信息技术有限公司&nbsp;&nbsp;
			<a style = "color:#394749" href="http://www.miitbeian.gov.cn/" target="_blank">豫ICP备14025783号</a>
		</div>
	  </div>
  </div>
  <script src="__ROOT__/Common/js/jquery.js" style="text/javascript"></script>
  <script src="__ROOT__/Common/js/bootstrap-modal.js" style="text/javascript"></script>
  <script src="__ROOT__/March/Common/js/common.js" style="text/javascript"></script>
  <script src="__ROOT__/March/Common/js/login.js" style="text/javascript"></script>

 </BODY>
</HTML>