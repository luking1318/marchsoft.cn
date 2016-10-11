//编辑课表
function show_input(){
	
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

//隐藏显示内容操作
function oper(){
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

//确定按钮
function hide_input(){
	var course_str="";      //将课表的字段合成一个字符串付给course_str
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
		$.ajax({
			url:$("#url").val()+"/upadte_data/phone/"+$("#session").val(),
			type:"POST",
			dataType:"TEXT",
			data:{
				course_string:course_str
		    },
		    success:function(data){
		    	if(data==1){
		    		oper();
		    	}else{
		    		alert("修改失败！");
		    		$(".inptut1").hide();
		    		$(".font1").show();
		    	}
		    },
		    error:function(){
		    	alert("服务器繁忙，请稍后再试！");
		    }
		});
	}else{
		if($(".inptut1").val()!=null&&$(".inptut1")[0].value!="no"){
			oper();
		}else{
			for(i=0;i<5;i++){
				for(j=0;j<5;j++){
					fontid=String(i)+String(j);
					fontobj=document.getElementById(fontid);
					if(fontobj.innerHTML=="no"){
						fontobj.innerHTML="";
					}
				}
			}
			$(".inptut1").hide();
			$(".font1").show();
		}
	}
}