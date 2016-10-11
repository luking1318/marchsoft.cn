<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加新闻</title>
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Admin/Common/css/news/addnews.css" />
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Common/css/bootstrap.css" />

<!-- 编辑框链接文件-->
<link rel="stylesheet" href="__ROOT__/Common/js/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="__ROOT__/Common/js/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="__ROOT__/Common/js/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="__ROOT__/Common/js/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="__ROOT__/Common/js/kindeditor/plugins/code/prettify.js"></script>
<!--编辑器结束-->
<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/DatePicker/WdatePicker.js"></script>

</head>

<script language="javascript">
		
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : '__ROOT__/Common/js/kindeditor/plugins/code/prettify.css',
				uploadJson : '__ROOT__/Common/js/kindeditor/php/upload_json.php',
				fileManagerJson : '__ROOT__/Common/js/kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		
	function check()
	{
		var title= document.getElementById("newstitle");
		var newstime=document.getElementById("newstime");
		var connull=document.getElementById("connull");
		if(title.value == null ||title.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		if(newstime.value == null ||newstime.value == "" )
		{
			connull.style.visibility="visible";
			return false;
		}
		return true;
		
			
	}
	</script>

<body>
     <div id="con"> 
		 <h3 align="center">添加信息</h3>
		 <form name="form1" action="__URL__/submit?type=<?php echo ($addtype); ?>" method="post" onSubmit="return check()" enctype="multipart/form-data">
			 
			 <p>
				标&nbsp;&nbsp;题:<input id="newstitle" name="title" type="text" style="width:300px;" maxlength="50"/>
			 </p>
			 
			 <p>
				 发布者:<input name="person"  type="text" style="width:50px;" value="管理者"  readonly="true"/>&nbsp;&nbsp;&nbsp;&nbsp;
	
				<?php if($addtype == 0): ?>类型:<select name="type"><option value="1">小组新闻</option><option value="2">通知公告</option><option value="3">大事记</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
				<?php if($addtype == 1): ?>类型:<select name="type"><option value="1">小组新闻</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
				<?php if($addtype == 2): ?>类型:<select name="type"><option value="2">通知公告</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
				<?php if($addtype == 3): ?>类型:<select name="type"><option value="3">大事记</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>				
				 
				 发布时间:<input id="newstime" readonly="true" name="posttime" type="text" style="width:100px;" onClick="WdatePicker()"/>
			 </p>
			 
			 <textarea id='content_1' name="content" style="width:790px;height:400px;">
				
			 </textarea>
			 
			 <input class="btn btn-primary" stype="" type="submit" value="提交" style=" margin-left:50px; margin-top:5px; width:50px; ">
			 <input class="btn btn-primary" stype="" value="返回" style=" margin-left:50px; margin-top:5px;  width:40px;">
			 <span id="connull" style="color:red; margin-left:20px; visibility:hidden; ">请仔细检查填写的内容！内容不能为空！</span>
		 </form>
		 	  
    </div>
</body>
</html>