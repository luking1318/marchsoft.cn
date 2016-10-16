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

  <!-- <link href="__ROOT__/March/Common/css/prize/tt.css" rel="stylesheet"> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <!-- <link rel="stylesheet" href="__ROOT__/March/Common/css/prize/bootstrap.min.css"> -->
   <link href="__ROOT__/March/Common/css/prize/prize.css" rel="stylesheet">
    <link rel="stylesheet" href="__ROOT__/March/Common/css/prize/font-awesome.min.css">
    <link rel="stylesheet" href="__ROOT__/March/Common/css/prize/material-cards.css">
    <link rel="stylesheet" href="__ROOT__/March/Common/css/prize/bootstrap.min.css">
    <style type="text/css">
.material-card.mc-active .mc-content {
    padding-top: 23.6em !important;
    /*height:400px;*/
    height: 112%;
}
.material-card.mc-active .mc-footer {
    top: calc(100% - -41px);
    left: 16px;
    right: 0;
    height: 22px;
    padding-top: 15px;
    padding-left: 25px;
}
.con{
    width: 1002px;
    margin: 0 auto;
    border: 2px solid #888888;
    margin-top:20px; 
}
.col-md-4 {
    width: 27%;
}
.btn-toolbar {
    margin-top: 0px;
    margin-bottom: 9px;
}
</style>

<!-- </head> -->
<!-- <body> -->

<div class="conbody">
<div class="conmain">
<div class="btn-toolbar" role="toolbar">
    <div class="btn-group">
        <button type="button" class="btn btn-default">2016</button>
        <button type="button" class="btn btn-default">2017</button>
        <button type="button" class="btn btn-default">2018</button>
    </div>
</div>
<h3>卓越奖获得者</h3>
    <div class="htmleaf-container">
        <br>
        <section class="container">

            <div class="row active-with-click">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Red">
                        <h2>
                            <span>Christopher Walken</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                The Deer Hunter
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="__ROOT__/March/Common/img/prize/aFirst.jpg">
                            </div>
                            <div class="mc-description">
                                He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War ...
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                           <!--  <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a> -->
                        </div>
                    </article>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Pink">
                        <h2>
                            <span>Sean Penn</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                Mystic River
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="__ROOT__/March/Common/img/prize/aFirst.jpg">
                            </div>
                            <div class="mc-description">
                                He has won two Academy Awards, for his roles in the mystery drama Mystic River (2003) and the biopic Milk (2008). Penn began his acting career in television with a brief appearance in a 1974 episode of Little House on the Prairie ...
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <!-- <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a> -->
                        </div>
                    </article>
                </div>
                <!-- <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Purple">
                        <h2>
                            <span>Clint Eastwood</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                Million Dollar Baby
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="__ROOT__/March/Common/img/prize/aFirst.jpg">
                            </div>
                            <div class="mc-description">
                                He rose to international fame with his role as the Man with No Name in Sergio Leone's Dollars trilogy of spaghetti Westerns during the 1960s ...
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a> 
                        </div>
                    </article>
                </div>-->
                <!--</div>-->
                <!-- <div class="row active-with-hover"> -->
               <!--  <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Deep-Purple">
                        <h2>
                            <span>Dustin Hoffman</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                Kramer vs. Kramer
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="__ROOT__/March/Common/img/prize/aFirst.jpg">
                            </div>
                            <div class="mc-description">
                                He has been known for his versatile portrayals of antiheroes and vulnerable characters.[3] He won the Academy Award for Kramer vs. Kramer in 1979 ...
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a>
                        </div>
                    </article>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Indigo">
                        <h2>
                            <span>Edward Norton</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                American History X
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="__ROOT__/March/Common/img/prize/aFirst.jpg">
                            </div>
                            <div class="mc-description">
                                He has been nominated for three Academy Awards for his work in the films Primal Fear, American History X and Birdman. He also starred in other roles ...
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a>
                        </div>
                    </article>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Blue">
                        <h2>
                            <span>Michael Caine</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                Educated Rita
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="__ROOT__/March/Common/img/prize/aFirst.jpg">
                            </div>
                            <div class="mc-description">
                                English actor and author. Renowned for his distinctive working class cockney accent, Caine has appeared in over 115 films and is regarded as a British ...
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a>
                        </div>
                    </article>
                </div> -->



            </div>
        </section>
    </div>
    <hr style="height:1px;border:none;border-top:1px dashed #0066CC;" />
    <h3>新锐奖获得者</h3>
     <div class="htmleaf-container">
        <br>
        <section class="container">

            <div class="row active-with-click">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Red">
                        <h2>
                            <span>Christopher Walken</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                The Deer Hunter
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="__ROOT__/March/Common/img/prize/aFirst.jpg">
                            </div>
                            <div class="mc-description">
                                He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War ...
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                           <!--  <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a> -->
                        </div>
                    </article>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Red">
                        <h2>
                            <span>Christopher Walken</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                The Deer Hunter
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="__ROOT__/March/Common/img/prize/aFirst.jpg">
                            </div>
                            <div class="mc-description">
                                He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War ...
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                           <!--  <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a> -->
                        </div>
                    </article>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <article class="material-card Pink">
                        <h2>
                            <span>Sean Penn</span>
                            <strong>
                                <i class="fa fa-fw fa-star"></i>
                                Mystic River
                            </strong>
                        </h2>
                        <div class="mc-content">
                            <div class="img-container">
                                <img class="img-responsive" src="__ROOT__/March/Common/img/prize/aFirst.jpg">
                            </div>
                            <div class="mc-description">
                                He has won two Academy Awards, for his roles in the mystery drama Mystic River (2003) and the biopic Milk (2008). Penn began his acting career in television with a brief appearance in a 1974 episode of Little House on the Prairie ...
                            </div>
                        </div>
                        <a class="mc-btn-action">
                            <i class="fa fa-bars"></i>
                        </a>
                        <div class="mc-footer">
                            <h4>
                                Social
                            </h4>
                            <!-- <a class="fa fa-fw fa-facebook"></a>
                            <a class="fa fa-fw fa-twitter"></a>
                            <a class="fa fa-fw fa-linkedin"></a>
                            <a class="fa fa-fw fa-google-plus"></a> -->
                        </div>
                    </article>
                </div>
                 </div>
        </section>
    </div>
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

<script src="__ROOT__/March/Common/js/prize/jquery.min.js" type="text/javascript"></script>
 <script src="__ROOT__/March/Common/js/prize/jquery.material-cards.min.js"></script>
<script type="text/javascript">
        $(function () {
            $('.material-card').materialCard({
                icon_close: 'fa-chevron-left',
                icon_open: 'fa-thumbs-o-up',
                icon_spin: 'fa-spin-fast',
                card_activator: 'click'
            });
            $("button").click(function(){
                $("button").css({'background-color':'white','color':'black'});
                $(this).css({'background-color':'#2196f3','color':'white'});
            });

            //        $('.active-with-click .material-card').materialCard();

            // window.setTimeout(function () {
            //     $('.material-card:eq(1)').materialCard('open');
            // }, 2000);

            // $('.material-card').on('shown.material-card show.material-card hide.material-card hidden.material-card', function (event) {
            //     console.log(event.type, event.namespace, $(this));
            // });
        });
    </script>
</script>
</BODY>
</HTML>