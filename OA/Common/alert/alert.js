// 重定义alert
function alert(msg){
	$('#alert').html("<div style='color:white;text-align:center;height:25px;width:300px;position:fixed;left:50%;top:20%;margin-left:-150px;z-index:4000;background-color:black' class='alert message fade in hide'><a style = 'color:white' class='dismiss close' data-dismiss='alert'>×</a>"
		+ msg + "</div>"
    );
    $(".alert").show();
    $(".alert").delay(2000).fadeIn().fadeOut();
}