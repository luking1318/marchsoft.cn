<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script type="text/javascript" src="__ROOT__/Common/js/jquery.js"></script><script language="javascript" type="text/javascript">   function ifsubmit()
   {	    
		var leadups=$('#IframeValue1', parent.document).val();	   
		$("#HideSort").attr("value",leadups);//修改数目
		var filse=$.trim($("#idfile").val());
		if(filse=="")
		{
			alert("选择图片");
			return false;
		}
		var strs= new Array(); //定义一数组
		strs=filse.split("."); //字符分割 
		var StrLength=strs.length;
		if(!(strs[StrLength-1].toLocaleLowerCase()=="png" || strs[StrLength-1].toLocaleLowerCase()=="gif" || strs[StrLength-1].toLocaleLowerCase()=="jpg"))
		{
			alert("图片格式不正确！");
			return false;
		}
   }
   function hide15()
   {
	  
   }
   $(document).ready(function(){
	   	$("#quxiao").click(function(){
				$("#showDiv2").css("display","none");
				$("#dvMsk").remove();

		});
   })
   
</script></head><body><form action="__ROOT__/OA.php/Jotting/upload" method="post"  onsubmit="return ifsubmit()" enctype="multipart/form-data"><input type="hidden" name="leadExcel" value="true"><input type="hidden" id="HideSort" name="LeadSort"  value="5" /><center><table border="0" style="margin-top:10px;" ><tr><td colspan='2'><input type="file" id="idfile"  name="inputExcel" size="20"  maxlength="20" /></td></tr><tr height="50px;"><td style="text-align:center"><input type="submit" id="BtUpload" value="开始上传" style="width:100px; height:30px;" /></td><td style="text-align:center;"></td></tr></table></center></form></body>