$(function(){
	$('input[name="user_name"]').blur(function(){
		if(/[\d\s><,._\。\[\]\{\}\?\/\+\=\|\'\\\":;\~\!\@\#\*\$\%\^\&\`·\uff00-\uffff)(]+/.test($(this).val()) || $(this).val().length<=0){
			$('span[class="user_name"]').remove();
			$(this).after("<span class='user_name' style='color:red'>只能是汉字和英文字母</span>");
			$(this).addClass("back");
		}else{
			$('span[class="user_name"]').remove();
			$(this).removeClass("back");
		}
	});
	$('input[name="department"]').blur(function(){
		if(/[^\u4E00-\u9FA5]/.test($(this).val()) || $(this).val().length<=0){
			$('span[class="department"]').remove();
			$(this).after("<span class='department' style='color:red'>只能输入汉字</span>");
			$(this).addClass("back");
		}else{
			$('span[class="department"]').remove();
			$(this).removeClass("back");
		}
	});
	$('input[name="class"]').blur(function(){
		if(/[\s><,._\。\[\]\{\}\?\/\+\=\|\'\\\":;\~\!\@\#\*\$\%\^\&\`·\uff00-\uffff)(]+/.test($(this).val()) || $(this).val().length<=0){
			$('span[class="class1"]').remove();
			$(this).after("<span class='class1' style='color:red'>只能是汉字、数字和字母</span>");
			$(this).addClass("back");
		}else{
			$('span[class="class1"]').remove();
			$(this).removeClass("back");
		}
	});
	$('input[name="user_phone"]').blur(function(){
		if((/[^0-9]/.test($(this).val())) || $(this).val().length != 11){
			$('span[class="user_phone"]').remove();
			$(this).after("<span class='user_phone' style='color:red'>只能是11位数字</span>");
			$(this).addClass("back");
		}else{
			$.post(
				$("#url").val()+"/phone",
				{
					user_phone:$(this).val(),
				},
				function(res){
					res = res.trim();//去掉空格
					if(res == "yes"){
						$('span[class="user_phone"]').remove();
						$('input[name="user_phone"]').after("<span class='user_phone' style='color:red'>号码不能重复</span>");
						$(this).addClass("back");
					}else{
						$('span[class="user_phone"]').remove();
						$(this).removeClass("back");
					}
				}
			);
		}
	});
	$('input[name="QQ"]').blur(function(){
		if((/[^0-9]/.test($(this).val())) || $(this).val().length < 5 || $(this).val().length > 11){
			$('span[class="QQ"]').remove();
			$(this).after("<span class='QQ' style='color:red'>只能是5~11位数字</span>");
			$(this).addClass("back");
		}else{
			$('span[class="QQ"]').remove();
			$(this).removeClass("back");
		}
	});

	$("input[name='save']").click(function(){
		if($('span[class="user_name"]').size()||$('input[name="user_name"]').val().length==0){
			$('input[name="user_name"]').focus();
		}else if($('span[class="department"]').size()||$('input[name="department"]').val().length==0){
			$('input[name="department"]').focus();
		}else if($('span[class="class1"]').size()||$('input[name="class"]').val().length==0){
			$('input[name="class"]').focus();
		}else if($('span[class="user_phone"]').size()||$('input[name="user_phone"]').val().length==0){
			$('input[name="user_phone"]').focus();
		}else if($('span[class="QQ"]').size()||$('input[name="QQ"]').val().length==0){
			$('input[name="QQ"]').focus();
		}else{
			$.post(
				$("#url").val()+"/update",
				{
					user_name:$("input[name='user_name']").val(),
					user_sex:$("input[name='user_sex']:checked").val(),
					department:$("input[name='department']").val(),
					class:$("input[name='class']").val(),
					user_phone:$("input[name='user_phone']").val(),
					QQ:$("input[name='QQ']").val(),
					blog:$("input[name='blog']").val(),
					describe:$("textarea[name='describe']").val(),
				},
				function(res){
					alert(res);
				}
			);
		}
	});
});
