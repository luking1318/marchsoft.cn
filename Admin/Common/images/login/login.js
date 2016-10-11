$(document).ready(function(){
	$('#sub').click(function(){
	
		if($('#username').val() == ''){
			alert("请输入用户名!");
			return false;
		}
		
		if($('#password').val() == ''){
			alert("请输入密码!");
			return false;
		}
		
		if($('#verifycode').val() == ''){
			alert("请输入验证码!");
			return false;
		}
		
		$.ajax({
			url:$('#rot').val()+"/login",
			type:"post",
			data:{
				username:$('#username').val(),
				password:$('#password').val(),
				verifycode:$('#verifycode').val()
			},
			success:function(data){
				switch(data){
				case '1':
					alert("验证码错误！");
					break;
					
				case '2':
					alert("用户名或密码错误！");
					break;
				
				case '3':
					alert("您没有登录权限!");
					break;
					
				case '4':
					location.href=$('#rot').val()+"/index.html";
					break;
				}
				
			}
		});
		
	});
	
	
	$("input").keypress(function (e) {		//判断当输入回车后出发登陆按钮事件
		 var e = e || event,
		 keycode = e.which || e.keyCode;
		 if (keycode==13) 
		 {
		  	$('#sub').trigger("click");
		 }
	});
	
});

function changeVerify(){
	var timenow = new Date().getTime();
	document.getElementById('verifyimg').src= $('#rot').val()+'/verify/'+timenow;  
}

function correctPNG()
{
    var arVersion = navigator.appVersion.split("MSIE")
    var version = parseFloat(arVersion[1])
    if ((version >= 5.5) && (document.body.filters)) 
    {
       for(var j=0; j<document.images.length; j++)
       {
          var img = document.images[j]
          var imgName = img.src.toUpperCase()
          if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
          {
             var imgID = (img.id) ? "id='" + img.id + "' " : ""
             var imgClass = (img.className) ? "class='" + img.className + "' " : ""
             var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
             var imgStyle = "display:inline-block;" + img.style.cssText 
             if (img.align == "left") imgStyle = "float:left;" + imgStyle
             if (img.align == "right") imgStyle = "float:right;" + imgStyle
             if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
             var strNewHTML = "<span " + imgID + imgClass + imgTitle
             + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
             + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
             + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
             img.outerHTML = strNewHTML
             j = j-1
          }
       }
    }    
}
window.attachEvent("onload", correctPNG);