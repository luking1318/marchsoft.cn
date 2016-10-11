$(document).ready(function(){
	$("#firstlevel").addClass("select");
	$(".selectlevel").click(function(){
		$(".selectlevel").removeClass("select");
		$(this).removeClass("noselect");
		$(this).addClass("select");
		
	});
});