<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑项目</title>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/editor/kindeditor.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/DatePicker/WdatePicker.js"></script>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Admin/Common/js/prize/addprize.js"></script>
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Admin/Common/css/prize/addprize.css" />
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Common/css/bootstrap.css" />
</head>
<body>
     <div id="con"> 
		  <h2 align="center">编辑项目</h2>
		  <form name="form1" action="__URL__/editsubmit/id/<?php echo ($content['prize_id']); ?>" method="post" onSubmit="return check();" enctype="multipart/form-data">
		    <p>
			    姓&nbsp;&nbsp;&nbsp;名: <input id="projecttitle" name="name" type="text" style="width:405px;" maxlength="50" value="<?php echo ($content['prize_name']); ?>"/>
			</p>
			<p>
				奖&nbsp;&nbsp;&nbsp;项: <select id="projecttype" name="num" type="text" style="width:150px; margin-right:50px;" maxlength="20">
					<?php if($content['prize_num'] == 1): ?><option value="1">新锐奖学金</option>
					<?php else: ?><option value="0">卓越奖学金</option><?php endif; ?>
					<option value="0">卓越奖学金</option>
					<option value="1">新锐奖学金</option>
				</select>
			</p>
			<P>
				图&nbsp;&nbsp;&nbsp;片: <input type="file" name="picture" style="margin-left:10px;"/>
				<input type="hidden" value="<?php echo ($imagemode); ?>" name="imagemode"/>
				<?php if($imagemode == 1): ?><span id="connull" style="color:red; margin-left:10px; margin-right:20px;  ">(已有图片存在)</span>
					<a target="_blank" href="<?php echo ($content['prize_img']); ?>" >点击查看</a><?php endif; ?>
				<?php if($imagemode == 0): ?><span id="connull" style="color:red; margin-left:10px; margin-right:20px;  ">(上传图片格式：png jpg jpef.)</span>
					<a target="_blank" href="<?php echo ($content['prize_img']); ?>" >点击查看</a><?php endif; ?>
				
			</p>
			<p>
				<div style="width:800px;  height:200px;">
					<div style="height:200px; width:48px; float:left;">信&nbsp;&nbsp;&nbsp;息:</div>
					<div style="width:600px; height:200px; float:left;">
							<textarea id='content_1' name="con" style="width:600px;height:200px; ">
							<?php echo ($content['prize_con']); ?>
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