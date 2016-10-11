<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理页面</title>
<script src="__ROOT__/Admin/Common/js/prototype.lite.js" type="text/javascript"></script>
<script src="__ROOT__/Admin/Common/js/moo.fx.js" type="text/javascript"></script>
<script src="__ROOT__/Admin/Common/js/moo.fx.pack.js" type="text/javascript"></script>
<style>
body {
	font:12px Arial, Helvetica, sans-serif;
	color: #000;
	background-color: #EEF2FB;
	margin: 0px;
}
#container {
	width: 182px;
}
H1 {
	font-size: 12px;
	margin: 0px;
	width: 182px;
	cursor: pointer;                                                                                   
	height: 30px;
	line-height: 20px;	
}
H1 a {
	display: block;
	width: 182px;
	color: #000;
	height: 30px;
	text-decoration: none;
	moz-outline-style: none;
	background-image: url(__ROOT__/Admin/Common/images/login/menu_bgs.gif);
	background-repeat: no-repeat;
	line-height: 30px;
	text-align: center;
	margin: 0px;
	padding: 0px;
}
.content{
	width: 182px;
	height: 26px;
	
}
.MM ul {
	list-style-type: none;
	margin: 0px;
	padding: 0px;
	display: block;
}
.MM li {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	list-style-type: none;
	display: block;
	text-decoration: none;
	height: 26px;
	width: 182px;
	padding-left: 0px;
}
.MM {
	width: 182px;
	margin: 0px;
	padding: 0px;
	left: 0px;
	top: 0px;
	right: 0px;
	bottom: 0px;
	clip: rect(0px,0px,0px,0px);
}
.MM a:link {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	background-image: url(__ROOT__/Admin/Common/images/login/menu_bg1.gif);
	background-repeat: no-repeat;
	height: 26px;
	width: 182px;
	display: block;
	text-align: center;
	margin: 0px;
	padding: 0px;
	overflow: hidden;
	text-decoration: none;
}
.MM a:visited {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	background-image: url(__ROOT__/Admin/Common/images/login/menu_bg1.gif);
	background-repeat: no-repeat;
	display: block;
	text-align: center;
	margin: 0px;
	padding: 0px;
	height: 26px;
	width: 182px;
	text-decoration: none;
}
.MM a:active {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	background-image: url(__ROOT__/Admin/Common/images/login/menu_bg1.gif);
	background-repeat: no-repeat;
	height: 26px;
	width: 182px;
	display: block;
	text-align: center;
	margin: 0px;
	padding: 0px;
	overflow: hidden;
	text-decoration: none;
}
.MM a:hover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	font-weight: bold;
	color: #006600;
	background-image: url(__ROOT__/Admin/Common/images/login/menu_bg2.gif);
	background-repeat: no-repeat;
	text-align: center;
	display: block;
	margin: 0px;
	padding: 0px;
	height: 26px;
	width: 182px;
	text-decoration: none;
}
</style>
</head>

<body>
<table width="100%" height="280" border="0" cellpadding="0" cellspacing="0" bgcolor="#EEF2FB">
  <tr>
    <td width="182" valign="top"><div id="container">
      <h1 class="type"><a href="__APP__/User/index" target="main">用户管理</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="__ROOT__/Admin/Common/images/login/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
         
        </ul>
      </div>
      <h1 class="type"><a href="javascript:void(0)">新闻管理</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="__ROOT__/Admin/Common/images/login/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="__APP__/News/newslist?type=1&title=小组新闻" target="main">小组新闻</a></li>
          <li><a href="__APP__/News/newslist?type=2&title=通知公告" target="main">通知公告</a></li>
          <li><a href="__APP__/News/newslist?type=3&title=大事记" target="main">大 &nbsp;&nbsp;事&nbsp;&nbsp;记</a></li>
          <li><a href="__APP__/News/addnews" target="main">添加新闻</a></li>
        </ul>
      </div>
      <h1 class="type"><a href="javascript:void(0)">简介管理</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="__ROOT__/Admin/Common/images/login/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
		  <li><a href="__APP__/Introduce/introduce?type=2" target="main">老师简介</a></li>
          <li><a href="__APP__/Introduce/introduce?type=1" target="main">小组简介</a></li>
        </ul>
      </div>
      <h1 class="type"><a href="javascript:void(0)">项目管理</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="__ROOT__/Admin/Common/images/login/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
		  <li><a href="__APP__/Project/projectlist" target="main">项目列表</a></li>
          <li><a href="__APP__/Project/addproject" target="main">添加项目</a></li>
        </ul>
        
      </div>
<<<<<<< HEAD
       <h1 class="type"><a href="javascript:void(0)">奖项管理</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="__ROOT__/Admin/Common/images/login/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
		  <li><a href="__APP__/Prize/prizelist" target="main">奖项列表</a></li>
         		 <li><a href="__APP__/Prize/addprize" target="main">奖项添加</a></li>
         		 <li><a href="__APP__/Don/donlist" target="main">捐献列表</a></li>
         		 <li><a href="__APP__/Don/adddon" target="main">捐献添加</a></li>
        </ul>
        
      </div>
=======
>>>>>>> 1bcaebc50d03947fbd846bcb030bbecc7f7fa589
    </div>
        <h1 class="type"><a href="__APP__/Photo/index" target="main">相册管理</a></h1>
      <div class="content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="__ROOT__/Admin/Common/images/login/menu_topline.gif" width="182" height="5" /></td>
            </tr>
          </table>
        <ul class="MM">
          
        </ul>
      </div>
      </div>
        <script type="text/javascript">
		var contents = document.getElementsByClassName('content');
		var toggles = document.getElementsByClassName('type');
	
		var myAccordion = new fx.Accordion(
			toggles, contents, {opacity: true, duration: 400}
		);
		myAccordion.showThisHideOpen(contents[0]);
	</script>
        </td>
  </tr>
</table>
</body>
</html>