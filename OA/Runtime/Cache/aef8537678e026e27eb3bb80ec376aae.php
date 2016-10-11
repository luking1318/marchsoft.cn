<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<HTML>
 <HEAD>
	<TITLE>小组OA</TITLE>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<META NAME="Generator" CONTENT="EditPlus">
	<META NAME="Author" CONTENT="">
	<META NAME="Keywords" CONTENT="">
	<META NAME="Description" CONTENT="">
	<link href="__ROOT__/Common/css/bootstrap.css" rel="stylesheet">
	<script type="text/javascript" src="__ROOT__/Common/js/jquery.js"></script>
	<script type="text/javascript" src="__ROOT__/Common/js/bootstrap.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/DatePicker/WdatePicker.js"></script>

	<script src="__ROOT__/OA/Common/alert/alert.js"></script>
	<div id="alert" >
    <div  class=" alert message fade in hide">
        <a class="dismiss close" data-dismiss="alert">��</a>
        <label><?php echo $msg;$msg=null; ?></label>
    </div>
</div>
<?php if(!empty($msg)): ?><literal>
	<script type="text/javascript">
		$(function(){
			$(".alert").show();
		})
	</script>
</literal><?php endif; ?>
	
	<link href="__ROOT__/OA/Common/css/Index/header.css" rel="stylesheet">
	<script src="__ROOT__/OA/Common/js/header.js"></script>
</HEAD>

 <BODY>
	<div id="head">
	    <ul>
	      <li><img src="__ROOT__/OA/Common/img/top_one.png"/></li>
	      <li><a href="http://www.marchsoft.cn" target="_new">三月软件工作室首页</a></li>
	      <?php if($_SESSION["login"]): ?><!-- 只有管理员才显示事物管理 -->
		      <li><img src="__ROOT__/OA/Common/img/top_two.png"/></li>
		      <li><a href="__ROOT__/oa.php/Personal/thing">事务管理</a></li><?php endif; ?>
	      <li><img src="__ROOT__/OA/Common/img/top_three.png"/></li>
	      <li><a javascript:void(0)>手机版</a></li>
	      <li><img src="__ROOT__/OA/Common/img/top_four.png"/></li>
	      <li class="dropdown"><a javascript:void(0) class="dropdown-toggle" data-toggle="dropdown"><?php echo ($_SESSION['user_login']); ?></a>
			<ul class="dropdown-menu" style="min-width:80px;margin-left:-20px;">
				<?php if($_SESSION['login']): ?><!-- 只有管理员才能跳转到事物管理 -->
			      	<li><a href="__ROOT__/oa.php/Personal/thing"><i class="icon-home"></i>&nbsp;个人中心</a></li>
			    <?php else: ?>
			      	<li><a href="__ROOT__/oa.php/Personal/data"><i class="icon-home"></i>&nbsp;个人中心</a></li><?php endif; ?>
			    <li><a name="doLogout" javascript:void(0) ><i class="icon-folder-close"></i>&nbsp;退出系统</a></li>
			</ul>
	      </li>
	    </ul>
	</div>
 	<div id="navigation">
 		<div id="oa">marchsoft--OA</div>
	 	<div class="navbar">
			<div class="navbar-inner">
			    <ul class="nav">
			      <li><a id="nav_point1" href="__ROOT__/oa.php/Index/index">首&nbsp&nbsp页</a></li>
			      <li><a id="nav_point2" href="__ROOT__/oa.php/Blog/myblog/type/0">我的笔记</a></li>
			      <li><a id="nav_point3" href="__ROOT__/oa.php/Jotting/index">我的随笔</a></li>
			      <li><a id="nav_point4" href="__ROOT__/oa.php/Blog/myblog/type/1">我的博客</a></li>
			      <li><a id="nav_point5" href="__ROOT__/oa.php/Notice/index">通知公告</a></li>
			      <li><a id="nav_point6" href="__ROOT__/oa.php/News/newslist">大事记</a></li>
			      <li><a id="nav_point7" href="__ROOT__/oa.php/Addressbook/index">通讯录</a></li>
			      <?php if($_SESSION['login']): ?><!-- 只有管理员才能跳转到事物管理 -->
			      	<li><a id="nav_point8" href="__ROOT__/oa.php/Personal/thing">个人中心</a></li>
			      <?php else: ?>
			      	<li><a id="nav_point8" href="__ROOT__/oa.php/Personal/data">个人中心</a></li><?php endif; ?>
			    </ul>
			 </div>
	 	</div>
	 	<div class="search"><input type="text"><a javascript:void(0)><img src="__ROOT__/OA/Common/img/search.png"/></a></div>
	</div>
	<div style="clear:both"></div>
	<input type="hidden" id="url" value="__URL__"/>
	<input type="hidden" id="app" value="__APP__"/>
	<input type="hidden" id="root" value="__ROOT__"/>
	<input type="hidden" id="nav_point" value="<?php echo ($_SESSION['nav_point']); ?>"><!-- 选中导航的样式 -->
	<input type="hidden" id="two_level_nav" value="<?php echo ($_SESSION['two_level_nav']); ?>"><!-- 选中笔记个人中心的样式 -->
	<input type="hidden" id="date" value="<?php echo ($date); ?>">	<!-- 存储今天的日期 -->
	<input type="hidden" id="notice_count" value="<?php echo ($count); ?>">	<!-- 选择的日期公告的数量 -->
<script src="__ROOT__/OA/Common/lunbo/jquery.carouFredSel-6.0.4-packed.js"></script>
<script src="__ROOT__/OA/Common/lunbo/lunbo.js"></script>
<link href="__ROOT__/OA/Common/lunbo/lunbo.css" rel="stylesheet">
<script src="__ROOT__/OA/Common/js/notice.js"></script>

<div id="home">
	<div id="left">
		<a href="__APP__/Blog/add_edit/type/0"><div id="h_blog" class="h_left_img"><img src="__ROOT__/OA/Common/img/h_blog.png"/><br/>写笔记</div></a>
		<a href="__APP__/Notice/index"><div id="h_notice" class="h_left_img"><img src="__ROOT__/OA/Common/img/h_notice.png"/><br/>通知公告</div></a>
		<a href="__APP__/Jotting/jottinglist"><div id="h_suibi" class="h_left_img"><img src="__ROOT__/OA/Common/img/h_suibi.png"/><br/>写随笔</div></a>
		<a href="__APP__/Personal/data"><div id="h_data" class="h_left_img"><img src="__ROOT__/OA/Common/img/h_data.png"/><br/>个人资料</div></a>
	</div>
	<div id="home_notice">
		<ul class="nav nav-tabs">
			<?php if(is_array($arr)): foreach($arr as $key=>$val): ?><li id="<?php echo ($val['date']); ?>">
					<a href="__URL__/index/date/<?php echo ($val['date']); ?>"><?php echo ($val["wed"]); ?></a>
					<?php if(($val["count"] > 0) and ($val["today"] == 1)): ?><!-- 今天未读的样式 -->
						<div id="count"><img src="__ROOT__/OA/Common/img/count.png" /><span><?php echo ($val["count"]); ?></span></div>
					<?php elseif($val["count"] > 0): ?>		<!-- 除今天以外未读的样式 -->
						<img id="no_count" src="__ROOT__/OA/Common/img/no_count.png" /><?php endif; ?>
				</li><?php endforeach; endif; ?>
		</ul>
		<div class="border_right" style="height:90%;">
			<div class="one">
				<div class="month"><?php echo substr($date,5,2); ?>月</div>
				<div class="day"><?php echo substr($date,8,2); ?></div>
				<div class="wed"><?php echo ($weekend); ?></div>
			</div>

			<a href="#" id="prev"></a>
			<div id="carousel">
				<?php if(is_array($list)): foreach($list as $key=>$val): ?><div class="content">
						<div class="notice_text"><?php echo ($val['news_content']); ?></div>
						<?php switch($val["active_type"]): case "001": ?><img src="__ROOT__/OA/Common/img/notice_course.png"/><?php break;?>
							<?php case "002": ?><img src="__ROOT__/OA/Common/img/notice_blog.png"/><?php break;?>
							<?php case "003": ?><img src="__ROOT__/OA/Common/img/notice_note.png"/><?php break;?>
							<?php case "004": ?><img src="__ROOT__/OA/Common/img/notice_active.png"/><?php break;?>
							<?php case "005": ?><img src="__ROOT__/OA/Common/img/notice_health.png"/><?php break;?>
							<?php case "006": ?><img src="__ROOT__/OA/Common/img/notice_info.png"/><?php break;?>
							<?php case "007": ?><img src="__ROOT__/OA/Common/img/notice_web.png"/><?php break; endswitch;?>
						<div class="time"><?php echo substr($val['news_date'],5,2);?>月<?php echo substr($val['news_date'],8,2);?>日<?php echo substr($val['news_date'],10,6);?>
						</div>		<!-- 把10-26 改成10月26日 -->
					</div><?php endforeach; endif; ?>
			</div>
			<div id="test"></div>
			<a href="#" id="next"></a>

			<div style="clear:both;"></div>
		</div>
	</div>
	<!--Tags 插件引用的文件-->
<link rel="stylesheet" type="text/css" href="__ROOT__/OA/Common/Tags/css/master.css">
<link rel="stylesheet" type="text/css" href="__ROOT__/OA/Common/Tags/css/jquery.tagit.css">
<link rel="stylesheet" type="text/css" href="__ROOT__/OA/Common/Tags/css/tagit.ui-zendesk.css">
<script src="__ROOT__/OA/Common/Tags/js/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="__ROOT__/OA/Common/Tags/js/tag-it.js"></script>
<script src="__ROOT__/OA/Common/Tags/js/tag.js"></script>

<script src="__ROOT__/OA/Common/js/home_course.js"></script>

<div id="home_course">
    <div id="content_bottom">
        <div id="bottom_s1">
            <div id="name">姓名：</div>
            <div id="bottom_s5">
                <div id="wrapper">
                    <ul id="myULTags">
                        <li id="nae"class="namm"><?php echo ($name); ?></li>
                    </ul>
                    <input type="hidden" id="tags" name="tags"value=""/>
                </div>
            </div>
            <div id="bottom_s6"><a href="javascript:void(0);"><div id="xuan"><img src="__ROOT__/OA/Common/img/course/down.png"></div></a>
            </div>
            <div style="clear:both"></div>
        </div> 

        <div id="bottom_s3">
            <table>
                <tr class="first">
                    <th class="first"></th><th>星期一</th><th>星期二</th><th>星期三</th><th>星期四</th><th>星期五</th>
                </tr>
                <tr>
                    <td class="first">第<br>一<br>节</td>
                    <td><?php echo ($one[0][0]); ?></td>
                    <td><?php echo ($one[0][1]); ?></td>
                    <td><?php echo ($one[0][2]); ?></td>
                    <td><?php echo ($one[0][3]); ?></td>
                    <td><?php echo ($one[0][4]); ?></td>
                </tr>
                <tr>
                    <td class="first">第<br>二<br>节</td>
                    <td><?php echo ($one[1][0]); ?></td>
                    <td><?php echo ($one[1][1]); ?></td>
                    <td><?php echo ($one[1][2]); ?></td>
                    <td><?php echo ($one[1][3]); ?></td>
                    <td><?php echo ($one[1][4]); ?></td>
                </tr>
                <tr>
                    <td class="first">第<br>三<br>节</td>
                    <td><?php echo ($one[2][0]); ?></td>
                    <td><?php echo ($one[2][1]); ?></td>
                    <td><?php echo ($one[2][2]); ?></td>
                    <td><?php echo ($one[2][3]); ?></td>
                    <td><?php echo ($one[2][4]); ?></td>
                </tr>
                <tr>
                    <td class="first">第<br>四<br>节</td>
                    <td><?php echo ($one[3][0]); ?></td>
                    <td><?php echo ($one[3][1]); ?></td>
                    <td><?php echo ($one[3][2]); ?></td>
                    <td><?php echo ($one[3][3]); ?></td>
                    <td><?php echo ($one[3][4]); ?></td>
                </tr>
                 <tr>
                    <td class="first">第<br>五<br>节</td>
                    <td><?php echo ($one[4][0]); ?></td>
                    <td><?php echo ($one[4][1]); ?></td>
                    <td><?php echo ($one[4][2]); ?></td>
                    <td><?php echo ($one[4][3]); ?></td>
                    <td><?php echo ($one[4][4]); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</div>
<div id="fooder">CopyRight 三月软件工作室&nbsp;&nbsp;<a style = "color:#f5f5f5" href="http://www.miitbeian.gov.cn/" target="_blank">豫ICP备14025783号</a></div>
</BODY>
</HTML>