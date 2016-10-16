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

<style>  
    #centerOne{
    	 background:url("__ROOT__/March/Common/img/grow/bg_show.png");
    }
    #centerTwo{
    	background:url("__ROOT__/March/Common/img/grow/bg.png");
    	
    }
	body{
		padding:0px;margin:0px;
       background:url("__ROOT__/March/Common/img/index/bg.png");
       background:url("__ROOT__/March/Common/img/grow/bg.png");
      
      
    }
    #line{
    	position: relative;
    	top: 0px;
    	left: 30px;
    	width: 6px;
    	height: 600px;
    }
    .divs,.divs1{
    	width:281px;margin-right:10px;margin-top:25px;
    }
    .divs1,.divs{
    	box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    }
     .divs2{
     	margin-top:10px;
     	padding-left:20px;
     	padding-top:10px;
     	float:left;
     	font-size:18px;
     	color:#333333;
     }
     #foot{background:url("__ROOT__/March/Common/img/index/foot1.png");height:73px;}
</style>
<script>
   function ReSizePic(ThisPic){
		    var RePicWidth = 270; //这里修改为您想显示的宽度值
		    var TrueWidth = ThisPic.width;    //图片实际宽度
		    var TrueHeight = ThisPic.height;  //图片实际高度
		    var Multiple = TrueWidth / RePicWidth;  //图片缩小(放大)的倍数
		    ThisPic.width = RePicWidth;  //图片显示的可视宽度
		    ThisPic.height = TrueHeight / Multiple;  //图片显示的可视高度
		    
}
</script>

	
<input type="hidden" class="nav" value="0">
</center>
	<center id='centerTwo' >
	<div id='divBody' style="margin-left: 160px;width:auto;height: 900px;">
	    <div id='divleft12' style="margin-top:37px;padding-right: 0px;float:left;width:50px;height:600px;">
	    	 <div id='line' 
	    	 style="background-image:url('__ROOT__/March/Common/img/grow/13.png')">
		    	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
		    <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class='year' style='top:-600px;'onclick=tiaozhuan("<?php echo ($vo['num']); ?>","<?php echo ($vo['str']); ?>")><a href="#<?php echo ($vo['str']); ?>" ><?php echo ($vo['str']); ?></a><img src='__ROOT__/March/Common/img/grow/14.png' /></div><?php endforeach; endif; else: echo "" ;endif; ?>
	    </div>

	    <div  style='float:left;width:960px; height:300px;'>
			<div id='divbg' style="margin-top:40px;margin-left:0px;margin-bottom:1px;height:49px;width:956;
			background-image: url('__ROOT__/March/Common/img/grow/12.png')">
				<div class='float_left'  style='float:left;'>
		          <div class='float'>
			          <ul id="main_box"> 
							<li class="select_box"> 
							<span style="margin-top:5px;">2013年</span>&nbsp<img id="ims" src="__ROOT__/March/Common/img/grow/sanjiao1.png">
							<ul class="son_ul" style="height:80px;border:1px solid #A7C1C8;background:#FAFAFB; filter: alpha(opacity=90); opacity: 0.6;border-radius:3px;scrollbar-highlight-color: #666;"> 
							<?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="lis1"><a href=""style="border:0px solid"><?php echo ($vo['str']); ?>年</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul> 
							</li> 
						</ul>
                  </div>
				 <div class='float'>
					<ul id='mouth'>
                      <li class='mouse_y'>
                          <span style="margin-top:10px;"><?php echo ($arr2); ?>月</span>&nbsp<img id="ims1" src="__ROOT__/March/Common/img/grow/sanjiao1.png">
                          <ul id="uls"style="border:1px solid #A7C1C8;background:#FAFAFB; filter: alpha(opacity=70); opacity: 0.7;border-radius:3px;scrollbar-highlight-color: #666;">
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">01月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">02月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">03月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">04月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">05月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">06月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">07月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">08月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">09月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">10月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">11月</a></li>
                             <li class ="lis"style="background-color:#FAFAFB"><a style="border:0px solid"href="">12月</a></li>
                          </ul> 
                      </li>

					</ul> 
		         </div>
	           </div>
	           
			</div>
			<div id='container' style="margin-left:20px;height:auto;">
	          <span id="waterFallColumn_0" class="column" style="margin-left:5px;width:300px;"><?php echo ($arr[0]); echo ($arr[3]); ?></span> 
	          <span id="waterFallColumn_1" class="column" style="margin-left:5px;width:300px;"><?php echo ($arr[1]); echo ($arr[4]); ?></span>
	          <span id="waterFallColumn_2" class="column" style="margin-left:5px;width:300px;"><?php echo ($arr[2]); echo ($arr[5]); ?></span> 
	          <span id="waterFallDetect" class="column" style="width:300px;"></span>
	          <div style="height:200px;"></div>
			</div>

	    </div>

	</div>
	<input type="hidden"id="hidden0"value="__ROOT__">
	<input type="hidden"id="hidden1"value=<?php echo ($arr1); ?>>
	<input type="hidden"id="hidden2"value=<?php echo ($arr2); ?>>
	<input type="hidden"id="hidden3"value=<?php echo ($list3[0]['count(*)']); ?>>
	<input type="hidden"id="hidden4"value=<?php echo ($_SESSION['sum']); ?>>
	</div>
	 </center>

 <div id='footTop'>
	 <div  style='width:auto;height:200px;background-image: url("__ROOT__/March/Common/img/grow/last.png")'>
	 </div>
	   <div id="foot">
		<div style="padding-top:30px;text-align:center;color:#389CBE">
			CopyRight &copy; 三月软件工作室
		</div>
	  </div> 
  </div>
  <script src="__ROOT__/Common/js/jquery.js" style="text/javascript"></script>
  <script src="__ROOT__/Common/js/bootstrap-modal.js" style="text/javascript"></script>
  <script src="__ROOT__/March/Common/js/common.js" style="text/javascript"></script>
  <script src="__ROOT__/March/Common/js/login.js" style="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="__ROOT__/March/Common/css/Grow/index.css" />
<script src="__ROOT__/March/Common/js/grow.js" style="text/javascript"></script>

 </BODY>
</HTML>