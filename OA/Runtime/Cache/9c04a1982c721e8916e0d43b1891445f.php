<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML><HTML><HEAD><TITLE>小组OA</TITLE><meta http-equiv="content-type" content="text/html; charset=utf-8"><META NAME="Generator" CONTENT="EditPlus"><META NAME="Author" CONTENT=""><META NAME="Keywords" CONTENT=""><META NAME="Description" CONTENT=""><link href="__ROOT__/Common/css/bootstrap.css" rel="stylesheet"><script type="text/javascript" src="__ROOT__/Common/js/jquery.js"></script><script type="text/javascript" src="__ROOT__/Common/js/bootstrap.min.js"></script><script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/DatePicker/WdatePicker.js"></script><script src="__ROOT__/OA/Common/alert/alert.js"></script><div id="alert" ><div  class=" alert message fade in hide"><a class="dismiss close" data-dismiss="alert">��</a><label><?php echo $msg;$msg=null; ?></label></div></div><?php if(!empty($msg)): ?><literal><script type="text/javascript">		$(function(){
			$(".alert").show();
		})
	</script></literal><?php endif; ?><link href="__ROOT__/OA/Common/css/Index/header.css" rel="stylesheet"><script src="__ROOT__/OA/Common/js/header.js"></script></HEAD><BODY><div id="head"><ul><li><img src="__ROOT__/OA/Common/img/top_one.png"/></li><li><a href="http://www.marchsoft.cn" target="_new">三月软件工作室首页</a></li><?php if($_SESSION["login"]): ?><!-- 只有管理员才显示事物管理 --><li><img src="__ROOT__/OA/Common/img/top_two.png"/></li><li><a href="__ROOT__/oa.php/Personal/thing">事务管理</a></li><?php endif; ?><li><img src="__ROOT__/OA/Common/img/top_three.png"/></li><li><a javascript:void(0)>手机版</a></li><li><img src="__ROOT__/OA/Common/img/top_four.png"/></li><li class="dropdown"><a javascript:void(0) class="dropdown-toggle" data-toggle="dropdown"><?php echo ($_SESSION['user_login']); ?></a><ul class="dropdown-menu" style="min-width:80px;margin-left:-20px;"><?php if($_SESSION['login']): ?><!-- 只有管理员才能跳转到事物管理 --><li><a href="__ROOT__/oa.php/Personal/thing"><i class="icon-home"></i>&nbsp;个人中心</a></li><?php else: ?><li><a href="__ROOT__/oa.php/Personal/data"><i class="icon-home"></i>&nbsp;个人中心</a></li><?php endif; ?><li><a name="doLogout" javascript:void(0) ><i class="icon-folder-close"></i>&nbsp;退出系统</a></li></ul></li></ul></div><div id="navigation"><div id="oa">marchsoft--OA</div><div class="navbar"><div class="navbar-inner"><ul class="nav"><li><a id="nav_point1" href="__ROOT__/oa.php/Index/index">首&nbsp&nbsp页</a></li><li><a id="nav_point2" href="__ROOT__/oa.php/Blog/myblog/type/0">我的笔记</a></li><li><a id="nav_point3" href="__ROOT__/oa.php/Jotting/index">我的随笔</a></li><li><a id="nav_point4" href="__ROOT__/oa.php/Blog/myblog/type/1">我的博客</a></li><li><a id="nav_point5" href="__ROOT__/oa.php/Notice/index">通知公告</a></li><li><a id="nav_point6" href="__ROOT__/oa.php/News/newslist">大事记</a></li><li><a id="nav_point7" href="__ROOT__/oa.php/Addressbook/index">通讯录</a></li><?php if($_SESSION['login']): ?><!-- 只有管理员才能跳转到事物管理 --><li><a id="nav_point8" href="__ROOT__/oa.php/Personal/thing">个人中心</a></li><?php else: ?><li><a id="nav_point8" href="__ROOT__/oa.php/Personal/data">个人中心</a></li><?php endif; ?></ul></div></div><div class="search"><input type="text"><a javascript:void(0)><img src="__ROOT__/OA/Common/img/search.png"/></a></div></div><div style="clear:both"></div><input type="hidden" id="url" value="__URL__"/><input type="hidden" id="app" value="__APP__"/><input type="hidden" id="root" value="__ROOT__"/><input type="hidden" id="nav_point" value="<?php echo ($_SESSION['nav_point']); ?>"><!-- 选中导航的样式 --><input type="hidden" id="two_level_nav" value="<?php echo ($_SESSION['two_level_nav']); ?>"><!-- 选中笔记个人中心的样式 --><input type="hidden" id="date" value="<?php echo ($date); ?>"><!-- 存储今天的日期 --><input type="hidden" id="notice_count" value="<?php echo ($count); ?>"><!-- 选择的日期公告的数量 --><!--Tags 插件引用的文件--><link rel="stylesheet" type="text/css" href="__ROOT__/OA/Common/Tags/css/master.css"><link rel="stylesheet" type="text/css" href="__ROOT__/OA/Common/Tags/css/jquery.tagit.css"><link rel="stylesheet" type="text/css" href="__ROOT__/OA/Common/Tags/css/tagit.ui-zendesk.css"><script src="__ROOT__/OA/Common/Tags/js/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script><script src="__ROOT__/OA/Common/Tags/js/tag-it.js"></script><script src="__ROOT__/OA/Common/Tags/js/tag.js"></script><!-- 编辑框链接文件--><script type="text/javascript" src="__ROOT__/Common/ueditor/ueditor.config.js"></script><script type="text/javascript" src="__ROOT__/Common/ueditor/ueditor.all.js"></script><link rel="stylesheet" href="__ROOT__/Common/ueditor/themes/default/css/ueditor.css"/><script type="text/javascript">    var editor = new UE.ui.Editor();
    UE.getEditor('myEditor');
</script><script src="__ROOT__/OA/Common/js/thing/news.js"></script><div id="content"><?php if($_SESSION['login']): ?><div class="left"><a href="__URL__/thing"><div id="p_thing" class="left_img"><img src="__ROOT__/OA/Common/img/p_thing.png"/><br/>事务管理</div></a><a href="__URL__/data"><div id="p_data" class="left_img"><img src="__ROOT__/OA/Common/img/p_data.png"/><br/>个人资料</div></a><a href="__URL__/course"><div id="p_course" class="left_img"><img src="__ROOT__/OA/Common/img/p_course.png"/><br/>课表管理</div></a><a href="__URL__/photo"><div id="p_photo" class="left_img"><img src="__ROOT__/OA/Common/img/p_photo.png"/><br/>修改头像</div></a><a href="__URL__/password"><div id="p_pwd" class="left_img"><img src="__ROOT__/OA/Common/img/p_pwd.png"/><br/>修改密码</div></a></div><?php else: ?><div class="left"><a href="__URL__/data"><div id="p_data" class="left_img"><img src="__ROOT__/OA/Common/img/p_data.png"/><br/>个人资料</div></a><a href="__URL__/course"><div id="p_course" class="left_img"><img src="__ROOT__/OA/Common/img/p_course.png"/><br/>课表管理</div></a><a href="__URL__/photo"><div id="p_photo" class="left_img"><img src="__ROOT__/OA/Common/img/p_photo.png"/><br/>修改头像</div></a><a href="__URL__/password"><div id="p_pwd" class="left_img"><img src="__ROOT__/OA/Common/img/p_pwd.png"/><br/>修改密码</div></a></div><?php endif; ?><div class="right add_news"><div class="title"><a href="__URL__/news/type/<?php echo ($type); ?>">返回>></a><?php if(($type == 1) and ($list["idmarch_news"] == 0)): ?>新增新闻
			<?php elseif(($type == 1) and ($list["idmarch_news"] != 0)): ?>				编辑新闻
			<?php elseif(($type == 3) and ($list["idmarch_news"] == 0)): ?>				新增大事件
			<?php elseif(($type == 3) and ($list["idmarch_news"] != 0)): ?>				编辑大事件<?php endif; ?></div><input type="hidden" name="idmarch_news" value="<?php echo ($list["idmarch_news"]); ?>"><input type="hidden" name="type" value="<?php echo ($type); ?>"><div class="row">			置顶：<input class="checkbox" type="checkbox" name="news_stick" value="<?php echo ($list["news_stick"]); ?>" <?php if($list["news_stick"] > 0): ?>checked<?php endif; ?>></div><div class="row">			标题：<input type="text" name="title" value="<?php echo ($list["news_title"]); ?>"></div><div class="textarea">			内容：<div><textarea id="myEditor" name="content" style="width:100%;height:400px"><?php echo ($list["news_content"]); ?></textarea></div></div><input type="button" name="add_edit" class="button button_one" value="确定"><input type="button" value="取消" class="button button_two" onClick="location.href='__URL__/news/type/<?php echo ($type); ?>'"></div><div style="clear:both"></div></div><div id="fooder">CopyRight 三月软件工作室&nbsp;&nbsp;<a style = "color:#f5f5f5" href="http://www.miitbeian.gov.cn/" target="_blank">豫ICP备14025783号</a></div></BODY></HTML>