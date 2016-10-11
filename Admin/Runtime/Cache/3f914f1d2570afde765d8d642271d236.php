<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>奖项列表</title>
	<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Common/css/bootstrap.css" />
	<script type="text/javascript" charset="utf-8" src="__ROOT__/Admin/Common/js/news/newslist.js"></script>
</head>
<body style="padding-top:20px;">
      <div id="con" style="margin: 0px auto; width:900px;">
      <h3 align="center">奖项列表</h3>
	  <table class="table table-bordered" cellpadding="0px" cellspacing="0px" border="1px" width="900px" >
	    <thead>
	    	<tr> 
	    	    <th width="10%">图片</th>
	    		<th width="12%">姓名</th>
	    		<th align="center">信息</th>
	    		<th width="16%">奖项</th>
	    		<th width="6%">编辑</th>
	    		<th width="6%">删除</th>
	    	</tr>
	    </thead>
	    <tbody>
	    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr valign="middle" style="line-height:80px;" height="80">
	       
	        <td><img src="<?php echo ($vo['prize_img']); ?>" width="70" heitht="70" /></td>
			<td valign="middle"><?php echo ($vo['prize_name']); ?></td>
			<td><?php echo ($vo['prize_con']); ?></td>
			<td><?php echo ($vo['prize_num']); ?></td>
			<td><a href="__URL__/edit/id/<?php echo ($vo['prize_id']); ?>"><img style="width:25px; height:25px;" title="编辑" src="__ROOT__/Admin/Common/images/news/edit.png" /></a></td>
			<td><a href="__URL__/del/id/<?php echo ($vo['prize_id']); ?>"><img style="width:25px; height:25px;" title="删除" src="__ROOT__/Admin/Common/images/news/delete.png" /></a></td>		
		 </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<tr>
		   <td colspan="6">
		      <div id="page"><center><?php echo ($page); ?></center></div>
		   </td>
		</tr>
	    </tbody>
	  </table>
	  
		  
	 </div>
</body>
</html>