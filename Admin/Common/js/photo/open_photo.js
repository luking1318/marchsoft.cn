//删除图片
function del_pho(id){
	$.ajax({
		url:$("#url").val()+"/del_pho",
		type:"POST",
		dataType:"text",
		data:{
			idmarch_photo_list:id
		},
		success:function(data){
			if(data=="1"){
				var _image=document.getElementById(id+'@');
				_image.parentNode.removeChild(_image);
			}else{
				alert("删除失败!");
			}
		},
		error:function(){
			alert("系统繁忙，稍后操作！");
		}
	});
}

//设置封面
function set_cover(name,pid){
	$.ajax({
		url:$("#url").val()+"/set_cover",
		type:"POST",
		dataType:"TEXT",
		data:{
			photo_src:name,
			idmarch_photo:pid
		},
		success:function(data){
			if(data=="1"){
				alert("设置成功！");
			}else{
				alert("设置失败！");
			}
		},
		error:function(){
			alert("系统繁忙！稍后再试！");
		}
	});
}