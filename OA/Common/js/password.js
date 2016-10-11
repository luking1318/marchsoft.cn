$(function(){
	$("input[name='oldpwd']").click(function(){
		$("label[name='oldpwd']").addClass("back");
	});
	$("input[name='newpwd']").click(function(){
		$("label[name='newpwd']").addClass("back");
	});
	$("input[name='repwd']").click(function(){
		$("label[name='repwd']").addClass("back");
	});

	$("input[name='oldpwd']").blur(function(){
		$("label[name='oldpwd']").removeClass("back");
		if($(this).val() <= 0){
			$(this).addClass("back");
			alert("请输入旧密码");
		}else{
			$.post(
				$("#url").val()+"/code_pwd",
				{
					user_pwd:$("input[name='oldpwd']").val(),
				},
				function(res){
					res = res.trim();//去掉空格
					if(res == "密码错误"){
						$("input[name='oldpwd']").addClass("back");
						alert("旧密码输入错误");
					}else if(res == "密码正确"){
						$("input[name='oldpwd']").removeClass("back");
					}
				}
			);
		}
	});
	$("input[name='newpwd']").blur(function(){
		$("label[name='newpwd']").removeClass("back");
		if($(this).val() <= 0){
			$(this).addClass("back");
			alert("请输入新密码");
		}else if($(this).val() == $("input[name='oldpwd']").val()){
			$(this).addClass("back");
			alert("不能与原密码相同");
		}
	});
	$("input[name='repwd']").blur(function(){
		$("label[name='repwd']").removeClass("back");
		if($(this).val() <= 0 || $("input[name='newpwd']").val() != $(this).val()){
			$(this).addClass("back");
			alert("请与新密码一致");
		}else{
			$(this).removeClass("back");
		}
	});
	$("input[name='save']").click(function(){
		var oldpwd = $("input[name='oldpwd']");
		var newpwd = $("input[name='newpwd']");
		var repwd = $("input[name='repwd']");
		if(oldpwd.val().length==0 || oldpwd.hasClass("back")){
			$("label[name='oldpwd']").addClass("back");
			oldpwd.addClass("back");
			oldpwd.focus();
		}else if(newpwd.val().length==0 || newpwd.hasClass("back")){
			$("label[name='newpwd']").addClass("back");
			newpwd.addClass("back");
			newpwd.focus();
		}else if(repwd.val().length==0 || repwd.hasClass("back")){
			$("label[name='repwd']").addClass("back");
			repwd.addClass("back");
			repwd.focus();
		}else{
			$.post(
				$("#url").val()+"/upd_pwd",
				{
					newpwd:newpwd.val(),
				},
				function(res){
					res = res.trim();//去掉空格
					if(res == "修改成功"){
						oldpwd.val("");
						newpwd.val("");
						repwd.val("");
					}
					alert(res);
				}
			);
		}
	});
});