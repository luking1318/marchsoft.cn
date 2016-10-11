function del_pho(id){
	bool=confirm("确定要删除吗？");
	if(bool){
		$.ajax({
			url:$("#url").val()+"/del_photo",
			type:"POST",
			dataType:"TEXT",
			data:{
				idmarch_photo:id
			},
			success:function(data){
				if(data=="1"){
					var _div=document.getElementById(id+'_div');
					_div.parentNode.removeChild(_div);
				}else{
					alert("删除失败!");
				}
			},
			error:function(){
				alert("系统繁忙，请稍后操作！");
			}
		});
	}
}

function upl_pho(pho_id){
	getidmarch1=document.getElementById(pho_id+"@");
	getidmarch2=document.getElementById(pho_id+"@@");
	getidmarch2.style.display="none";
	getidmarch1.style.display="block";
}

function hide(id){
	getid1=document.getElementById(id+"@");
	getid2=document.getElementById(id+"@@");
	getdiv=document.getElementById("span_oper");
	getid1.style.display="none";
	if(getid1.value!=getid2.innerTEXT){
		$.ajax({
			url:$("#url").val()+"/upl_pho",
			type:"POST",
			dataType:"TEXT",
			data:{
				idmarch_photo:id,
				photo_name:getid1.value
			},
			success:function(data){
				if(data=="1"){
					getid2.innerHTML=getid1.value;
					getid2.style.display="block";
				}else{
					getid2.style.display="block";
				}
			},
			error:function(){
				alert("系统繁忙，稍后操作！");
			}
		});
	}
}

function create_pho(){
	value=prompt("请输入相册名：");
	if(value){
		$.ajax({
			url:$("#url").val()+"/create_pho",
			type:"POST",
			dataType:"TEXT",
			data:{
				photo_name:value
			},
			success:function(data){
				if(data="1"){
					window.location.href=$("#url").val()+"/index";
				}else{
					alert("相册创建失败！");
				}
			},
			error:function(){
				alert("系统繁忙，请稍后！");
			}
		});
	}
}


function upload_pho(){
	$('#div_body').show();
}

function close_upl(){
	$('#div_body').hide();
}









