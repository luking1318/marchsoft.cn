<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="__ROOT__/Admin/Common/css/Photo/pho.css">
	<link rel="stylesheet" type="text/css" href="__ROOT__/Common/css/bootstrap.css">
  	<script type="text/javascript" src="__ROOT__/Common/js/jquery.js"></script>
   	<script charset="utf-8" src="__ROOT__/Common/js/bootstrap.js"></script>
   	<script charset="utf-8" src="__ROOT__/Admin/Common/js/photo/photo.js"></script>
</head>
<body>
	<input type="hidden" id="url" value="__URL__">
	<div id="div_bo">
		<center>
			<h1>相册管理</h1>
		<div id=div_cen class="table-bordered">
			<div id="div_top" class="table-bordered">
				<a  class="btn btn-primary" id="btn" href="__URL__/upload">上传照片</a>
				<a id="a_cre" href="javascript:create_pho();"><big><b>创建相册</b></big></a>
			</div>
			<div id="div_bot">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="div_poto" id="<?php echo ($vo['idmarch_photo']); ?>_div">
						<div class="photo">
							<div class="photo1"><a href="__URL__/open_photo/id/<?php echo ($vo['idmarch_photo']); ?>">
								<img class="image" src="__ROOT__/Common/img/photo/s_<?php echo (($vo['photo_src'])?($vo['photo_src']):'fengmian.jpg'); ?>">
							</a></div>
						</div>
						<span><font id="<?php echo ($vo["idmarch_photo"]); ?>@@"><?php echo ($vo["photo_name"]); ?></font>
							<input type="text" class="input-upl" id="<?php echo ($vo["idmarch_photo"]); ?>@" value="<?php echo ($vo["photo_name"]); ?>" onblur="hide(<?php echo ($vo["idmarch_photo"]); ?>)">
						</span><br>
						<div id="span_oper">
							<a id="a_oper" class="a_oper" href="javascript:upl_pho(<?php echo ($vo['idmarch_photo']); ?>);">编辑</a>
							<a id="<?php echo ($vo['idmarch_photo']); ?>" class="a_oper" href="javascript:del_pho(<?php echo ($vo['idmarch_photo']); ?>);">删除</a>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>	
			</div>	
		</div>
		</center>
	</div>
</body>
</html>