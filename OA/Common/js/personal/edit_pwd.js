function submit_pwd(){
	$fontobj1=document.getElementById('pwd11');
	$fontobj2=document.getElementById('pwd22');
	$fontobj3=document.getElementById('pwd33');
	if($("#pwd1").val()==""){
		$fontobj1.innerHTML="*不能为空！";
		return false;
	}else if($("#pwd2").val()==""){
		$fontobj2.innerHTML="*不能为空！";
		return false;
	}else if($("#pwd3").val()==""){
		$fontobj3.innerHTML="*不能为空！";
		return false;
	}else if($("#pwd2").val()!=$("#pwd3").val()){
		$fontobj3.innerHTML="*密码不一致！";
		return false;
	}
	$.ajax({
		url:$("#url").val()+"/upd_pwd",
		type:"POST",
		dataType:"TEXT",
		data:{
			oldpwd:$("#pwd1").val(),
			newpwd:$("#pwd2").val()
		},
		success:function(data){
			$fontobj1.innerHTML="";
			$fontobj2.innerHTML="";
			$fontobj3.innerHTML="";
			if(data=="1"){
				alert("修改成功！");
				$("#pwd1").attr("value","");
				$("#pwd2").attr("value","");
				$("#pwd3").attr("value","");
			}else if(data=="0"){
				$fontobj1.innerHTML="*密码错误！";
			}else if(data=="3"){
				alert("修改失败！");
			}
		},
		error:function(){
			alert("系统繁忙，稍后再试！");
		}
	});
}

//隐藏警告
function hide(idinput,idfont ){
	var objinput=document.getElementById(idinput);
	var objfont=document.getElementById(idfont);
	if(objinput.value!=""){
		objfont.style.display="none";
	}
}