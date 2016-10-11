//编辑课表
function show_input(){
	if($(".inptut1").css("display") != "none"){	//课表处于编辑状态，再点击编辑按钮无效
		return;
	}
	$(".inptut1").show();
	$(".font1").hide();
	for(i=0;i<5;i++){
		for(j=0;j<5;j++){
			fontid=String(i)+String(j);
			fontobj=document.getElementById(fontid);
			inputobj=document.getElementById(fontid+"@");
			inputobj.value=fontobj.innerHTML;
		}
	}
	
}

//确定按钮
function hide_input(){
	if($(".inptut1").css("display") == "none"){	//课表不是编辑状态，再点击确定按钮无效
		return;
	}
	var course_str="";		//将课表的字段合成一个字符串付给course_str
	var course_font="";		//原课表字符串
	for(i=0;i<5;i++){
		for(j=0;j<5;j++){
			fontid=String(i)+String(j);
			fontobj=document.getElementById(fontid);
			inputobj=document.getElementById(fontid+"@");
			if(inputobj.value==""){
				inputobj.value="no";
			}
			if(fontobj.innerHTML==""){
				fontobj.innerHTML="no";
			}
			course_font+=(fontobj.innerHTML+"@");
			course_str+=(inputobj.value+"@");
		}
	}
	if((course_font!=course_str) && ($(".inptut1").css("display")!="none")){
		$.post(
			$("#url").val()+"/upadte_course",
			{
				course_string:course_str,
		    },
		    function(res){
		    	if(res==1){
		    		alert("修改成功！");
		    		success();
		    	}else{
		    		alert("修改失败！");
		    		error();
		    	}
		    }
		);
	}else{
		success();
	}
}


//隐藏显示内容操作
function success(){
	for(i=0;i<5;i++){
		for(j=0;j<5;j++){
			fontid=String(i)+String(j);
			fontobj=document.getElementById(fontid);
			inputobj=document.getElementById(fontid+"@");
			if(inputobj.value=="no"){
				inputobj.value="";
			}
			fontobj.innerHTML=inputobj.value;
		}
	}
	$(".inptut1").hide();
	$(".font1").show();
}
function error(){
	for(i=0;i<5;i++){
		for(j=0;j<5;j++){
			fontid=String(i)+String(j);
			fontobj=document.getElementById(fontid);
			inputobj=document.getElementById(fontid+"@");
			if(inputobj.value=="no"){
				fontobj.innerHTML="";
			}
			
		}
	}
	$(".inptut1").hide();
	$(".font1").show();
}
/*------输入的字符串中不能包含@或=  */
$(function(){	
	$(".inptut1").keyup(function(){
		var id = $(this).parent().children("font").attr("id");
		$.post(
			$("#url").val()+"/search_str",
			{
				string:$(this).val(),
			},
			function(res){
				if(res != "no"){	//输入了@或=改变文本框的值，否则就不改变
					$("#"+id).parent().children("input").val(res);
				}
			}
		);
	});
});