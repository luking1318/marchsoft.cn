<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加项目</title>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/editor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/DatePicker/WdatePicker.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Admin/Common/js/prize/addprize.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Admin/Common/js/prize/a.js"></script>
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Admin/Common/css/prize/addprize.css" />
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Common/css/bootstrap.css" />
</head>
<body>
     <div id="con"> 
		  <h2 align="center">添加奖项</h2><h5>奖项编辑</h5>
		  <form name="form1" action="__URL__/submit" method="post" onSubmit="return check();" enctype="multipart/form-data">
		    	<p>
			    姓&nbsp;&nbsp;&nbsp;名: <input id="projecttitle" name="name" type="text" style="width:100px;" maxlength="50"/>
			      班&nbsp;&nbsp;&nbsp;级: <input id="projecttitle" name="class" type="text" style="width:100px;" maxlength="50"/>
			      学&nbsp;&nbsp;&nbsp;院: <input id="projecttitle" name="col" type="text" style="width:100px;" maxlength="50"/>
			</p>
			<p>
				<!-- 类&nbsp;&nbsp;&nbsp;型: <input id="projecttype" name="num" type="text" style="width:150px; margin-right:50px;" maxlength="20"/> -->
				分&nbsp;&nbsp;&nbsp;类: <select id="projecttype" name="kind" type="text" style="width:110px; " maxlength="20">
					<option value="0">卓越一等奖</option>
					<option value="1">卓越二等奖</option>
				</select>
				专&nbsp;&nbsp;&nbsp;业: <input id="projecttitle" name="maj" type="text" style="width:100px;" maxlength="50"/>
				电&nbsp;&nbsp;&nbsp;话: <input id="projecttitle" name="tel" type="text" style="width:100px;" maxlength="50"/>
			</p>
			<p>
				邮&nbsp;&nbsp;&nbsp;箱: <input id="projecttitle" name="email" type="text" style="width:100px;" maxlength="50"/>
				届&nbsp;&nbsp;&nbsp;数: <input id="projecttitle" name="ses" type="text" style="width:100px;" maxlength="50"/>
			</p>
			
			<P>
				图&nbsp;&nbsp;&nbsp;片: <input type="file" name="picture" id="picture" style="margin-left:10px;"/>
				<span id="connull" style="color:red; margin-left:10px;  ">(图片处理后最佳大小：300*400   图片格式：jpg,png,jpeg)</span>
			</p>
			<p>
				<div style="width:800px;  height:200px;">
					<div style="height:200px; width:48px; float:left;">学习经历:</div>
					<div style="width:600px; height:200px; float:left;">
							<textarea id='content_1' name="stucon" style="width:600px;height:200px; "> </textarea>
					 </div>
				</div>
				<div style="width:800px;  height:200px;">
					<div style="height:200px; width:48px; float:left;">项目经历:</div>
					<div style="width:600px; height:200px; float:left;">
							<textarea id='content_2' name="procon" style="width:600px;height:200px; "> </textarea>
					 </div>
				</div>
				
			</p>
			<p>
			     <input class="btn btn-primary" type="submit" value="提交" style=" margin-left:50px; margin-top:5px; ">
				 <span id="connull" style="color:red; margin-left:20px; visibility:hidden; ">请仔细检查填写的内容！内容不能为空！</span>
			</p>
			</form>
	  	  
    </div>
</body>
</html>