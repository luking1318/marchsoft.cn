$(document).ready(function(){
	$("#firstitem").addClass("select");
	$(".listitem").click(function(){
		$(".listitem").removeClass("select");
		$(this).addClass("select");
		$("#searchcon").val("");
		
	});
	
	$("#btnsearch").click(function(){
		var text=$("#searchcon").val();
		if(text){
			var rot = $("#rot").val();
			$(".listitem").removeClass("select");
			$('#inner').attr("src",rot+"index.php/Knowledge/searchlist?search="+text);
		}	
	})
	//添加遮罩层
	$("#blog .user").mouseover(function(){
		if(!$(this).find("#popup").length){	//不存在遮罩层就添加
			$(this).append("<div id='popup'>Enter the blog</div>");
		}
	}).mouseleave(function(){
		$(this).find("#popup").remove();
	});
	
	
	
});
function autoHeight(){
    var iframe = document.getElementById("inner");
    if(iframe.Document){//ie��������
        iframe.style.height = iframe.Document.documentElement.scrollHeight+50;
    }else if(iframe.contentDocument){//ie,firefox,chrome,opera,safari
        iframe.height = iframe.contentDocument.body.offsetHeight+50 ;
    }
}
	

