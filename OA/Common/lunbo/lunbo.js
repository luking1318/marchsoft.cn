$(function() {
	var _visible = 3;
	$('#carousel').carouFredSel({
		items: _visible,
		width: '100%',
		auto: false,
		scroll: {
			duration: 200
		},
		prev: {
			button: '#prev',
			items: 1,
		},
		next: {
			button: '#next',
			items: 1,
		},
	});

	/*--------------不循环------------------*/
	var x = 1;		
	var count = $("#notice_count").val();
	$("#prev").css("display","none");
	$("#prev").bind("click",function(){
		x--;
		if(count > 3){
			if(x == 1){
				$("#prev").css("display","none");
				$("#next").css("display","block");
			}else{
				$("#prev").css("display","block");
				$("#next").css("display","block");
			}
		}
	});
	$("#next").bind("click",function(){
		x++;
		if(count > 3){
			if(x == count-2){
				$("#next").css("display","none");
				$("#prev").css("display","block");
			}else{
				$("#prev").css("display","block");
				$("#next").css("display","block");
			}
		}
	});
	/*--------------公告数量不多3个时，左对齐-------------*/
	if(count == 1 || count == 2){
		$("#carousel").css("left","141px");
	}
});