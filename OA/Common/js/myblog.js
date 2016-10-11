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
});