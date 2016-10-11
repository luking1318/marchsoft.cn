$(function(){
	$("#" + $('#date').val()).addClass("active");
	
	if($("#notice").height() != null){			//通知公告中每行div与第一行对齐
		$(".one").css("height",$("#notice").height()-150+"px");
	}
});