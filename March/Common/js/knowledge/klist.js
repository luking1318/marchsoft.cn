$(document).ready(function(){
	
	
	$(".atag").click(function(){
		var text=$(this).text();
		if(text){
			var rot = $("#rot").val();
			$(".listitem",parent.document).removeClass("select");
			$('#inner', parent.document).attr("src",rot+"index.php/Knowledge/searchlist?search="+text);
		}	
	})
	
	
	
	
	
});