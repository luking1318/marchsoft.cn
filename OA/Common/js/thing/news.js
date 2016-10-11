$(function(){
	$('input[name="all"]').click(function(){
		if(this.checked){       // if($(this).attr("checked")=="checked"){
			$(":checkbox").attr('checked','checked');
		}else{
			$(":checkbox").removeAttr('checked');
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
				    $("#url").val()+"/del_all_news",
				    {
						idmarch_news:arr,
				    },
				    function(res){
				        alert(res);
				        if(res.trim() == "删除成功"){
				        	$(":checkbox").removeAttr("checked");//去掉对勾
							flush();	//刷新延迟2秒
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
				$("#url").val()+"/del_news",
				{
					idmarch_news:$(this).attr("value"),
				},
				function(res){
					alert(res);
					if(res.trim() == "删除成功"){
						$(":checkbox").removeAttr("checked");//去掉对勾
						flush();	//刷新延迟2秒
					}
				}
			);
		}
	});
	$("input[name='add_edit']").click(function(){
		var news_stick;			//该变量存储这条新闻是否置顶
		if($("input[name='news_stick']").attr("checked")){
			news_stick = 1;
		}else{
			news_stick = 0;
		}
		var idmarch_news = $("input[name='idmarch_news']").val();
		var title = $("input[name='title']").val();
		var content = $("iframe").contents().find("body").html();
		var type = $("input[name='type']").val();
		if(content =="" || title == ""){
			alert("输入数据不完整");
		}else if(title.length > 18){
			alert("标题的最大长度为18");
		}else{
			$.post(
				$("#url").val()+"/add_edit_news1",
				{
					idmarch_news:idmarch_news,
					news_title:title,
					news_content:content,
					news_type:type,
					news_stick:news_stick,
				},
				function(res){
					alert(res);
					if(res.trim() == "添加成功" || res.trim() == "编辑成功"){
						jump($("#url").val()+"/news/type/"+type);//执行jump方法，该方法在header.js中
					}
				}
			);
		}
	});
	$("[name='stick']").click(function(){		//置顶
		var idmarch_news = $(this).attr("value");
		if(confirm("你确定要置顶吗")){
			$.post(
				$("#url").val()+"/stick",
				{
					idmarch_news:idmarch_news,
				},
				function(res){
					alert(res);
					if(res.trim()=="置顶成功"){
						$(":checkbox").removeAttr("checked");//去掉对勾
						flush();	//刷新延迟2秒
					}
				}
			);
		}
	});
	$("[name='cancel_stick']").click(function(){		//取消置顶
		var idmarch_news = $(this).attr("value");
		if(confirm("你确定要取消置顶吗")){
			$.post(
				$("#url").val()+"/cancel_stick",
				{
					idmarch_news:idmarch_news,
				},
				function(res){
					alert(res);
					if(res.trim()=="取消置顶成功"){
						$(":checkbox").removeAttr("checked");//去掉对勾
						flush();	//刷新延迟2秒
					}
				}
			);
		}
	});
	//置顶多个
	$('[name="cancel_stick_all"]').click(function(){
	    var arr = Array();
	    var i = 0;
	    $('input[name="check"]').each(function(){
	        if(this.checked){
		    	arr[i++] = $(this).val();
			}
		});
	    if(arr.length > 0){
	        if(confirm("你确定要取消置顶吗")){
				$.post(
				    $("#url").val()+"/cancel_stick_all",
				    {
						idmarch_news:arr,
				    },
				    function(res){
				        alert(res);
				        if(res.trim() == "取消置顶成功"){
				        	$(":checkbox").removeAttr("checked");//去掉对勾
							flush();	//刷新延迟2秒
				        }
		        	}
				);
			}
	    }else{
			alert("请选择要取消置顶的数据");
	    }
	});
	$("[name='up_move']").click(function(){
		var idmarch_news = $(this).attr("value");
		$.post(
			$("#url").val()+"/up_move",
			{
				idmarch_news:idmarch_news,
			},
			function(res){
				alert(res);
				if(res.trim()=="上移成功"){
					$(":checkbox").removeAttr("checked");//去掉对勾
					flush();	//刷新延迟2秒
				}
			}
		);
	});
	$("[name='down_move']").click(function(){
		var idmarch_news = $(this).attr("value");
		$.post(
			$("#url").val()+"/down_move",
			{
				idmarch_news:idmarch_news,
			},
			function(res){
				alert(res);
				if(res.trim()=="下移成功"){
					$(":checkbox").removeAttr("checked");//去掉对勾
					flush();	//刷新延迟2秒
				}
			}
		);
	});
});