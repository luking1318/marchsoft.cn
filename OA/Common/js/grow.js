picFive=0;
picFive1=0;
picFive2=0;
Numbers =1;
var waterFall = {
	container: document.getElementById("container"),
	columnNumber: 3,
	columnWidth: 350,//行宽
	rootImage: "/MarchSoftV2.0/March/Common/img/test/",
	indexImage: 0,
	scrollTop: document.documentElement.scrollTop || document.body.scrollTop,
	detectLeft: 0,
	loadFinish: false,
	loadPic:true,
	// 返回固定格式的图片名
	getIndex: function() {
		var index = this.indexImage;
		if (index < 10) {
			index = "00" + index;	
		} else if (index < 100) {
			index = "0" + index;	
		}
		return index;
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
		aEle.innerHTML = '<input class="yinchang" type="hidden" value="'+myDate.toLocaleDateString()+'"><a name="2012"style="border-radius:6px;" class="pic_a" href="###"><img style="width:270px;"src="'+ imgUrl +'" /><strong>'+ myDate.toLocaleDateString() +'</strong></a>';
		column.appendChild(aEle);
		
		if (index >= 40) {//alert("图片加载光光了！");
			this.loadFinish = true;
		}
		return this;
	},
	
	// 是否滚动载入的检测
	appendDetect: function() {
		var start = 0;
		var index = this.getIndex();
		var append=true;
		var longs = 5+$(".divst").length;
		var root = $("#HROOT").val();
		var zhong = $("#hidden3").val();
		var roots = $("#HROOT").val()+"/OA/Common/img/upFile/";
		for (start; start < this.columnNumber; start++) {
			var eleColumn = document.getElementById("waterFallColumn_" + start);
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
							if(data!=""){
								data=data.split("*");
								for (var k=0; k < data.length; k++) {
									var aEle = document.createElement("div");
									aEle.className = "divst";
									aEle.style = "width:333px;margin-right:10px;margin-top:20px";
									aEle.innerHTML = data[k];
									if (index >= 40) {
										Numbers = 0;
									}
									var ele = document.getElementById("waterFallColumn_" + k);
									ele.appendChild(aEle);
								
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
			// 新栏个数		

			// 计算每列的行数
			// 向下取整
			var line = Math.floor(arrHtml.length / this.columnNumber);
			
			// 重新组装HTML
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
						
				}
				if(window.picFive2==22){
					picFive2 = 0;
				}
				self.scrollTop = scrollTop;
				self.appendDetect();
			}
			if((self.scrollTop - scrollTop) > 0){
		      window.picFive1++;
				if(window.picFive1==22){
					self.appendDetect();
					
				window.picFive1=0;
				} 
			}
			if(document.body.scrollTop>200){
            if(self.loadPic){
            	// $("#divleft12").get(0).style.top=0;
            	 self.loadPic=false;
            }
              
			}
			if(document.body.scrollTop<=200){
				$("#divBody").css("margin-left","130px");
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
function tiaozhuan(num){
	if(num<$(".year").length -2){
  	 	$("#divleft12").get(0).style.top = -33*num;
	}
}
$(".lis").mouseover(function(){
	$(this).children().attr("href","#"+$("#main_box span").text()+"-"+$(this).text());
});
$(".lis1").mouseover(function(){
	$(this).children().attr("href","#"+$(this).text()+"-"+$($("#mouth span")).text());
});
$(".san").live('click',function(){
	var ids = $(this).parent().parent().parent().parent().children().eq(0).val();
	var root = $("#HROOT").val();
	if(confirm("确定要删除吗？")){
		$.ajax({
			url:'sanchu',
			type:'post',
			dataType:'text',
			data:({
				ids:ids
			}),
			success:function(data){
				if(data){
					alert("删除成功！");
					window.location=root+"/oa.php/Jotting/index"
				}else{
					alert("删除失败！");
				}
				
			}
		});
	}
});
$(".qingling").live('click',function(){
	$.ajax({
			url:'qingling',
			type:'post',
			dataType:'text',
			data:({
			}),
			success:function(data){
						
		}
	});
});
$(".divsty").live('mouseover',function(){
	$(this).css("background-color","#F7F3F3");
	$(this).css("border","1px solid #5D94CA");
});
$(".divsty").live('mouseout',function(){
	$(this).css("background-color","#ffffff");
	$(this).css("border","1px solid #CCCCCC");
});
/*上面为图片加载部分*/
$(document).ready(function(){
	$(".son_ul").hide();  ////初始ul隐藏 
    $("#mouth ul" ).hide();
    $("#divTop12").hide();
	$(".select_box span").hover(function(){
		$(this).addClass("change");
	});
	 
	/*$(".select_box span").click(function(){
		$(this).parent().find(".son_ul").slideDown();
        
	});*/
   //每次单机年份时
	$(".select_box span").toggle(function(){
		$(this).parent().find("ul").show();
		//导航位于li上时 鼠标样式的改变
		$(this).parent().find("li").hover(function(){
			$(this).addClass("change");

		},function(){
			$(this).removeClass("change");
		});
       $(this).parent().find("ul").css({height:"70"+"px","overflow-y":"scroll" });
       $(this).parent().find('li').click(function(){
          $(this).parent().hide();
        $(this).parent().parent().find("span").text($(this).text());

       });
		
	},function(){
		$(this).parent().find(".son_ul").hide();
	});

	//单机月份变化
	////改变鼠标样式
	$("#mouth span").hover(function(){
		$(this).addClass("change");
	});
	//单机两次时不同变化
	$("#mouth span").toggle(function(){
		
		$("#mouth ul").css("display","none");
		$("#mouth ul").show();
         //改变鼠标样式
		$("#mouth ul").hover(function(){
			$(this).addClass("change");
		});
		$("#mouth ul").css({height:"70"+"px","overflow-y":"scroll" });
	},function(){
		$("#mouth ul" ).hide();
	});

	$("#mouth ul li").click(function(){
		$("#mouth span").text($(this).text());
		$(this).parent().hide();
	});
	$(".son_ul li").mouseover(function(){
        $(this).css("background-color","#aaaaaa");
	});
	$(".son_ul li").mouseout(function(){
        $(this).css("background-color","#FAFAFB");
	});

    //单机页面，两个模拟select 全部隐藏
	$(document).click(function(){
		$("ul ul").hide();
	});

});



