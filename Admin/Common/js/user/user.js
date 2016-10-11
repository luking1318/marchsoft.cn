
	//操作数据成员职位
		function upd(id,phone){
			$.ajax({
				url:$("#url").val()+"/operate",
				type:"POST",
				dataType:"TEXT",
				data:{
					module_id:id,
					user_phone:phone
				},
				success:function(data){		
					module=data.substr(data.indexOf("00"),3);
					phone=data.substr(data.indexOf("phone")+8,11);
					getid=document.getElementById(phone+"@");
					switch(module){
						case '001':module="讲课负责人"; break;
						case '002':module="笔记负责人"; break;
						case '003':module="便签负责人"; break;
						case '004':module="活动负责人"; break;
						case '005':module="卫生负责人"; break;
						case '006':module="信息维护人";break;
						case '007':module="普通成员"; break;
					}
					getid.innerHTML=module;
				},
				error:function(){			
					alert("服务器忙，稍后重试！");
				}
			});
		}
		
		var bool=false;
		//异步表单判断，添加数据
		function auth(id){
			getid=document.getElementById(id);
			getspan=document.getElementById(id+"@");
			switch(id){
				
				case "input02":{
					if(escape(getid.value).indexOf("%u")!=-1) 
					{ 
						getspan.style.color="red";
						getspan.innerHTML="不能含有汉子！";
						bool=true;
						return false;
					} else if(getid.value==""){
						getspan.style.color="red";
						getspan.innerHTML="不能为空！";
						bool=true;
						return false;
					}else{
						getspan.innerHTML="";
						bool=false;
					}
					$.ajax({
						url:$("#url").val()+"/add_user_auth",
						type:"POST",
						dataType:"TEXT",
						data:{
							user_login:getid.value
						},
						success:function(data){
							getspan.style.color="red";
							getspan.innerHTML=data;
						},
						error:function(){
							alert("服务器繁忙，请稍后操作！");
						}
					});
				};break;
				case "input04":{
					if(getid.value==""){
						getspan.style.color="red";
						getspan.innerHTML="不能为空！";
						bool=true;
						return false;
					}
					else if(getid.value.length!=11||getid.value.match(/[a-z|A-Z]+/gi)){//是否有汉字
						getspan.style.color="red";
						getspan.innerHTML="必须是11位数字！";
						bool=true;
						return false;
					}
					else{
						getspan.innerHTML="";
						bool=false;
					}
				};break;
				case "input05":{		//提交数据
					if($("#input07")&&$("#input02").val()!=""&&$("#input04").val()!=""&&bool==false){
							$.ajax({
								url:$("#url").val()+"/add_user",
								type:"POST",
								dataType:"TEXT",
								data:{
									level:$("#input07").val(),
									user_login:$("#input02").val(),
									user_phone:$("#input04").val()
								},
								success:function(data){
									if(data==$("#input02").val()){
										document.getElementById("show_span").innerHTML="<font color:green;><b>&nbsp;"+data+"添加成功！</b></font>";
									}else{
										document.getElementById("show_span").innerHTML="<font color:green;><b>&nbsp;"+data+"添加失败！</b></font>";
									}
									hide();
								},
								error:function(){
									alert("系统繁忙，请稍后操作！");
								}
							});
					}
				};break;
				case "input07":{
					if(getid.value==""){
						getspan.style.color="red";
						getspan.innerHTML="不能为空！";
						bool=true;
						return false;
					}else if(getid.value.length!=4||getid.value.match(/[a-z|A-Z]+/gi)){
						getspan.style.color="red";
						getspan.innerHTML="必须是4位数字的年份！";
						bool=true;
						return false;
					}else{
						getspan.innerHTML="";
						bool=false;
					}
				};break;
			}
		}
		
		function hide(){
			$('#input02').attr("value","");
			$('#input04').attr("value","");
			document.getElementById('input02@').innerHTML = "";
			document.getElementById('input04@').innerHTMl = "";
		}
		
		
		function del_user(value){
			bool=confirm("确定要删除吗？");
			if(bool){
				window.location.href=$('#url').val()+'/del_user/user_phone/'+value;
			}
		}
