<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="__ROOT__/OA/Common/css/User.css" /><link rel="stylesheet" type="text/css" href="__ROOT__/March/Common/css/Grow/index.css" /><!DOCTYPE HTML><HTML><HEAD><TITLE>小组OA</TITLE><meta http-equiv="content-type" content="text/html; charset=utf-8"><META NAME="Generator" CONTENT="EditPlus"><META NAME="Author" CONTENT=""><META NAME="Keywords" CONTENT=""><META NAME="Description" CONTENT=""><link href="__ROOT__/Common/css/bootstrap.css" rel="stylesheet"><script type="text/javascript" src="__ROOT__/Common/js/jquery.js"></script><script type="text/javascript" src="__ROOT__/Common/js/bootstrap.min.js"></script><script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/DatePicker/WdatePicker.js"></script><script src="__ROOT__/OA/Common/alert/alert.js"></script><div id="alert" ><div  class=" alert message fade in hide"><a class="dismiss close" data-dismiss="alert">��</a><label><?php echo $msg;$msg=null; ?></label></div></div><?php if(!empty($msg)): ?><literal><script type="text/javascript">		$(function(){
			$(".alert").show();
		})
	</script></literal><?php endif; ?><link href="__ROOT__/OA/Common/css/Index/header.css" rel="stylesheet"><script src="__ROOT__/OA/Common/js/header.js"></script></HEAD><BODY><div id="head"><ul><li><img src="__ROOT__/OA/Common/img/top_one.png"/></li><li><a href="http://www.marchsoft.cn" target="_new">三月软件工作室首页</a></li><?php if($_SESSION["login"]): ?><!-- 只有管理员才显示事物管理 --><li><img src="__ROOT__/OA/Common/img/top_two.png"/></li><li><a href="__ROOT__/oa.php/Personal/thing">事务管理</a></li><?php endif; ?><li><img src="__ROOT__/OA/Common/img/top_three.png"/></li><li><a javascript:void(0)>手机版</a></li><li><img src="__ROOT__/OA/Common/img/top_four.png"/></li><li class="dropdown"><a javascript:void(0) class="dropdown-toggle" data-toggle="dropdown"><?php echo ($_SESSION['user_login']); ?></a><ul class="dropdown-menu" style="min-width:80px;margin-left:-20px;"><?php if($_SESSION['login']): ?><!-- 只有管理员才能跳转到事物管理 --><li><a href="__ROOT__/oa.php/Personal/thing"><i class="icon-home"></i>&nbsp;个人中心</a></li><?php else: ?><li><a href="__ROOT__/oa.php/Personal/data"><i class="icon-home"></i>&nbsp;个人中心</a></li><?php endif; ?><li><a name="doLogout" javascript:void(0) ><i class="icon-folder-close"></i>&nbsp;退出系统</a></li></ul></li></ul></div><div id="navigation"><div id="oa">marchsoft--OA</div><div class="navbar"><div class="navbar-inner"><ul class="nav"><li><a id="nav_point1" href="__ROOT__/oa.php/Index/index">首&nbsp&nbsp页</a></li><li><a id="nav_point2" href="__ROOT__/oa.php/Blog/myblog/type/0">我的笔记</a></li><li><a id="nav_point3" href="__ROOT__/oa.php/Jotting/index">我的随笔</a></li><li><a id="nav_point4" href="__ROOT__/oa.php/Blog/myblog/type/1">我的博客</a></li><li><a id="nav_point5" href="__ROOT__/oa.php/Notice/index">通知公告</a></li><li><a id="nav_point6" href="__ROOT__/oa.php/News/newslist">大事记</a></li><li><a id="nav_point7" href="__ROOT__/oa.php/Addressbook/index">通讯录</a></li><?php if($_SESSION['login']): ?><!-- 只有管理员才能跳转到事物管理 --><li><a id="nav_point8" href="__ROOT__/oa.php/Personal/thing">个人中心</a></li><?php else: ?><li><a id="nav_point8" href="__ROOT__/oa.php/Personal/data">个人中心</a></li><?php endif; ?></ul></div></div><div class="search"><input type="text"><a javascript:void(0)><img src="__ROOT__/OA/Common/img/search.png"/></a></div></div><div style="clear:both"></div><input type="hidden" id="url" value="__URL__"/><input type="hidden" id="app" value="__APP__"/><input type="hidden" id="root" value="__ROOT__"/><input type="hidden" id="nav_point" value="<?php echo ($_SESSION['nav_point']); ?>"><!-- 选中导航的样式 --><input type="hidden" id="two_level_nav" value="<?php echo ($_SESSION['two_level_nav']); ?>"><!-- 选中笔记个人中心的样式 --><input type="hidden" id="date" value="<?php echo ($date); ?>"><!-- 存储今天的日期 --><input type="hidden" id="notice_count" value="<?php echo ($count); ?>"><!-- 选择的日期公告的数量 --><style>   .pic_b {
		display: block;
		padding: 0px;
		margin-bottom: 10px;
		border: 1px solid #CDD5DA;
		background-color: #fff;
		text-decoration: none;
		
	}
	.pic_b img {
		display: block;
		padding: 5px;
		border: 0;
		width: 280px;
		vertical-align: bottom;
	}
	.pic_b strong {
		color: #333;
	}	
	a:hover{
		padding:0px;
		margin:0px;
		 border: 0px solid #74C1E9;
		text-decoration: none;
		color: #4184B4;	
	}
	.righ{
		margin-left:180px;
		margin-top: 20px;
}
</style><script>       function ReSizePic(ThisPic){
		    var RePicWidth = 300; //这里修改为您想显示的宽度值
		    var TrueWidth = ThisPic.width;    //图片实际宽度
		    var TrueHeight = ThisPic.height;  //图片实际高度
		    var Multiple = TrueWidth / RePicWidth;  //图片缩小(放大)的倍数
		    ThisPic.width = RePicWidth;  //图片显示的可视宽度
		    ThisPic.height = TrueHeight / Multiple;  //图片显示的可视高度
		    
	   }
</script><div id="content"><div class="left"><a href="__URL__/index"><div id="b_myblog" class="left_img"><img src="__ROOT__/OA/Common/img/b_myblog.png"/><br/>随笔列表</div></a><a href="__URL__/jottinglist"><div id="b_addblog" class="left_img"><img src="__ROOT__/OA/Common/img/b_addblog.png"/><br/>新增随笔</div></a><a target="_new" href="__ROOT__/index.php/Grow/index"><div id="p_photo" class="left_img"><img src="__ROOT__/OA/Common/img/p_photo.png"/><br/>成员随笔</div></a></div><div class="righ"><div id='container' style="width:auto;height:auto;"><span id="waterFallColumn_0" class="column" style="margin-left:60px;width:332px;"><div  class = "divs"style="border:2px dashed #C3C3C3;border-radius:5px;width:330px;height:140px;background-color:#ffffff;margin-right:10px;margin-top:20px;text-align:center;"><a href="__ROOT__/oa.php/Jotting/jottinglist"><img style="margin-top:30px"src="__ROOT__/OA/Common/img/zengjia.png"></a></div><?php echo ($arr[2]); ?></span><span id="waterFallColumn_1" class="column" style="margin-left:10px;width:332px;"><?php echo ($arr[0]); echo ($arr[3]); ?></span><span id="waterFallColumn_2" class="column" style="margin-left:10px;width:332px;"><?php echo ($arr[1]); echo ($arr[4]); ?></span><span id="waterFallDetect" class="column" style="width:332px;"></span></div></div></div><div id="fooder">CopyRight 三月软件工作室&nbsp;&nbsp;<a style = "color:#f5f5f5" href="http://www.miitbeian.gov.cn/" target="_blank">豫ICP备14025783号</a></div></BODY></HTML><input id="HROOT"type="hidden"value="__ROOT__"><input type="hidden"id="hidden3"value=<?php echo ($list3[0]['count(*)']); ?>><input type="hidden"id="hidden4"value=<?php echo ($_SESSION['sum']); ?>><script src="__ROOT__/OA/Common/js/grow.js" style="text/javascript"></script>