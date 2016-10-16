<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<link rel="stylesheet" href="/March/Tpl/Index/guide/huang/index.css">
	<script type="text/javascript" src="/March/Tpl/Index/guide/huang/jquery-1.12.3.min.js"></script>
</head>
<body>
	<div class="home">
		<a href="/index.php/Index/home"><img src="/March/Tpl/Index/guide/huang/image/sdsdsd.png" alt=""  class="come" id="come"></a>
		<img src="/March/Tpl/Index/guide/huang/image/1.png" alt=""  class="runing" id="run">
		<img src="/March/Tpl/Index/guide/huang/image/q.png" alt="" class="title">
		<img src="/March/Tpl/Index/guide/huang/image/3.png" alt="" class="guave" id="guave">
	</div>
</body>

<script type="text/javascript">

	try{
    if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
    	$("body").html('<div class="home"><img src="/March/Tpl/Index/guide/huang/image/1366.jpg" alt="" class="background"><a href="/index.php/Index/home"><img src="/March/Tpl/Index/guide/huang/image/sdsdsd.png" alt="" class="enterphone" ></a></div>');
    }else{
    	guave = document.getElementById("guave");
		run = document.getElementById("run");
		come = document.getElementById("come");
		setTimeout(function () {
	    	guave.setAttribute("class","guave_act");
	    	run.setAttribute("class","run_act");
	    	come.setAttribute("class","come_act");
		}, 1);

    }
}catch(e){
	console.log(e);
}
</script>

</html>