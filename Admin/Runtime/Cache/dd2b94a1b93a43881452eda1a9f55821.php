<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑项目</title>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/editor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/DatePicker/WdatePicker.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Admin/Common/js/don/adddon.js"></script>
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Admin/Common/css/don/adddon.css" />
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Common/css/bootstrap.css" />
</head>
<body>
     <div id="con"> 
		  <h2 align="center">编辑项目</h2>
		  <form name="form1" action="__URL__/editsubmit/id/<?php echo ($content['don_id']); ?>" method="post" onSubmit="return check();" enctype="multipart/form-data">
		    <p>
			    姓&nbsp;&nbsp;&nbsp;名: <input id="projecttitle" name="name" type="text" style="width:405px;" maxlength="50" value="<?php echo ($content['don_name']); ?>"/>
			</p>
			<p>
				金&nbsp;&nbsp;&nbsp;额: <input id="projecttype" name="num" type="text" style="width:150px; margin-right:50px;" maxlength="20" value="<?php echo ($content['don_num']); ?>" />
				<span id="connull" style="color:red; margin-left:10px;  ">(请输入捐献金额,可写二位小数)</span>
			</p>
			<p>
				<div style="width:800px;  height:200px;">
					<div style="height:200px; width:48px; float:left;">赠&nbsp;&nbsp;&nbsp;语:</div>
					<div style="width:600px; height:200px; float:left;">
							<textarea id='content_1' name="con" style="width:600px;height:200px; ">
							<?php echo ($content['don_mark']); ?>
							 </textarea>
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