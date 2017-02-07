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

</center>
<link href="__ROOT__/March/Common/css/prize/prize.css" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
	.leftcon{
		/*height: 100%;*/
		width: 622px;
		background: #052b44;
		border-radius: 5px;
		padding: 40px;
		overflow: hidden;
		margin-bottom: 20px;
	}
	.Ptop{
		color: rgb(196,178,0);
	}
	.Ptwo{
		width: 100%;
	}
	
	/*.Psec{
		display: inline-block;
		margin-top: 45px;
		height: 350px;
		
	}*/
	.Psec1 {
		position: absolute;
		width:180px; 
		height:180px; 
		border-radius:50%; 
		overflow:hidden;
		border: 3px solid rgb(196,178,0);
		margin-left: 45px;
		margin-top: 20px;
	}
	.Psec1 img{
		width:180px; 
	}
	.Psec2{
		width: 280px;
		overflow: hidden;
		margin-top: 30px;
		margin-left: 315px;
	}
	.Psec2 p{
		color: rgb(196,178,0);
		font-size: 18px;
		line-height: 30px;
		white-space: nowrap;
	}
	.Ptop2 {
		margin-top: 30px;
		color: rgb(196,178,0);
	}
	.Ptop2 h1{
		text-align: right;
	}
	.Ptwo2{
		color: white;
		line-height:1.5em;
		min-height: 300px;
		padding:20px 40px; 
	}
	.Ptop3 {

		margin-top: 30px;
		color: rgb(196,178,0);
	}
	.Ptwo3{
		color: white;
		line-height:1.5em;
		min-height: 300px;
		padding:20px 40px; 
	}
</style>
<div class="conbody">
	<div class="conmain">
		<div class="rightcon">
			<div class="prize mod">
				<div class="title">
					<h3>三月奖项</h3>
				</div>
				<p>三月软件奖学金是由三月软件小组毕业生于2016年3月创立，三月软件奖学金旨在鼓励软件开发技术优秀的在校大学生，帮助其获得更好的发展，设有卓越奖学金和新锐奖学金，每年评选一次。卓越奖学金每年10月颁发，新锐奖学金每年3月颁发。</p>
			</div>
			<div class="zeng mod">
				<div class="title">
					<h3>捐赠墙</h3>
					<a target="_blank"  href="prize.html" >更多>></a>
				</div>
				<?php if(!$clist): ?><div class="zenglist">暂无</div><?php endif; ?>
				<div class="zenglist best">累计最高:<?php echo ($name); ?>总共捐献￥<?php echo ($n); ?></div>
				<div class="zenglist best">单次最高:<?php echo ($s1['don_name']); ?>一次捐献￥<?php echo ($s1['don_num']); ?></div>
				<?php if(is_array($clist)): foreach($clist as $key=>$vo): ?><div class="zenglist list"><?php echo ($vo['don_name']); ?>： <?php echo ($vo['don_mark']); ?></div><?php endforeach; endif; ?>
			</div>
			<div class="erwei mod">
				<div class="title">
					<h3>捐赠我们</h3>
					<a href="">更多方式>></a>
				</div>
				<img title="支付宝二维码"  src="__ROOT__/March/Common/img/prize/erwei.jpg">
				<h3>手机支付宝扫描二维码支付</h3>
				<h4>&nbsp;您的帮助是对我们最大的支持和动力！</h4>
			</div>
		</div>


		<div class="leftcon">
			<!-- <div class="t1 don"> -->
			<div class="Ptop">
				<h1>个人基本信息</h1>
				<img src="__ROOT__/March/Common/img/prize/a1.png">
			</div>
			<div class="Ptwo">
				<!-- <div class="Psec "> -->
				<div  class="Psec1">
				    <img src="<?php echo ($content['prize_img']); ?>">
				</div>
				<!-- </div> -->
				<div  class="Psec2">
				    <p>姓 &nbsp;&nbsp;名:<font color="white">&nbsp;&nbsp;<?php echo ($content['prize_name']); ?></font></p>
				    <p>班 &nbsp;&nbsp;级:<font color="white">&nbsp;&nbsp;<?php echo ($content['prize_class']); ?></font></p>
				    <p>学 &nbsp;&nbsp;院:<font color="white">&nbsp;&nbsp;<?php echo ($content['prize_col']); ?></font></p>
				    <p>专 &nbsp;&nbsp;业:<font color="white">&nbsp;&nbsp;<?php echo ($content['prize_maj']); ?></font></p>
				    <p>电 &nbsp;&nbsp;话:<font color="white">&nbsp;&nbsp;<?php echo ($content['prize_tel']); ?></font></p>
				    <p>E-mail:<font color="white">&nbsp;&nbsp;<?php echo ($content['prize_email']); ?></font></p>	
				</div>
			</div>
			<div class="Ptop2">
				<h1>个人学习经历</h1>
				<img src="__ROOT__/March/Common/img/prize/a2.png">
			</div>
			<div class="Ptwo2">
				<?php echo ($content['prize_stucon']); ?>
			</div>
			<div class="Ptop3">
				<h1>项目经历</h1>
				<img src="__ROOT__/March/Common/img/prize/a1.png">
			</div>
			<div class="Ptwo3">
				<?php echo ($content['prize_procon']); ?>
			</div>
				
			<!-- </div> -->
		</div>
		<div class="clear"> </div>
	</div>
</div>
<input type="hidden" id="rot" value="__ROOT__/" />
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

<script src="__ROOT__/March/Common/js/jquery-1.4.3.min.js" style="text/javascript"></script> 
<script src="__ROOT__/March/Common/js/prize/Scholarship.js" style="text/javascript"></script> 
</BODY>
</HTML>