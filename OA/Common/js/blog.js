$(function(){
	$('a[name="del"]').click(function(){
		$('#article_id').val($(this).attr("id"));
		if(confirm("你确定要删除吗？？")){
			$.post(
				$('#url').val() + "/del",
				{
					article_id:$('#article_id').val(),
				},
				function(res){
					alert(res);
					res = res.trim();//去掉空格
					if(res =="删除成功"){
						flush();	//刷新窗体延迟2秒
					}
				}
			);
		}
	});
	$('input[name="add_edit"]').click(function(){
		var tag = $('input[name="item[tags][]"]');
		var tags = "";
		if(tag.length > 0){
			tags += tag[0].value;
			for(var i=1;i<tag.length;i++){
				tags += "," + tag[i].value;
			}
		}

		var title = $('input[name="title"]').val();
		var content = $('iframe[id="ueditor_1"]').contents().find("body").html();//textarea中的内容
		var type = $('input[name="type"]').val();
		if(title == "" || content == ""){
			alert("数据输入不完整");
		}else if(title.length > 30){
			alert("标题的最大长度为30");
		}else{
			$.post(
				$("#url").val()+"/submit",
				{
					id:$('input[name="id"]').val(),
					type:type,
					title:title,
					content:content,
					sort:$('select[name="sort"]').val(),
					tags:tags,
				},
				function(res){
					alert(res);
					var url = $("#url").val()+"/myblog/type/"+type;
					res = res.trim();//去掉空格
					if(res == "添加成功" || res=="更新成功"){
						jump(url);	//跳转到笔记列表
					}
				}
			);
		}
	});
});