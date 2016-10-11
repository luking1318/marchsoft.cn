<?php if (!defined('THINK_PATH')) exit();?>    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
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

   <head>  
		<link href="__ROOT__/March/Common/css/introduce/introstuent.css" rel="stylesheet">

	</head>   
    
   <div id="intro_top">
     <span id="top"></span>
	 <div id="intro_link">
	 	<table  width="540px;" cellpadding="0" cellspacing="0" style="font-size:14px; color:#186BA9;">
			<tr align="center" height="40px;">
				<td ><a href="__URL__/introteam">团队简介</a></td>
				<td><a href="__URL__/introteacher">老师简介</a></td>
				<td><a href="__URL__/introstudent">毕业生简介</a></td>
			</tr>
		</table>
	 </div>
	</div>
	<div id="intro_name">
		<div id="name_up">
			<div id="studentlevel">
				<div id="level_up">
					<div id="sixlevel" >
						<div id="firstlevel" style="width:16px; height:16px;" class="selectlevel"></div>
					</div>
					<?php if(is_array($arrlevel)): $i = 0; $__LIST__ = $arrlevel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="nextlevel">
						   <a href="#to<?php echo ($vo); ?>"><div style="width:16px; height:16px; float:right" class="selectlevel"></div><a>
					    </div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div id="level_down">
					<div id="levelname">2003级</div>
					<?php if(is_array($arrlevel)): $i = 0; $__LIST__ = $arrlevel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="nextname"><?php echo ($vo); ?>级</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
		</div>
		<div id="name_down"></div>
	</div>
	<div id="studentcon">
	  <?php if(is_array($arrlevel1)): $i = 0; $__LIST__ = $arrlevel1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span id="to<?php echo ($vo); ?>"></span>
		 <div class="listitem">
			<div class="item_head">   
				<div class="head_up">
					<div class="level"><?php echo ($vo); ?>级</div>
					<a href="#top"><div class="toup"></div></a>
				</div>
				<div class="head_down"></div>
			</div>
			<div class="item_con">
				<table class="table table-bordered"  width="800" cellpadding="0" cellspacing="0" border="1" style=" font-size:13px;">
					<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if($vo1['level'] == $vo): ?><tr height="130px">
							<td width="115px" valign="top">
								<div class="studentimg">
									<?php if($vo1['avator'] == '' ): ?><img  style="height:86px; width:100px; margin-top:14px; margin-left:7px;" src="__ROOT__/Common/img/photo/photo/m_fengmian.jpg"  /><?php endif; ?>
									<?php if($vo1['avator'] != '' ): ?><img  style="height:86px; width:100px; margin-top:14px; margin-left:7px;" src="__ROOT__/Common/img/photo/photo/m_<?php echo ($vo1['avator']); ?>"  /><?php endif; ?>
									
								</div>
							</td>
							<td valign="top">
								<div class="studentname"><?php echo ($vo1['user_name']); ?></div>
								<div class="studentintro"> <?php echo ($vo1['describe']); ?></div>
							</td>
						 </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</table>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
		
	
		
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

<script src="__ROOT__/March/Common/js/introduce/introduce.js" style="text/javascript"></script> 
</BODY>
</HTML>