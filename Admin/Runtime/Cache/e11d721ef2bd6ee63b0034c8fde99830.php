<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑项目</title>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/editor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/DatePicker/WdatePicker.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Admin/Common/js/project/addproject.js"></script>
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Admin/Common/css/project/addproject.css" />
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Common/css/bootstrap.css" />
</head>
<body>
     <div id="con"> 
		  <h2 align="center">编辑项目</h2>
		  <form name="form1" action="__URL__/editsubmit/id/<?php echo ($content['idmarch_project']); ?>" method="post" onSubmit="return check();" enctype="multipart/form-data">
		    <p>
			    标&nbsp;&nbsp;&nbsp;题: <input id="projecttitle" name="title" type="text" style="width:405px;" maxlength="50" value="<?php echo ($content['project_title']); ?>"/>
			</p>
			<p>
				类&nbsp;&nbsp;&nbsp;型: <input id="projecttype" name="type" type="text" value="<?php echo ($content['project_type']); ?>" style="width:150px; margin-right:50px;" maxlength="20"/>
				
				公&nbsp;&nbsp;司: <input id="projectcompany" name="company" value="<?php echo ($content['project_company']); ?>" type="text" style="width:150px;" maxlength="20"/>
			</p>
			<p>
				账&nbsp;&nbsp;&nbsp;户: <input id="projectaccount" name="account" value="<?php echo ($content['project_user']); ?>" type="text" style="width:150px; margin-right:50px;" maxlength="20"/>
				密&nbsp;&nbsp;码: <input id="projectpassword" name="password" value="<?php echo ($content['project_pwd']); ?>" type="text" style="width:150px;" maxlength="20"/>
			</p>
			<P>
				图&nbsp;&nbsp;&nbsp;片: <input type="file" name="picture" style="margin-left:10px;"/>
				<input type="hidden" value="<?php echo ($imagemode); ?>" name="imagemode"/>
				<?php if($imagemode == 1): ?><span id="connull" style="color:red; margin-left:10px; margin-right:20px;  ">(已有图片存在)</span>
					<a target="_blank" href="<?php echo ($content['project_img']); ?>" >点击查看</a><?php endif; ?>
				<?php if($imagemode == 0): ?><span id="connull" style="color:red; margin-left:10px; margin-right:20px;  ">(上传图片格式：png jpg jpef.)</span>
					<a target="_blank" href="<?php echo ($content['project_img']); ?>" >点击查看</a><?php endif; ?>
				
			</p>
			
			<P>
				文&nbsp;&nbsp;&nbsp;件:  				
				<input name="link" style="margin-left:10px;" value="<?php echo ($content['project_url']); ?>" type="text"/>
				<span id="connull" style="color:red; margin-left:20px; margin-top:-5px;  ">输入资源的链接(推荐方式).</span>
			</p>
			<p>
				<div style="width:800px;  height:200px;">
					<div style="height:200px; width:48px; float:left;">简&nbsp;&nbsp;&nbsp;介:</div>
					<div style="width:600px; height:200px; float:left;">
							<textarea id='content_1' name="content" style="width:600px;height:200px; ">
							<?php echo ($content['project_intro']); ?>
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