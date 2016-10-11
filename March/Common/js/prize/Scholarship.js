$(function(){
	/*var width=new Array(1,1,1,1,1,1);
	function spread(div ,distance,i,sameDiv,arrowLeftDiv,arrowRightDiv,seFoDiv){
		$(div).click(function(){
			//是不是第一个,不是的话{左边箭头显示}，是的话让左边箭头消失
			if(i>0){
				$(arrowLeftDiv).fadeIn(500);
				// 如果是不是最后一个
				if(i!=5)
					$(arrowRightDiv).fadeIn(500);
				else
					$(arrowRightDiv).fadeOut(500);
			}else
				$(arrowLeftDiv).fadeOut(500);
			if (width[i]){
				$(sameDiv).stop().animate({"width":"260px"},400);//所有缩小
				$(this).stop().animate({"width":"500px"},400);//让点击的那一个宽度改变
				//循环找出不是点击的那几个，让它们为1，清除上一个为false的让他变为true
				for (var k = 0; k < width.length; k++){
					if(k!=i){
						width[k]=1;
					}
				}
				width[i]=0;
			}else{
				width[i]=1;
				$(this).stop().animate({"width":"260px"},400);
			}
			//控制div的左边距，整体的左右移动
			$(seFoDiv).animate({"margin-left":distance},400);
		});
	}	
	spread(".sameDiv1","0",0,".sameDiv",".arrowLeftDiv",".arrowRightDiv",".seFoDiv");
	spread(".sameDiv2","-140",1,".sameDiv",".arrowLeftDiv",".arrowRightDiv",".seFoDiv");
	spread(".sameDiv3","-450",2,".sameDiv",".arrowLeftDiv",".arrowRightDiv",".seFoDiv");
	spread(".sameDiv4","-750",3,".sameDiv",".arrowLeftDiv",".arrowRightDiv",".seFoDiv");
	spread(".sameDiv5","-1090",4,".sameDiv",".arrowLeftDiv",".arrowRightDiv",".seFoDiv");
	spread(".sameDiv6","-1385",5,".sameDiv",".arrowLeftDiv",".arrowRightDiv",".seFoDiv");

	spread(".sameDiv1s","0",0,".sameDivs",".arrowLeftDivs",".arrowRightDivs",".seFoDivs");
	spread(".sameDiv2s","-140",1,".sameDivs",".arrowLeftDivs",".arrowRightDivs",".seFoDivs");
	spread(".sameDiv3s","-450",2,".sameDivs",".arrowLeftDivs",".arrowRightDivs",".seFoDivs");
	spread(".sameDiv4s","-750",3,".sameDivs",".arrowLeftDivs",".arrowRightDivs",".seFoDivs");
	spread(".sameDiv5s","-1090",4,".sameDivs",".arrowLeftDivs",".arrowRightDivs",".seFoDivs");
	spread(".sameDiv6s","-1385",5,".sameDivs",".arrowLeftDivs",".arrowRightDivs",".seFoDivs");*/
	
	//右箭头
	$("#arrowRightDiv").click(function(){
		/*$("#arrowLeftDiv").fadeIn(500);
		var juli = $(".sameDiv1").offset().left;
		if(juli<-500){
			$("#arrowRightDiv").fadeOut(500);
		}*/
		$(".seFoDiv").stop().animate({"margin-left":"-=234"},400);

		// arrowLeft();
	});
	//左箭头
	$("#arrowLeftDiv").click(function(){
		$(".seFoDiv").stop().animate({"margin-left":"+=234"},400);
		
	});
});