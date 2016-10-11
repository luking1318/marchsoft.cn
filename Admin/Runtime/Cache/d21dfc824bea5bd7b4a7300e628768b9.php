<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="__ROOT__/Common/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="__ROOT__/Admin/Common/css/user/all_user.css">
    <script type="text/javascript" src="__ROOT__/Admin/Common/js/user/user.js"></script>
    <script type="text/javascript" src="__ROOT__/Common/js/jquery.js"></script>
    <script charset="utf-8" src="__ROOT__/Common/js/bootstrap.min.js"></script>
</head>
<body>
	<input type="hidden" name="url" id="url" value="__URL__">
	<div id=div_cen>
		<table id="table" class="table table-bordered" cellpadding=0 cellspacing=0>
		   	<caption><h1>用户管理表</h1></caption>
		   	<tr id="thead">
		   		<th width=50px;>头像</th><th>姓名</th><th>电话</th><th>院系</th>
		   		<th>班级</th><th>职位</th><th>操作</th>
		   	</tr>
	
		   	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="tr">
				<td><img id="img_photo" src="__ROOT__/Common/img/photo/photo/s_<?php echo (($vo[avator])?($vo[avator]):'fengmian.jpg'); ?>"></td>
				<td><?php echo ($vo[user_name]); ?></td>
				<td><?php echo ($vo['user_phone']); ?></td>
				<td><?php echo ($vo['department']); ?></td>
				<td><?php echo ($vo['class']); ?></td>
				<td id="<?php echo ($vo['user_phone']); ?>@"><?php echo (($vo['module_name'])?($vo['module_name']):"普通成员"); ?></td>
				<td>
					<div class="btn-group">
	  					<ul class="nav nav-pills">
	  				  <li class="dropdown" id="<?php echo ($vo['user_phone']); ?>">
	  				    <a class="btn"  data-toggle="dropdown" href="#<?php echo ($vo['user_phone']); ?>">  设为
	  				      <b class="caret"></b>
	  				    </a>
	  				    <ul class="dropdown-menu" id="<?php echo ($vo['user_phone']); ?>" >
		  				   <li><a onclick="upd('007','<?php echo ($vo['user_phone']); ?>')" href="#">普通成员</a></li>
						   <li><a onclick="upd('001','<?php echo ($vo['user_phone']); ?>')" href="#">讲课负责人</a></li>
						   <li><a onclick="upd('002','<?php echo ($vo['user_phone']); ?>')" href="#">笔记负责人</a></li>
						   <li><a onclick="upd('003','<?php echo ($vo['user_phone']); ?>')" href="#">便签负责人</a></li>
						   <li><a onclick="upd('004','<?php echo ($vo['user_phone']); ?>')" href="#">活动负责人</a></li>
						   <li><a onclick="upd('005','<?php echo ($vo['user_phone']); ?>')" href="#">卫生负责人</a></li>
						    <li><a onclick="upd('006','<?php echo ($vo['user_phone']); ?>')" href="#">信息维护人</a></li>
	  				    </ul>
	  				  </li>
	  				  <a style="margin-left:10px;line-height:22px;margin-top:2px" class="btn" href="javascript:del_user(<?php echo ($vo['user_phone']); ?>);">删除</a>
	  				  </ul>
					</div>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		<p style="float:right;"><?php echo ($show); ?></p>
			 
		 <!--提交按钮-->
		
			
				<a class="btn"  id="btn_add" data-toggle="modal" href="#login_show" > 添加</a>
		
		
		
		<div class="modal" id="login_show" style="width:450px;display:none">
		  <div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>添加成员</h3>
		  </div>
		  <div class="modal-body">
				<font class="label1">登陆账号：</font>
			    <input type="text" class="input-xlarge" id="input02" onblur="auth(this.id)">
				<font color="green" class="font">*必须是字母或数字</font> 
			    <span id="span_login" class="help-block"><font class="fff" id="input02@"></font></span>
				  
				<span class="label1"  >电话号码：</span>
				<input type="text" class="input-xlarge" id="input04" onblur="auth(this.id)">
				<font color="green" class="font">*只能是11位数字</font>
				<span id="span_phone" class="help-block"><font class="fff" id="input04@"></font></span>
				   
				<span class="label1"  >入学时间：</span>
				<input type="text" class="input-xlarge" id="input07" onblur="auth(this.id)">
				<font color="green" class="font">*只输入年份</font>
				<span id="span_phone" class="help-block"><font class="fff" id="input07@"></font></span>
				
		  </div>
		  <div class="modal-footer">
		  	<span style="float:left;margin-left:20px;background-color:#ccc; border:1px solid green;" id="show_span"></span>
			<a href="#" class="btn" data-dismiss="modal">取消</a>
			<a href="javascript:auth('input05');" class="btn btn-primary">提交</a>
		  </div>
		</div>
			</div>
	</div>
</body>
</html>