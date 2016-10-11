
var url = $('#url').val();

$(document).ready(function(){
	$('.n_link').click(function(){
		$id = $(this).attr("url");
		$.ajax({
			url:url+"/show",
			type:"post",
			data:{id:$id},
			success:function(data){
				alert(data);
			}
		});

		
	});	//.n_link  Click
	
});	//document
