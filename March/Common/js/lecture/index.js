$(function(){
	$("#btnsearch").click(function(){
		var text=$("#search_txt").val();
		if(text){
			var rot = $("#rot").val();
			$('#iframe').attr("src",rot+"str/"+text);
		}	
	})
});
//iframe自适应高度
function autoHeight(){
    var iframe = document.getElementById("iframe");
    if(iframe.Document){//ie自有属性
        iframe.style.height = iframe.Document.documentElement.scrollHeight+50;
    }else if(iframe.contentDocument){//ie,firefox,chrome,opera,safari
        iframe.height = iframe.contentDocument.body.offsetHeight+50 ;
    }
}
