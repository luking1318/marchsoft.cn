$(function(){
	$('input[name="all"]').live('click',function(){
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
				    $("#url").val()+"/del_all_blog",
				    {
		            	result_id:arr,
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
				$("#url").val()+"/del_blog",
				{
					result_id:$(this).attr("value"),
				},
				function(res){
					alert(res);
					if(res.trim() == "删除成功"){
						$(":checkbox").removeAttr("checked");//去掉对勾
						flush();
					}
				}
			);
		}
	});
	$("[name='count_blog']").click(function(){//单击统计笔记中的提交按钮
		var starttime = $('input[name="starttime"]').val();
		var endtime = $('input[name="endtime"]').val();
		if(starttime == "" || endtime == ""){
			alert("数据输入不完整");
		}else if(starttime > endtime){
			alert("起始时间不能大于结束时间");
		}else{
			$.post(
				$("#url").val()+"/count_blog1",
				{
					starttime:starttime,
					endtime:endtime,
				},
				function(res){
					alert(res);
					if(res.trim() == "添加成功"){
						jump($("#url").val()+"/blog");
					}
				}
			);
		}
	});
});