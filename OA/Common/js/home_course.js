$("document").ready(function(){
    $("input[role='textbox']").attr("maxlength","3");
    var w =0;
    var num=0;
    var longs = 0;
    $("#bottom_s6").click(function(){
        if(w ==0){
            ajaxDataone();
            w=1;
        }else if(w==1){
            $("#shu_ju").remove();
            w=0;
        }
    });

    $(".se").live('click',function(){
        ajaxData();
        $(".se").remove();
    });

    $(".text-icon").live('click',function(){
        $(this).parent().parent().remove();
        ajaxData();
        rgb();
    });

    $("input[role='textbox']").blur(function(){
        for(var i=0;i<$("li").length-1;i++){
            if($("li").eq(i).children().eq(0).html()==$(this).val()){
                 //num = 1;
            }
        }
        if(num==0){
            $("input[role='textbox']").removeAttr("id");
        }else{
            $("input[role='textbox']").attr("id","rgbs");
        }
        num =0;
        $(".se").remove();
        ajaxData();
    });

    $("input[role='textbox']").focus(function(){
        $(".namm").remove();
    });

    $("input[role='textbox']").keyup(function(){
        keyup();
    });

    $(".se").live('mouseover',function(){
        $("input[role='textbox']").val($(this).html());
        $(this).css("background-color","#EBEBEB");
        $(this).css("box-shadow","0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(82, 168, 236, 0.6)");
        $(this).siblings().css("box-shadow","");

    });
    $(".se").live('mouseout',function(){
        $(this).css("background-color","#ffffff");
    });

    $(".names").live('mouseover',function(){
       $(this).css("background-color","#EBEBEB");
       $(this).css("box-shadow","0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(82, 168, 236, 0.6)");
         
    });

    $(".names").live('mouseout',function(){
        $(this).css("background-color","#ffffff");
        $(this).css("box-shadow","");
    });

    $(".names").live('click',function(){
        if(checklong()<580){
            w=0;
            $(".namm").remove();
            for(var i=0;i<$("li").length-1;i++){
                if($("li").eq(i).children().eq(0).html()==$(this).html()){
                     num = 1;
                }
            }
            if(num==0){
                $("#shu_ju").remove();
                $("input[role='textbox']").removeAttr("id");
                $(".tagit-new").before('<li class="tagit-choice ui-widget-content ui-state-default ui-corner-all na"><span class="tagit-label">'+$(this).html()+'</span><a class="tagit-close"><span class="text-icon">×</span><span class="ui-icon ui-icon-close"></span></a> <input type="hidden" name="item[tags][]" value="'+$(this).html()+'" style="display:none;"></li>');
            }else{
                $("input[role='textbox']").attr("id","rgbs");
            }
            num =0;
            ajaxData();
        }else{
            $("input[role='textbox']").attr("id","rgbs");
        }
    });
}); 

function keyup(){
    var longs = checklong();
    $(".se").remove();
    var str = $("input[role='textbox']").val();
    $.ajax({
        url:$("#app").val()+"/Course/searchone",
        type:"POST",
        dataType:'TEXT',
        data:{
            str:str,
            longs:longs,
        },
        success:function(data){
            $("input[role='textbox']").after(data);
        }
    });
}

function ajaxData(){
    var num = $("input[name='item[tags][]']").length;
    var str="",k=1;
    for(var i=0;i<num;i++){
        if(k<num){
            str+= $("input[name='item[tags][]']").eq(i).val()+",";
        }else{
            str+= $("input[name='item[tags][]']").eq(i).val();
        }
        k++;
    }
    $.ajax({
        url:$("#app").val()+"/Course/search",
        type:"POST",
        dataType:'TEXT',
        data:{
            str:str,
        },
        success:function(data){
            $("#bottom_s3").html(data);
        }
    });
}

function ajaxDataone(){
    $.ajax({
        url:$("#app").val()+"/Course/searchtwo",
        type:"POST",
        dataType:'TEXT',
        data:{},
        success:function(data){
            $("#bottom_s1").after(data);
        }
    });
}

function checklong(){
    var longs = 0;
    for(var i=0;i<$("#myULTags").children()-1;i++){
        if($("#myULTags").children().length-1<4 || $("#myULTags").children().length-1>6){
            longs += $("#myULTags").children().eq(i).outerWidth()+4;
        }else{
            longs += $("#myULTags").children().eq(i).outerWidth()+5;
        }
    }
    //alert($("#bottom_s5").innerWidth());
    return longs;
}

function rgb(){
    if(checklong()<600){
        $("input[role='textbox']").removeAttr("id");
    }else{
       // $("input[role='textbox']").attr("id","rgbs");
    }
}