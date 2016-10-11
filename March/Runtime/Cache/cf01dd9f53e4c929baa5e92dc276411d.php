<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
 <HEAD>
  <TITLE>三月软件工作室</TITLE>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <META NAME="Generator" CONTENT="EditPlus">
  <META NAME="fanchangfa" CONTENT="">
  <META NAME="Keywords" CONTENT="三月软件工作室,三月,软件,三月软件,工作室">
  <META NAME="Description" CONTENT="">
  <link href="__ROOT__/March/Common/css/lecture_common.css" rel="stylesheet">
  <link rel="stylesheet" href="__ROOT__/Common/css/bootstrap.css" type="text/css" />
  <script type="text/javascript" src="__ROOT__/Common/js/jquery.js"></script>
  <script type="text/javascript" src="__ROOT__/Common/js/bootstrap.min.js"></script>
   
   <link href="__ROOT__/March/Common/css/index/contact.css" rel="stylesheet">
    <link href="__ROOT__/March/Common/css/lecture/index.css" rel="stylesheet">
    
    <script src="__ROOT__/OA/Common/js/header.js" type="text/javascript"></script><!-- 在前台退出时,调用后台中的Index模块下的doLogout方法 -->

    <!-- 前台显示的公告讲座 -->
    <link rel="stylesheet" href="__ROOT__/March/Common/lecture/css/style.css" type="text/css" />
    <script src="__ROOT__/March/Common/lecture/js/jquery.mousewheel.js" type="text/javascript"></script> 
    <script src="__ROOT__/March/Common/lecture/js/lecture.js" type="text/javascript"></script>
    <script src="__ROOT__/March/Common/js/login.js" style="text/javascript"></script>

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
	<center>
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
	</center>
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

<!--公告讲座界面 -->

    <div class="zuo"><a href="javascript:;"></a></div>
    <div class="you"><a href="javascript:;"></a></div>

    <div class="news_rq">
      <div class="news_rq2"><?php echo ($list[0]["lecture_date"]); ?></div>
        <div class="news_dian">
            <?php if(is_array($list)): foreach($list as $key=>$val): ?><div class="inline"></div><?php endforeach; endif; ?>
        </div>
    </div>

    <div class="news" id="news_list">
        <div id="news_div">
            <?php if(is_array($list)): foreach($list as $key=>$val): ?><div class="inline" id="<?php echo ($val["idmarch_lecture"]); ?>" time="<?php echo ($val["lecture_date"]); ?>">
                    <div class="news_nr">
                        <img src="__ROOT__/OA/Common/img/lecture/m_<?php echo (($val['lecture_img'])?($val['lecture_img']):'no.png'); ?>" width="250" />
                        <h2><?php echo ($val["lecture_theme"]); ?></h2> <!-- 讲课主题 -->
                        <div class="content">[<b><?php echo ($val["lecture_user"]); ?></b>]&nbsp;&nbsp;<?php echo ($val["lecture_content"]); ?></div><!-- 讲课人、讲课内容 -->
                    </div>
                </div><?php endforeach; endif; ?>
        </div>
    </div>
    <div id="haha" style="display:none"><script src="http://s24.cnzz.com/stat.php?id=4285839&web_id=4285839" language="JavaScript"></script>
    </div>

<input type="hidden" id="lecture_count" value="<?php echo ($lecture_count); ?>"><!-- 当前显示讲课的数量 -->

<!-- 选择一个讲课显示的模态对话框，打开一个视频 -->
<div id="big" class="modal hide" data-backdrop="static" style="overflow:visible;">
    <a data-dismiss="modal" aria-hidden="true" style="display:block;width:39px;height:39px;position:absolute;top:-20px;right:-20px;cursor:pointer"><img src="__ROOT__/March/Common/img/lecture/lecture_close.png"/></a>
    <div class="modal-body">
        <embed quality="high" width="530" height="400" align="middle" allowScriptAccess="allways" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
    </div>
</div>