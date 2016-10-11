<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>简介</title>
<script type="text/javascript" charset="utf-8" src="__ROOT__/Common/js/editor/kindeditor.js"></script>
<link rel="stylesheet" type="text/css" charset="utf-8" href="__ROOT__/Common/css/bootstrap.css" />

<style type="text/css">
	  body
	  {
		padding-top:0px;
		padding-left:30px;
		font-size:13px;
	  }
      #con{
		  width:800px;
		  margin:0px auto;
		 
	  }
      #left{

		  float:left;
		  margin-left:10px;
	  }

	  #title{
	      margin-top:8px;
		  margin-bottom:8px;
		  float:left;
		   margin-left:10px;
	  }
	  #tishi{
		 font-size:12px;
		 color:#FF0000;
		 width:120px;
		 float:left;
	  }
</style>
<script type="text/javascript">
	KE.show({
		id : 'content_1',
		items:['source', '|', 'fullscreen', 'undo', 'redo',  'copy', 'paste',
		'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
		'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
		'superscript', '|', 'selectall', '-',
		'title', 'fontname', 'fontsize', '|', 'textcolor', 'bgcolor', 'bold',
		'italic', 'underline', 'strikethrough',  '|', 'image',

		'advtable', '|', 'about']

	});


   </script>

</head>

<body>
      <div id="con">
      <h2 align="center"><?php echo ($title); ?></h2>
		  <form name="form1" action="__URL__/submit?type=<?php echo ($type); ?>" method="post" onSubmit="return check()" enctype="multipart/form-data">
			 <textarea id='content_1' name="content" style="width:800px;height:480px;">
			 <?php echo ($content); ?>
			 </textarea>
			<input class="btn btn-primary" stype="align:center;" type="submit" value="提交">
		  </form>
		  
	 </div>
</body>
</html>