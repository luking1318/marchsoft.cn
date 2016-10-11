//选择查询
function sub_sel(){
	$("#iframe").attr("src",$("#url").val()+"/lect_sel/id/"+$("#sel").val());
}
//提交数据
function sub(){
	if($("#theme").val()==""){
		$("#font0").show();
		return false;
	}else if($("#lect_user").val()==""){
		$("#font1").show();
		return false;
	}else if($("#content").val()==""){
		$("#font2").show();
		return false;
	}else if($("#newstime").val()==""){
		$("#font3").show();
		return false;
	}else{
		return true;
	}
}

//隐藏警告
function hide(idinput,idfont ){
	var objinput=document.getElementById(idinput);
	var objfont=document.getElementById(idfont);
	if(objinput.value!=""){
		objfont.style.display="none";
	}
}

//单行删除
function sel_del(getid){
	if(confirm("确定要删除吗？")){
		$.ajax({
			url:$("#url").val()+"/sel_del",
			type:"POST",
			dataType:"TEXT",
			data:{
				idmarch_lecture:getid
			},
			success:function(data){
				if(data=="1"){
					//删除行
					 objrow=document.getElementById(getid+"@");
					 index=objrow.rowIndex;
					 table = document.getElementById("table");
					 table.deleteRow(index);
				}else{
					//alert("删除失败！");
					alert(data);
				}
			},
			error:function(){
				alert("系统繁忙，稍后再试！");
			}
		});
	}
}

//选择全部
function sel_all(){
	if($("#chk").attr("checked")){
		$("input").attr("checked",true);
	}else{
		$(".td").attr("checked",false);
	}
}

//取消选择
function sel_cnl(){
	$("#chk").attr("checked",false);
	$(".td").attr("checked",false);
}

//删除选择项
function del_all(){
	var ids="";
	$obj=document.getElementsByTagName('input');
	for(var i=0;i<$obj.length;i++){		//循环找出要删除的行
		if($obj[i].value=="on"&&$obj[i].id!="chk"){	//判断是否为复选框
			if(!$("#chk").attr("checked")){	//判断全选框是否为真
				if($obj[i].checked){		
					ids+=$obj[i].id+",";
				}
			}else{
				ids+=$obj[i].id+",";
			}
		}
	}
	ids=ids.substr(0,ids.length-1);
	if(ids!=""){
		if(confirm("确定要删除吗？")){
			$.ajax({
				url:$("#url").val()+"/del_all",
				type:"POST",
				dataType:"TEXT",
				data:{
					idmarch_lecture:ids
				},
				success:function(data){
					if(data=="1"){
						window.location.href=$("#url").val()+"/lect_sel/id/0";
					}else{
						alert("删除失败！");
					}
				},
				error:function(){
					alert("系统繁忙，稍后再试！");
				}
			});
		}
	}
}
