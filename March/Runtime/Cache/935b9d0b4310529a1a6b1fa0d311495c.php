<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="__ROOT__/Common/css/bootstrap.css" type="text/css" />
<link href="__ROOT__/March/Common/css/knowledge/klist.css" rel="stylesheet">
<script type="text/javascript" src="__ROOT__/Common/js/jquery.js"></script>
<script src="__ROOT__/March/Common/js/knowledge/klist.js" style="text/javascript"></script> 
<title>搜索列表</title>
</head>

<body>
<div style="height:auto; width:680px; margin-top:20px;">

<?php if($count == 0): ?><center><h4 style="">没有数据！</h4></center><?php endif; ?>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><table cellpadding="0" cellspacing="0" width="100%" border="0">
    <tr height="25px">
		<td colspan="2" style="font-size:14px;font-weight:bold;">
		   <a target="_blank" href="__URL__/show?id=<?php echo ($vo['article_id']); ?>" style="color:#105CB6"> &nbsp;[&nbsp;<?php echo ($vo['sort_name']); ?>&nbsp;]&nbsp;<?php echo ($vo['article_title']); ?></a>
		</td>
	</tr>
	<!--
	<tr height="25px">
		<td colspan="2">
		  <a target="_blank"  style="color:#005A94; text-decoration:none;"  href=" <?php echo ($vo['blog']); ?>"  >
		  <?php echo ($vo['user_name']); ?>
		  </a> &nbsp;&nbsp;发布于<?php echo ($vo['article_time']); ?> &nbsp;&nbsp;阅读： <?php echo ($vo['article_num']); ?>   
		</td>
	</tr>
	 -->
	
	<tr height="70px">
		<td width="80px;">
		<?php if($vo['avator'] == '' ): ?><img src="__ROOT__/Common/img/photo/photo/s_fengmian.jpg" width="70px;" height="70px"/><?php endif; ?>
		
		<?php if($vo['avator'] != '' ): ?><img src="__ROOT__/Common/img/photo/photo/s_<?php echo ($vo['avator']); ?>" width="70px;" height="70px"/><?php endif; ?>
		
		</td>
		<td>
			<div style="width:100%; height:80px; overflow:hidden;">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($vo["con"]); ?></div>
		</td>
	</tr>
	<tr height="20px">
		<td colspan="2">
		  <table cellpadding="0" cellspacing="0" border="0">
	       <tr>
		   <?php if(is_array($vo['tags'])): $i = 0; $__LIST__ = $vo['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><td style="padding-left:10px; padding-top:10px;">
		      <div class="tag">
		          &nbsp;&nbsp;&nbsp;
		          <a class="atag" style=" text-decoration:none; cursor:pointer;" onClick=""><?php echo ($tag); ?></a>
		          &nbsp;&nbsp;&nbsp;
		     </div> 
		    </td><?php endforeach; endif; else: echo "" ;endif; ?>
	     </tr>
        </table>
		</td>
	</tr>
  </table>
  <hr style="border-style:dotted; border-color:#CBCBCB"><?php endforeach; endif; else: echo "" ;endif; ?>
   
</div>
<div><center><?php echo ($page); ?></center></div>
<input type="hidden" id="rot" value="__ROOT__/" />
</body>
</html>