picFive=0;
picFive1=0;
picFive2=0;
Numbers =1;
var waterFall = {
	container: document.getElementById("container"),
	columnNumber: 3,
	columnWidth: 300,
	rootImage: "/MarchSoftV2.0/March/Common/img/test/",
	indexImage: 1,
	
	scrollTop: document.documentElement.scrollTop || document.body.scrollTop,
	detectLeft: 0,
	loadFinish: false,
	loadPic:true,

	// 返回固定格式的图片名
	getIndex: function() {
		 this.indexImage = 0;
		//return index;
	},
		// 滚动载入
	append: function(column,num) {
		var myDate = new Date();
		this.indexImage += 1;
		var html = '';
		var index = this.getIndex();
		var imgUrl = this.rootImage + "P_" + index + ".jpg";
		
		// 图片尺寸
		var aEle = document.createElement("div");
		aEle.style = "width:281px;margin-right:10px;margin-top:20px";
		aEle.innerHTML = '<input class="yinchang" type="hidden" value="'+myDate.toLocaleDateString()+'"><a name="2012" class="pic_a" href="###"><img style="width:270px;"src="'+ imgUrl +'" /><strong>'+ myDate.toLocaleDateString() +'</strong></a>';
		column.appendChild(aEle);
		
		if (index >= 40) {//alert("图片加载光光了！");
			this.loadFinish = true;
		}
		return this;
	},
	
	// 是否滚动载入的检测
	appendDetect: function() {
		var start = 0;
		var append=true;
		var longs = $(".divs").length+$(".divs1").length;
		var root = $("#hidden0").val();
		var zhong = $("#hidden3").val();
		var roots = $("#hidden0").val()+"/OA/Common/img/upFile/";
		//for (start; start < this.columnNumber; start++) {
			var eleColumn = document.getElementById("waterFallColumn_0");
			if (longs < zhong) {
				if (eleColumn.offsetTop + eleColumn.clientHeight < this.scrollTop + (window.innerHeight || document.documentElement.clientHeight)) {
					$.ajax({
						url:'addjotting',
						type:'post',
						dataType:'text',
						data:({
							root:root,
							roots:roots
						}),
						success:function(data){
							if(data !=""){
								data=data.split("*");
								for (var k=0; k < data.length; k++) {
									/*var aEle = document.createElement("div");
									if(k==0){
										aEle.className = "divs";
									}else{
										aEle.className = "divs1";
									}
									aEle.style = "width:281px;margin-right:10px;margin-top:20px";
									aEle.innerHTML = data[k];
									var ele = document.getElementById("waterFallColumn_" + k);
									ele.appendChild(aEle);*/
									$("#waterFallColumn_"+k).append(data[k]);
								}
							}
						}
					});
					if(append){
						window.picFive++;
						if(window.picFive==5){	
							window.picFive=0;
						}
						append=false;
					}
				}
			}			
		return this;
	},
	
	// 页面加载初始化的数据。clientWidth网页可见区域宽
	create: function() {
		var start = 0;
		var htmlColumn = '';
		var myDate = new Date();
		var self = this;
	   this.detectLeft = document.getElementById("waterFallDetect").offsetLeft;
		return this;
	},

	refresh: function() {
		var arrHtml = [], arrTemp = [], htmlAll = '', start = 0, maxLength = 0;
		for (start; start < this.columnNumber; start+=1) {
			var arrColumn = document.getElementById("waterFallColumn_" + start).innerHTML.match(/<a(?:.|\n|\r|\s)*?a>/gi);
			if (arrColumn) {
				maxLength = Math.max(maxLength, arrColumn.length);
				// arrTemp是一个二维数组
				arrTemp.push(arrColumn);
			}
		}
		
		// 需要重新排序
		var lengthStart, arrStart;
		for (lengthStart = 0; lengthStart<maxLength; lengthStart++) {
			for (arrStart = 0; arrStart<this.columnNumber; arrStart++) {
				if (arrTemp[arrStart][lengthStart]) {
					arrHtml.push(arrTemp[arrStart][lengthStart]);	
				}
			}	
		}
		
		
		if (arrHtml && arrHtml.length !== 0) {
			alert(2535);
			var line = Math.floor(arrHtml.length / this.columnNumber);
			var newStart = 0, htmlColumn = '', self = this;
			for (newStart; newStart < this.columnNumber; newStart+=1) {
				htmlColumn = htmlColumn + '<span id="waterFallColumn_'+ newStart +'" class="column" style="width:'+ this.columnWidth +'px;">'+ 
					function() {
						var html = '', i = 0;
						for (i=0; i<line; i+=1){
							html += arrHtml[newStart + self.columnNumber * i];
						}// 是否补足余数
						html = html + (arrHtml[newStart + self.columnNumber * line] || '');
						return html;	
					}() +
				'</span> ';	
			}
			htmlColumn += '<span id="waterFallDetect" class="column" style="width:'+ this.columnWidth +'px;"></span>';
			this.container.innerHTML = htmlColumn;
			this.detectLeft = document.getElementById("waterFallDetect").offsetLeft;
			// 检测
			this.appendDetect();
		}
		return this;
	},
	
	// 滚动加载
	scroll: function() {
		var self = this;
		window.onscroll = function() {
			// 为提高性能，滚动前后距离大于100像素再处理
			var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
			if ((scrollTop - self.scrollTop) > 0) {
				window.picFive2++;
				for(var j =0;j<$(".divs").length;j++){
					if(document.body.scrollTop-$(".divs")[j].offsetTop>0){
						$(".divs:eq("+j+")").siblings().removeAttr("id");
						$(".divs:eq("+j+")").attr('id','shus');
						$("#main_box span").text($("#shus").children().eq(0).children().val().substr(0,4)+'年');
						$("#mouth span").text($("#shus").children().eq(0).children().val().substr(5,2)+'月'); 
						var stri = $("#main_box span").text();
						for(var m = 0;m<$(".year").length;m++){
							if($(".year:eq("+m+")").children().text()+"年"==stri){
								$("#divleft12").get(0).style.top = -33*m;
							}
						}
					}		
				}
				if(window.picFive2==22){
					picFive2 = 0;
				}
				self.appendDetect();
				self.scrollTop = scrollTop;
				$("#footTop").get(0).style.top = $("#container").height();
			}
			if((self.scrollTop - scrollTop) > 0){
		      window.picFive1++;
				if(window.picFive1==22){
					self.appendDetect();
					for(var j =0;j<$(".divs").length;j++){
					if(document.body.scrollTop-$(".divs")[j].offsetTop>0){
						$(".divs:eq("+j+")").siblings().removeAttr("id");
						$(".divs:eq("+j+")").attr('id','shus');
						$("#main_box span").text($("#shus").children().eq(0).children().val().substr(0,4)+'年');
						$("#mouth span").text($("#shus").children().eq(0).children().val().substr(5,2)+'月');  
						var stri = $("#main_box span").text();
						for(var m = 0;m<$(".year").length;m++){
							if($(".year:eq("+m+")").children().text()+"年"==stri){
								$("#divleft12").get(0).style.top = -33*m;
							}
							
						}
					}		
				}
				window.picFive1=0;
				} 
			}
			if(document.body.scrollTop>200){
            $("#divbg").get(0).style.position="fixed";
            $("#divbg").get(0).style.top=0;
            $("#divbg").get(0).style.left=212;
            $("#divleft12").get(0).style.position="fixed";
            $("#container").css("margin-top","90px");
            $("#divleft12").get(0).style.left=160;
            $("#divBody").css("margin-left","210px");
            $("#divbg").css("margin-top","0px");
            $("#divleft12").css("margin-top","0px");
            if(self.loadPic){
            	 $("#divleft12").get(0).style.top=0;
            	 self.loadPic=false;
            }
              
			}
			if(document.body.scrollTop<=200){
				$("#container").css("margin-top","0px");
				$("#divleft12").get(0).style.position="static";
				$("#divbg").get(0).style.position="static";
				$("#divBody").css("margin-left","160px");
	            $("#divbg").css("margin-top","40px");
	            $("#divleft12").css("margin-top","37px");
	            $("#main_box span").text($("#hidden1").val()+"年");	
	            $("#mouth span").text($("#hidden2").val()+"月");   
			}
		};
		return this;
	},
	
	// 浏览器窗口大小变换
	resize: function() {
		var self = this;
		window.onresize = function() {
			var eleDetect = document.getElementById("waterFallDetect"), detectLeft = eleDetect && eleDetect.offsetLeft;
			if (detectLeft && Math.abs(detectLeft - self.detectLeft) > 5) {
				//检测标签偏移异常，认为布局要改变
				//self.refresh();
			}
		};
		return this;
	},

	init: function() {
		if (this.container) {
			this.create().scroll().resize();	
		}
	}
};

waterFall.init();

function tiaozhuan(num,str){
	if(num<$(".year").length -1){
  	 	$("#divleft12").get(0).style.top = -33*num;
	}
	$("#main_box span").text(str+'年');
}

$(".lis").mouseover(function(){
	$(this).children().attr("href","#"+$("#main_box span").text()+"-"+$(this).text());
});

$(".lis1").mouseover(function(){
	$(this).children().attr("href","#"+$(this).text()+"-"+$($("#mouth span")).text());
});

/*上面为图片加载部分*/
$(document).ready(function(){
	$(".divs").live('mouseover',function(){
		$(this).children(".pic_a").children("div").children(".divs2").css("color","#0F8ACB");
	});
	$(".divs").live('mouseout',function(){
		$(this).children(".pic_a").children("div").children(".divs2").css("color","#333333");
	});
	$(".divs1").live('mouseover',function(){
		$(this).children(".pic_a").children("div").children(".divs2").css("color","#0F8ACB");
	});
	$(".divs1").live('mouseout',function(){
		$(this).children(".pic_a").children("div").children(".divs2").css("color","#333333");
	});
	$(".son_ul").hide();  ////初始ul隐藏 
    $("#mouth ul" ).hide();
    $("#divTop12").hide();
    $(".change").css("margin-top","20px");
	$(".select_box span").hover(function(){
		$(this).addClass("change");
		 var root = $("#hidden0").val();
	});
	$("#ims,#ims1").hover(function(){
		$(this).addClass("change");
	});
	 

   //每次单机年份时

$(".select_box span,#ims").bind('click',function(e){
	if($(this).parent().find("ul").is(":hidden")){

		$(this).parent().find("ul").show();
		$(this).parent().find("ul").css({height:"130"+"px","overflow-y":"scroll" });
	}else{
		$(this).parent().find(".son_ul").hide();
	}
	//把事件对象传入
    if (e.stopPropagation) //支持W3C标准
        e.stopPropagation();
    else //IE8及以下浏览器
        e.cancelBubble = true;
 });

//导航位于li上时 鼠标样式的改变
	$(".select_box span").parent().find("li").hover(function(){
			$(this).addClass("change");

	},function(){
			$(this).removeClass("change");
	});

	$(".select_box span").parent().find('li').bind('click',function(e){
        $(this).parent().hide();
        $(this).parent().parent().find("span").text($(this).text());
		//把事件对象传入
        if (e.stopPropagation) //支持W3C标准
            e.stopPropagation();
        else //IE8及以下浏览器
            e.cancelBubble = true;
     });

	$("#mouth span").hover(function(){
		$(this).addClass("change");
	});

    $("#mouth span,#ims1").bind('click',function(e){
		if($("#mouth ul").is(":hidden")){
			$("#mouth ul").css("display","none");
			$("#mouth ul").show();
			$("#mouth ul").hover(function(){
				$(this).addClass("change");
			});
			$("#mouth ul").css({left:"-24px",top:"35px",width:"60px",height:"130"+"px","overflow-y":"scroll" });
		}else{
			$("#mouth ul" ).hide();
		}
		 if (e.stopPropagation) //支持W3C标准
	            e.stopPropagation();
	     else //IE8及以下浏览器
	         e.cancelBubble = true;
    });

	$("#mouth ul li").bind("click",function(e){
		$("#mouth span").text($(this).text());
		$(this).parent().hide();
		//把事件对象传入
        if (e.stopPropagation) //支持W3C标准
            e.stopPropagation();
        else //IE8及以下浏览器
            e.cancelBubble = true;
	});

	$(".son_ul li").mouseover(function(){
        $(this).css("background-color","#cccccc");
        var root = $("#hidden0").val();
		$(".select_box").css('background','url("'+root+'/March/Common/img/grow/xuanzhong.png")');

	});

	$(".son_ul li").mouseout(function(){
        $(this).css("background-color","#FAFAFB");
        $(".select_box").css('background','url("")');
	});


	$("#mouth ul li").mouseover(function(){
        $(this).css("background-color","#cccccc");
	});

	$("#mouth ul li").mouseout(function(){
        $(this).css("background-color","#FAFAFB");
	});


	$(".select_box").mouseover(function(){
		 var root = $("#hidden0").val();
		$(".select_box").css('background','url("'+root+'/March/Common/img/grow/xuanzhong.png")');
		$("#ims").attr('src',root+'/March/Common/img/grow/sanjiao2.png');
	});

	$(".select_box").mouseout(function(){
		 var root = $("#hidden0").val();
		  $(".select_box").css('background','url("")');
		  $("#ims").attr('src',root+'/March/Common/img/grow/sanjiao1.png');
	});

	$("#mouth").mouseover(function(){
        var root = $("#hidden0").val();
		$(".mouse_y").css('background','url("'+root+'/March/Common/img/grow/xuanzhong1.png")');
		$("#ims1").attr('src',root+'/March/Common/img/grow/sanjiao2.png');
	});

	$("#mouth").mouseout(function(){
		var root = $("#hidden0").val();
        $(".mouse_y").css('background','url("")');
        $("#ims1").attr('src',root+'/March/Common/img/grow/sanjiao1.png');
	});

    //单机页面，两个模拟select 全部隐藏
	$(document).click(function(){
		$("ul ul").hide();
	});

});



