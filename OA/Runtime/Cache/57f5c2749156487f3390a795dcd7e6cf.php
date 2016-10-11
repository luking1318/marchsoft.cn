<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML><HTML><HEAD><TITLE>小组OA</TITLE><meta http-equiv="content-type" content="text/html; charset=utf-8"><META NAME="Generator" CONTENT="EditPlus"><META NAME="Author" CONTENT=""><META NAME="Keywords" CONTENT=""><META NAME="Description" CONTENT=""><link href="__ROOT__/Common/css/bootstrap.css" rel="stylesheet"><script type="text/javascript" src="__ROOT__/Common/js/jquery.js"></script><script type="text/javascript" src="__ROOT__/Common/js/bootstrap.min.js"></script><script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/DatePicker/WdatePicker.js"></script><script src="__ROOT__/OA/Common/alert/alert.js"></script><div id="alert" ><div  class=" alert message fade in hide"><a class="dismiss close" data-dismiss="alert">��</a><label><?php echo $msg;$msg=null; ?></label></div></div><?php if(!empty($msg)): ?><literal><script type="text/javascript">		$(function(){
			$(".alert").show();
		})
	</script></literal><?php endif; ?><link href="__ROOT__/OA/Common/css/Index/header.css" rel="stylesheet"><script src="__ROOT__/OA/Common/js/header.js"></script></HEAD><BODY><div id="head"><ul><li><img src="__ROOT__/OA/Common/img/top_one.png"/></li><li><a href="http://www.marchsoft.cn" target="_new">三月软件工作室首页</a></li><?php if($_SESSION["login"]): ?><!-- 只有管理员才显示事物管理 --><li><img src="__ROOT__/OA/Common/img/top_two.png"/></li><li><a href="__ROOT__/oa.php/Personal/thing">事务管理</a></li><?php endif; ?><li><img src="__ROOT__/OA/Common/img/top_three.png"/></li><li><a javascript:void(0)>手机版</a></li><li><img src="__ROOT__/OA/Common/img/top_four.png"/></li><li class="dropdown"><a javascript:void(0) class="dropdown-toggle" data-toggle="dropdown"><?php echo ($_SESSION['user_login']); ?></a><ul class="dropdown-menu" style="min-width:80px;margin-left:-20px;"><?php if($_SESSION['login']): ?><!-- 只有管理员才能跳转到事物管理 --><li><a href="__ROOT__/oa.php/Personal/thing"><i class="icon-home"></i>&nbsp;个人中心</a></li><?php else: ?><li><a href="__ROOT__/oa.php/Personal/data"><i class="icon-home"></i>&nbsp;个人中心</a></li><?php endif; ?><li><a name="doLogout" javascript:void(0) ><i class="icon-folder-close"></i>&nbsp;退出系统</a></li></ul></li></ul></div><div id="navigation"><div id="oa">marchsoft--OA</div><div class="navbar"><div class="navbar-inner"><ul class="nav"><li><a id="nav_point1" href="__ROOT__/oa.php/Index/index">首&nbsp&nbsp页</a></li><li><a id="nav_point2" href="__ROOT__/oa.php/Blog/myblog/type/0">我的笔记</a></li><li><a id="nav_point3" href="__ROOT__/oa.php/Jotting/index">我的随笔</a></li><li><a id="nav_point4" href="__ROOT__/oa.php/Blog/myblog/type/1">我的博客</a></li><li><a id="nav_point5" href="__ROOT__/oa.php/Notice/index">通知公告</a></li><li><a id="nav_point6" href="__ROOT__/oa.php/News/newslist">大事记</a></li><li><a id="nav_point7" href="__ROOT__/oa.php/Addressbook/index">通讯录</a></li><?php if($_SESSION['login']): ?><!-- 只有管理员才能跳转到事物管理 --><li><a id="nav_point8" href="__ROOT__/oa.php/Personal/thing">个人中心</a></li><?php else: ?><li><a id="nav_point8" href="__ROOT__/oa.php/Personal/data">个人中心</a></li><?php endif; ?></ul></div></div><div class="search"><input type="text"><a javascript:void(0)><img src="__ROOT__/OA/Common/img/search.png"/></a></div></div><div style="clear:both"></div><input type="hidden" id="url" value="__URL__"/><input type="hidden" id="app" value="__APP__"/><input type="hidden" id="root" value="__ROOT__"/><input type="hidden" id="nav_point" value="<?php echo ($_SESSION['nav_point']); ?>"><!-- 选中导航的样式 --><input type="hidden" id="two_level_nav" value="<?php echo ($_SESSION['two_level_nav']); ?>"><!-- 选中笔记个人中心的样式 --><input type="hidden" id="date" value="<?php echo ($date); ?>"><!-- 存储今天的日期 --><input type="hidden" id="notice_count" value="<?php echo ($count); ?>"><!-- 选择的日期公告的数量 --><!--Tags 插件引用的文件--><link rel="stylesheet" type="text/css" href="__ROOT__/OA/Common/Tags/css/master.css"><link rel="stylesheet" type="text/css" href="__ROOT__/OA/Common/Tags/css/jquery.tagit.css"><link rel="stylesheet" type="text/css" href="__ROOT__/OA/Common/Tags/css/tagit.ui-zendesk.css"><script src="__ROOT__/OA/Common/Tags/js/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script><script src="__ROOT__/OA/Common/Tags/js/tag-it.js"></script><script src="__ROOT__/OA/Common/Tags/js/tag.js"></script><!-- 编辑框链接文件--><script type="text/javascript" src="__ROOT__/Common/ueditor/ueditor.config.js"></script><script type="text/javascript" src="__ROOT__/Common/ueditor/ueditor.all.js"></script><link rel="stylesheet" href="__ROOT__/Common/ueditor/themes/default/css/ueditor.css"/><script type="text/javascript">    var editor = new UE.ui.Editor();
    UE.getEditor('myEditor');
</script><!-- <script src="__ROOT__/OA/Common/js/addblog.js"></script> --><link rel="stylesheet" href="__ROOT__/OA/Common/css/User.css" /><div id="content"><div class="left"><a href="__URL__/index"><div id="b_myblog" class="left_img"><img src="__ROOT__/OA/Common/img/b_myblog.png"/><br/>随笔列表</div></a><a href="__URL__/jottinglist"><div id="b_addblog" class="left_img"><img src="__ROOT__/OA/Common/img/b_addblog.png"/><br/>新增随笔</div></a><a target="_new" href="__ROOT__/index.php/Grow/index"><div id="p_photo" class="left_img"><img src="__ROOT__/OA/Common/img/p_photo.png"/><br/>成员随笔</div></a></div><div class="righ"style="border:1px solid #CCCCCC;background-color:#F7F3F3;margin-left:200px;width:1090px;"><div class="add_edit"><table style="margin-left:20px;margin-top:20px"><tr><td><div style="margin-bottom:10px;">标&nbsp&nbsp&nbsp题：</div></td><td><input id="newstitle" name="title" type="text"style="width:480px;" class="text"/></td></tr><tr><td ><div style="margin-bottom:170px;">封面图：</div></td><td><div  style="margin-bottom:20px;background-color:#ffffff;margin-left:0px;width:487px;height:171px;border:1px solid #C9C9C9"><div  id="new_tu2"style="position:relative;margin-top:10px;background-color:#ffffff;margin-left:15px;width:457px;height:148px;border-radius:5px;border:2px  dashed #C9C9C9"><div class="photod"style="float:left;margin-left:2px;margin-top:2px;width:153px;height:142px;border:0px solid #797979;border-radius:5px;"><img style="margin:0px;width:153px;height:143px;" src="__ROOT__/OA/Common/img/photo4.png"></div><div class="new_tu"style="float:left;margin-left:2px;margin-top:2px;width:138px;height:142px;border:0px solid #797979;border-radius:5px;"><img style="margin:0px;width:138px;height:143px;" src="__ROOT__/OA/Common/img/photo5.png"></div><a href="javascript:void(0);"><div class="new_tu1"style="position:absolute;margin-left:300px;margin-top:2px;width:153px;height:142px;border:0px solid #797979;border-radius:5px;"><img style="margin:0px;width:153px;height:143px;" src="__ROOT__/OA/Common/img/photo8.png"></div></a></div></div></td></tr><tr><td><div style="margin-bottom:380px;">内&nbsp&nbsp&nbsp容：</div></td><td><div class="textarea"><textarea id="myEditor" name="content" style="width:970px;height:300px"><?php echo ($list["article_content"]); ?></textarea><br><input class="button" type="button" value="提 交" name="add_edit" style="margin-bottom:30px;"><input class="button" type="button" value="返 回" onClick="fanhui()" style="margin-bottom:30px;"/></div><td></tr></table></div></div><div id="showDiv2"><div id="show_top2"><div id="menu2">选择图片</div><div id="rig2" ><a href="#" id="close6" >取&nbsp消</a></div></div><iframe src="__URL__/import" id="Iframes" width="100%" height="100%"  frameborder=0 marginheight=0px marginwidth=0px></iframe></div><input type="hidden" name="type" value="<?php echo ($type); ?>"/><input type="hidden" name="id" value="<?php echo ($id); ?>"/><input type="hidden"id="hidden1"value=<?php echo ($arr1); ?>><input type="hidden"id="hidden2"value=<?php echo ($arr2); ?>><input type="hidden"id="hidden4"value='0'><input type="hidden" value="234124" id="IframeValue1" /><input type="hidden" value="__URL__/import" id="iframesrc" /><input type="hidden" value="__ROOT__" id="Root" /><input type="hidden" value="" id="SaveImgFile1"></div><div id="fooder">CopyRight 三月软件工作室&nbsp;&nbsp;<a style = "color:#f5f5f5" href="http://www.miitbeian.gov.cn/" target="_blank">豫ICP备14025783号</a></div></BODY></HTML><script>	$(document).ready(function(){
		$("#new_tu2").animate({left:"50px"},10);
		$(".new_tu1").hide();
		$("#new_tu2").css("width","307px");
	    $(".new_tu:eq(0)").click(function(){
			Godata(0);
		});
	    $("#newstitle").blur(function(){
	    	if($(this).val().length>13){
	    		if($(".ti").length<1){
	    			$(this).after("<b class='ti'style='color:red'>&nbsp标题长度不能超过13个字!</b>");
	    		 }
	    	}else{
            	$(".ti").remove();
    		}
		}); 
		$("input[name='add_edit']").click(function(){
			if($("#newstitle").val().length<14){
				var title = $("#newstitle").val();
				var isrc = $("#SaveImgFile1").val();
				var content= $('iframe[id="ueditor_1"]').contents().find("body").html();
				var content1= $('iframe[id="ueditor_1"]').contents().find("body").text();
				if(title ==""){
					alert("标题不能为空！");
					return false;
				}
				if(content=="<p><br></p>"){
					alert("内容不能为空！");
					return false;
				}
				$.ajax({
					url:'__ROOT__/oa.php/Jotting/submitsu',
					type:'post',
					dataType:'text',
					data:({
						title:title,
						isrc:isrc,
						content:content,
						content1:content1
					}),
					success:function(data){
						if(data){
							alert("发部成功！");
							window.location="__ROOT__/oa.php/Jotting/index";
						}else{
							alert("发部失败！");
						}
					}
				});
			}else{
				scroll(0,20);
				alert("标题长度不能超过13个字!");
			}
		});
    });
    function fanhui(){
		$.ajax({
			url:'fanhui',
			type:'post',
			dataType:'text',
			data:({
			}),
			success:function(data){	
				if(data){
					window.location="__ROOT__/oa.php/Jotting/index";
				}
		    }
		});
	}
	
    function Godata(Num){
	$("#Iframes").attr("src",$("#iframesrc").val());	
	$("#IframeValue1").attr("value",Num);
	ShowHide();	
    }
    function ShowHide(){
		ShowMask();
		ShowDv2();
	}
	//显示遮罩
	function ShowMask(){
		$msk=$('<div id=dvMsk><div>');
		$msk.css({"top":"0","left":"0","position":"fixed","display":"block","width":"100%","height":"100%","background":"white","zIndex":"500","opacity":"0.3","filter":"Alpha(opacity=30)"});
		$('body').append($msk);	
	}
	//显示div
	function ShowDv2(){
		$('#showDiv2').css({'display':'block','position':'fixed','top':'100px','left':'33%'});
	}
	$("#close6").click(function(){
		hide6();
		return false;
    });
    function hide6(){
		$("#showDiv2").css("display","none");
		$("#dvMsk").remove();
	}
	//上传图片失败
	function SetError1(Sort){
		
		$(".FileRight:eq("+Sort+")").empty();
		$(".FileRight:eq("+Sort+")").append("图片上传失败，请重试");
	}
	//判断图片是否上传成功
	function SetOk(Sort,DBfile){
		$("#SaveImgFile1").attr("value",DBfile);
		if(Sort=="6")
		{
			$(".title_img").attr("src",$("#Root").val()+"/OA/Common/img/upFile/"+DBfile);
		}
		else
		{
			$(".photod img:eq(0)").attr("src",$("#Root").val()+"/OA/Common/img/upFile/"+DBfile);
			$(".new_tu img").attr("src","__ROOT__/OA/Common/img/photo7.png");
			$(".new_tu1").show();
			$("#new_tu2").css("width","457px");
			$("#new_tu2").animate({left:"-25px"},1000);
			$("#new_tu2").animate({left:"1px"},1000);
		}
	}
	$(".new_tu1").live("click",function(){
			 $(".new_tu img").attr("src","__ROOT__/OA/Common/img/photo5.png");
			 $(".photod img:eq(0)").attr("src","__ROOT__/OA/Common/img/photo4.png");
			 $(this).hide();
			 $("#new_tu2").css("width","307px");
			 $("#SaveImgFile1").val('');
			 $("#new_tu2").animate({left:"50px"},1000);
	});
</script><!-- 
页面底部放置：返回顶部二、
使用Javascript Scroll函数返回顶部
scrooll函数用来控制滚动条的位置，
有两种很简单的实现方式：
方式1（推荐：简单方便）：
返回顶部scroll第一个参数是水平位置，第二个参数是垂直位置，
比如要想定位在垂直50像素处，改成scroll(0,50)就可以了。
方式2（注重效果：缓慢向上）：本方式是渐进式返回顶部，要好看一些，
代码如下：
functionpageScroll() { 
	window.scrollBy(0,-10); 
	scrolldelay = setTimeout('pageScroll()',100); 
	if(document.documentElement.scrollTop==0) clearTimeout(scrolldelay);
}

返回顶部这样就会动态返回顶部，不过虽然返回到顶部但是代码仍在运行，还需要在
pageScroll函数加一句给停止掉。

三、使用Onload加上scroll功能实现动态返回顶部首先在网页body标签结束之前加上：返回顶部2、再调用以下JS脚本部分：
BackTop=function(btnId){
 varbtn=document.getElementById(btnId);
  vard=document.documentElement;
   window.onscroll=set;
    btn.onclick=function (){
     btn.style.display="none"; window.onscroll=null; this.timer=setInterval(function(){ d.scrollTop-=Math.ceil(d.scrollTop*0.1); if(d.scrollTop==0) clearInterval(btn.timer,window.onscroll=set); },10); }; functionset(){btn.style.display=d.scrollTop? -->