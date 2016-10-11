$(function(){
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
					$("#url").val()+"/del_all_notice",
					{
						idmarch_news:arr,
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
		}else{
			alert("请选择要删除的数据");
		}
	});
	$("[name='del']").click(function(){
		if(confirm("你确定要删除吗")){
			$.post(
				$("#url").val()+"/del_notice",
				{
					idmarch_news:$(this).attr("value"),
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
	$("[name='add_edit_notice']").click(function(){
		var id = $("input[name='idmarch_news']").val();
		var content = $("iframe[id='ueditor_1']").contents().find("body").html();
		var content1 = $("iframe[id='ueditor_1']").contents().find("body").text();
		var date = $("input[name='date']").val();

		if(content1 == "" || date == ""){
			alert("输入数据不完整");
		}else if(content1.length > 50){
			alert("通知内容最大长度为50");
		}else{
			$.post(
				$("#url").val()+"/add_edit_notice1",
				{
					idmarch_news:id,
					news_content:content,
					news_date:date,
				},
				function(res){
					alert(res);
					if(res.trim() == "添加成功"|| res.trim()=="编辑成功"){
						jump($("#url").val()+"/notice");	//跳转页面延迟2秒
					}
				}
			);
		}
	});
});