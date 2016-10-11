function fun(){
	$('input[name="file"]').click();
}
$(function(){
	$('input[name="save"]').click(function(){
		if($('input[name="file"]').val() == ""){
			alert("请选择文件");
		}else{
			$('#myModal').modal("show");
			$('form').submit();
		}
	});
});