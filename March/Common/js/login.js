$(document).ready(function(){
	$('#btn_login').click(function(){
		if($('#login_user').val() == '' || $('#login_pwd').val() == ''){
			alert("请输入用户名和密码!");
			return false;
		}
		
		$.ajax({
			url:$('#root').val()+'/oa.php',
			type:'post',
			data:{
				user_login:$('#login_user').val(),
				user_pwd:$('#login_pwd').val()
			},
			success:function(data){
				if(data == 1){
					location.href=$('#root').val()+'/oa.php';
				}else{
					alert("用户名或密码错误!");
				}
			}
		});		//ajax send data for login
		
		return false;
	});	//btn_login click function
})