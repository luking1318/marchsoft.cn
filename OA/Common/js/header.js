$(function(){
	<!-- ------------选中导航条的样式---------- -->
	var nav_point = $("#nav_point").val();	
	if(nav_point == 1){
		$("#nav_point1").addClass("nav_point");
		$("#nav_point1").before('<img class="nav_left" src="'+$("#root").val()+'/OA/Common/img/nav_left.png"/>');
		$("#nav_point1").before('<img class="nav_right" src="'+$("#root").val()+'/OA/Common/img/nav_right.png"/>');
	}
	else if(nav_point == 2){
		$("#nav_point2").addClass("nav_point");
		$("#nav_point2").before('<img class="nav_left" src="'+$("#root").val()+'/OA/Common/img/nav_left.png"/>');
		$("#nav_point2").before('<img class="nav_right" src="'+$("#root").val()+'/OA/Common/img/nav_right.png"/>');
	}
	else if(nav_point == 3){
		$("#nav_point3").addClass("nav_point");
		$("#nav_point3").before('<img class="nav_left" src="'+$("#root").val()+'/OA/Common/img/nav_left.png"/>');
		$("#nav_point3").before('<img class="nav_right" src="'+$("#root").val()+'/OA/Common/img/nav_right.png"/>');
	}
	else if(nav_point == 4){
		$("#nav_point4").addClass("nav_point");
		$("#nav_point4").before('<img class="nav_left" src="'+$("#root").val()+'/OA/Common/img/nav_left.png"/>');
		$("#nav_point4").before('<img class="nav_right" src="'+$("#root").val()+'/OA/Common/img/nav_right.png"/>');
	}
	else if(nav_point == 5){
		$("#nav_point5").addClass("nav_point");
		$("#nav_point5").before('<img class="nav_left" src="'+$("#root").val()+'/OA/Common/img/nav_left.png"/>');
		$("#nav_point5").before('<img class="nav_right" src="'+$("#root").val()+'/OA/Common/img/nav_right.png"/>');
	}
	else if(nav_point == 6){
		$("#nav_point6").addClass("nav_point");
		$("#nav_point6").before('<img class="nav_left" src="'+$("#root").val()+'/OA/Common/img/nav_left.png"/>');
		$("#nav_point6").before('<img class="nav_right" src="'+$("#root").val()+'/OA/Common/img/nav_right.png"/>');
	}
	else if(nav_point == 7){
		$("#nav_point7").addClass("nav_point");
		$("#nav_point7").before('<img class="nav_left" src="'+$("#root").val()+'/OA/Common/img/nav_left.png"/>');
		$("#nav_point7").before('<img class="nav_right" src="'+$("#root").val()+'/OA/Common/img/nav_right.png"/>');
	}
	else if(nav_point == 8){
		$("#nav_point8").addClass("nav_point");
		$("#nav_point8").before('<img class="nav_left" src="'+$("#root").val()+'/OA/Common/img/nav_left.png"/>');
		$("#nav_point8").before('<img class="nav_right" src="'+$("#root").val()+'/OA/Common/img/nav_right.png"/>');
	}

	<!----------------选中博客随笔个人中心左侧图标的样式---------------->
	var two_level_nav = $("#two_level_nav").val();	
	if(two_level_nav == "b_myblog"){
		$("#b_myblog").find("img").attr("src",$("#root").val()+"/OA/Common/img/b_myblog_point.png");
		$("#b_myblog").addClass("left_img_point");
	}else if(two_level_nav == "b_addblog"){
		$("#b_addblog").find("img").attr("src",$("#root").val()+"/OA/Common/img/b_addblog_point.png");
		$("#b_addblog").addClass("left_img_point");
	}else if(two_level_nav == "p_photo"){
		$("#p_photo").find("img").attr("src",$("#root").val()+"/OA/Common/img/p_photo_point.png");
		$("#p_photo").addClass("left_img_point");
	}else if(two_level_nav == "b_countblog"){
		$("#b_countblog").find("img").attr("src",$("#root").val()+"/OA/Common/img/b_countblog_point.png");
		$("#b_countblog").addClass("left_img_point");
	}else if(two_level_nav == "p_thing"){
		$("#p_thing").find("img").attr("src",$("#root").val()+"/OA/Common/img/p_thing_point.png");
		$("#p_thing").addClass("left_img_point");
	}else if(two_level_nav == "p_data"){
		$("#p_data").find("img").attr("src",$("#root").val()+"/OA/Common/img/p_data_point.png");
		$("#p_data").addClass("left_img_point");
	}else if(two_level_nav == "p_course"){
		$("#p_course").find("img").attr("src",$("#root").val()+"/OA/Common/img/p_course_point.png");
		$("#p_course").addClass("left_img_point");
	}else if(two_level_nav == "p_photo"){
		$("#p_photo").find("img").attr("src",$("#root").val()+"/OA/Common/img/p_photo_point.png");
		$("#p_photo").addClass("left_img_point");
	}else if(two_level_nav == "p_pwd"){
		$("#p_pwd").find("img").attr("src",$("#root").val()+"/OA/Common/img/p_pwd_point.png");
		$("#p_pwd").addClass("left_img_point");
	}
<!----------------鼠标移动到博客随笔个人中心左侧图标的样式---------------->
	$("#b_myblog").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/b_myblog_point.png");
		$(this).addClass("left_img_point");
	});
	$("#b_myblog").mouseout(function(){
		if(two_level_nav != "b_myblog"){
			$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/b_myblog.png");
			$(this).removeClass("left_img_point");
		}
	});
	$("#b_addblog").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/b_addblog_point.png");
		$(this).addClass("left_img_point");
	});
	$("#b_addblog").mouseout(function(){
		if(two_level_nav != "b_addblog"){
			$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/b_addblog.png");
			$(this).removeClass("left_img_point");
		}
	});
	/*$("#p_photo").mouseover(function(){		成员笔记图标和个人中心的修改头像一样
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_photo_point.png");
		$(this).addClass("left_img_point");
	});
	$("#p_photo").mouseout(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_photo.png");
		$(this).removeClass("left_img_point");
	});*/
	$("#b_countblog").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/b_countblog_point.png");
		$(this).addClass("left_img_point");
	});
	$("#b_countblog").mouseout(function(){
		if(two_level_nav != "b_countblog"){
			$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/b_countblog.png");
			$(this).removeClass("left_img_point");
		}
	});
	$("#p_thing").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_thing_point.png");
		$(this).addClass("left_img_point");
	});
	$("#p_thing").mouseout(function(){
		if(two_level_nav != "p_thing"){
			$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_thing.png");
			$(this).removeClass("left_img_point");
		}
	});
	$("#p_data").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_data_point.png");
		$(this).addClass("left_img_point");
	});
	$("#p_data").mouseout(function(){
		if(two_level_nav != "p_data"){
			$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_data.png");
			$(this).removeClass("left_img_point");
		}
	});
	$("#p_course").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_course_point.png");
		$(this).addClass("left_img_point");
	});
	$("#p_course").mouseout(function(){
		if(two_level_nav != "p_course"){
			$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_course.png");
			$(this).removeClass("left_img_point");
		}
	});
	$("#p_photo").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_photo_point.png");
		$(this).addClass("left_img_point");
	});
	$("#p_photo").mouseout(function(){
		if(two_level_nav != "p_photo"){
			$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_photo.png");
			$(this).removeClass("left_img_point");
		}
	});
	$("#p_pwd").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_pwd_point.png");
		$(this).addClass("left_img_point");
	});
	$("#p_pwd").mouseout(function(){
		if(two_level_nav != "p_pwd"){
			$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/p_pwd.png");
			$(this).removeClass("left_img_point");
		}
	});



	<!----------------------首页中鼠标移动左侧图片上的效果-------------------------->
	$("#h_blog").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/h_blog_point.png");
		$(this).addClass("left_img_point");
	});
	$("#h_blog").mouseout(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/h_blog.png");
		$(this).removeClass("left_img_point");
	});
	$("#h_notice").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/h_notice_point.png");
		$(this).addClass("left_img_point");
	});
	$("#h_notice").mouseout(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/h_notice.png");
		$(this).removeClass("left_img_point");
	});
	$("#h_suibi").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/h_suibi_point.png");
		$(this).addClass("left_img_point");
	});
	$("#h_suibi").mouseout(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/h_suibi.png");
		$(this).removeClass("left_img_point");
	});
	$("#h_data").mouseover(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/h_data_point.png");
		$(this).addClass("left_img_point");
	});
	$("#h_data").mouseout(function(){
		$(this).children(0).attr("src",$("#root").val()+"/OA/Common/img/h_data.png");
		$(this).removeClass("left_img_point");
	});
	<!------------鼠标移动到编辑、删除、查看图标的样式-------------------->
	$("a[class='img_show']").mouseover(function(){
		$(this).find("img").attr("src",$("#root").val()+"/OA/Common/img/img_show_point.png");
	});
	$("a[class='img_show']").mouseout(function(){
		$(this).find("img").attr("src",$("#root").val()+"/OA/Common/img/img_show.png");
	});
	$("a[class='img_edit']").mouseover(function(){
		$(this).find("img").attr("src",$("#root").val()+"/OA/Common/img/img_edit_point.png");
	});
	$("a[class='img_edit']").mouseout(function(){
		$(this).find("img").attr("src",$("#root").val()+"/OA/Common/img/img_edit.png");
	});
	$("a[class='img_del']").mouseover(function(){
		$(this).find("img").attr("src",$("#root").val()+"/OA/Common/img/img_del_point.png");
	});
	$("a[class='img_del']").mouseout(function(){
		$(this).find("img").attr("src",$("#root").val()+"/OA/Common/img/img_del.png");
	});

});

function flush(){
	setTimeout("window.location.reload()",2000);
}
function jump(url){
	setTimeout(function(){goto(url)},2000);
}
function goto(url){
	window.location.href = url;
}

/*-------------退出系统-------------*/
$(function(){		
	$("a[name='doLogout']").click(function(){
		if(confirm("你确定要退出吗？")){
			window.location.href = $("#root").val()+"/oa.php/Index/doLogout";
		}
	});
});
/*function CloseWebPage() {  
    if (navigator.userAgent.indexOf("MSIE") > 0) {  
        if (navigator.userAgent.indexOf("MSIE 6.0") > 0) {  
            window.opener = null; window.close();  
        }  
        else {  
            window.open('', '_top'); window.top.close();  
        }  
    }  
    else if (navigator.userAgent.indexOf("Firefox") > 0) {  
        window.location.href = 'about:blank ';  
        //window.history.go(-2);  
    }  
    else {
        window.opener = null;   
        window.open('', '_self', '');  
        window.close();  
    }  
}*/