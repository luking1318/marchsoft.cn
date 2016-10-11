function error(res){	//上传失败
	alert(res);
	$("#upload_lecture_img").children("iframe").attr("src",$("#url").val()+"/lecture_upload");
	$("#upload_lecture_img").css("display","none");
}
function success(res){	//上传成功
	alert("上传成功");
	$("input[name='lecture_img']").val(res);	//往隐藏标签中写入图片的名称
	$("#show_photo").attr("src",$("#root").val()+"/OA/Common/img/lecture/s_"+res);
	$("#show_photo").addClass("edit_img");
	$("#add_edit_photo").attr("src",$("#root").val()+"/OA/Common/img/thing_l_edit.png");
	$("#del_photo").css("display","block");
	$("#upload_lecture_img").children("iframe").attr("src",$("#url").val()+"/lecture_upload");
	$("#upload_lecture_img").css("display","none");
}

$(function(){
	$("#add_edit_photo").click(function(){	//新增或编辑讲课图片
		$("#upload_lecture_img").css("display","block");
	});

	$("#del_photo").click(function(){		//单击删除图片
		if(confirm("你确定要删除吗")){
			$.post(
				$("#url").val()+"/del_lecture_img",
				{
					idmarch_lecture:$('input[name="idmarch_lecture"]').val(),
					lecture_img:$("input[name='lecture_img']").val(),//图像的名称
				},
				function(){
					$("#show_photo").attr("src",$("#root").val()+"/OA/Common/img/lecture/s_thing_l_no.png");
					$("#add_edit_photo").attr("src",$("#root").val()+"/OA/Common/img/thing_l_add.png");
					$("#show_photo").removeClass("edit_img");
					$("#del_photo").css("display","none");
					$("input[name='lecture_img']").val("");	//隐藏标签赋值为空
				}
			);
		}
	});
	$('input[name="all"]').click(function(){		//全选
		if($(this).attr("checked") == "checked"){
			$(":checkbox").attr("checked",true);
		}else{
			$(":checkbox").removeAttr("checked");
		}
	});
	$('[name="del_all"]').click(function(){
		var arr = Array();
		var i = 0;
		$('input[name="check"]').each(function(){
			if(this.checked){
				arr[i++] = $(this).val();
			}
		});
		if(arr.length > 0){
			if(confirm("你确定要删除吗")){
				$.post(
					$("#url").val()+"/del_all_lecture",
					{
						idmarch_lecture:arr,
					},
					function(res){
						alert(res);
						if(res.trim() == "删除成功"){
							$(":checkbox").removeAttr("checked");
							flush();		//刷新延迟2秒
						}
					}
				);
			}
		}else{
			alert("请选择要删除的数据");
		}
	});
	$('[name="del"]').click(function(){
		if(confirm("你确定要删除吗")){
			$.post(
				$("#url").val()+"/del_lecture",
				{
					idmarch_lecture:$(this).attr("value"),
				},
				function(res){
					alert(res);
					if(res.trim() == "删除成功"){
						$(":checkbox").removeAttr("checked");//去掉对勾
						flush();		//刷新延迟2秒
					}
				}
			);
		}
	});
	$("input[name='add_edit']").click(function(){
		var idmarch_lecture = $("input[name='idmarch_lecture']").val();
		var img = $("input[name='lecture_img']").val();
		var theme = $("input[name='theme']").val();
		var user = $("input[name='user']").val();
		var content = $("textarea[name='content']").val();
		var sort = $("select[name='sort']").val();
		var file = $("input[name='file']").val();
		if(img == "" || theme=="" || user=="" || content=="" || sort=="" || file==""){
			alert("数据输入不完整");
		}else if(theme.length > 15){
			alert("讲课主题不能超过15个字");
		}else if(content.length > 50){
			alert("内容摘要不能超过50个字");
		}else{
			$.post(
				$("#url").val()+"/add_edit_lecture1",
				{
					idmarch_lecture:idmarch_lecture,
					lecture_img:img,
					lecture_theme:theme,
					lecture_user:user,
					lecture_content:content,
					lecture_sort:sort,
					lecture_file:file,
				},
				function(res){
					alert(res);
					if(res.trim() == "添加成功" || res.trim()=="编辑成功"){
						jump($("#url").val()+"/lecture");	//页面跳转延迟2秒
					}
				}
			);
		}
	});
	
});
	