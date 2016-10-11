document.oncontextmenu=new Function("event.returnValue=false;"); 
document.onselectstart=new Function("event.returnValue=false;");

var SizePosition = {
    windowWidth: function () {
        var rootEl = document.compatMode == 'CSS1Compat' ? document.documentElement : document.body;
        var sWidth = Math.max(rootEl.scrollWidth, rootEl.clientWidth);
        return sWidth;
    },
    windowHeight: function () {
        var rootEl = document.compatMode == 'CSS1Compat' ? document.documentElement : document.body;
        var sHeight = Math.max(rootEl.scrollHeight, rootEl.clientHeight);
        return sHeight;
    },
    pageWidth: function () {
        return window.innerWidth != null ? window.innerWidth : document.documentElement && document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body != null ? document.body.clientWidth : null;
    },
    
    pageHeight: function () {
        return window.innerHeight != null ? window.innerHeight : document.documentElement && document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body != null ? document.body.clientHeight : null;
    },
    topPosition: function () {
        return typeof window.pageYOffset != 'undefined' ? window.pageYOffset : document.documentElement && document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop ? document.body.scrollTop : 0;
    },
    leftPosition: function () {
        return typeof window.pageXOffset != 'undefined' ? window.pageXOffset : document.documentElement && document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft ? document.body.scrollLeft : 0;
    }
}

$(function(){
    var wh = SizePosition.pageHeight();
    var mt = (wh - 160) / 2 -40;
    $('.zuo,.you').css({ 'margin-top': mt + 'px' });
    var liht = (wh - 15 - 70 - 160);        //显示控件的高度
    $('.news').css({ 'height': (liht + 15) + 'px' });
    $('.news,.news_rq').css({ 'width': $('.news .inline').size() * 290 + 'px' })

    $('.news .inline').each(function() {
        if ($(this).height() > liht) {
            $(this).css({ 'height': liht + 'px', 'overflow': 'hidden' });
            $(this).children('.news_nr').css({ 'height': (liht - 40) + 'px', 'overflow': 'hidden' });
        }
    });

    $('.news .inline').hover(function() {
        $('.news_rq2').html($(this).attr('time')).stop().animate({ 'margin-left': (($(this).index() * 286) + 120) + 'px' }, 600, function() { })
    }, function() { })
    

    var ww = SizePosition.pageWidth();
    var wsize = parseInt(ww / 290);

    if ($('#news_list').width() > ww) {
        $('.you').show();
        $('.zuo').hide();
    } else {
        $('.you').hide();
        $('.zuo').hide();
    }

    $('.you').click(function() {
        var ml = parseInt($('#news_list').css('margin-left').replace('px', ''));
        if (0 - ml + ww >= $('#news_list').width()) {
            return;
        }
        ml -= wsize * 290;
        if (-ml + ww >= $('#news_list').width()) {
            ml = 0 - ($('#news_list').width() - ww)
        }
    /*----------右边滚到头再加载10条数据------------------*/
        if(-ml + ww >= $("#lecture_count").val() * 290){ 
                $.post(
                    $("#url").val()+"/add_lecture",
                    {
                        lecture_count:$("#lecture_count").val(),
                    },
                    function(res){
                        if(Object.keys(res).length > 1){ //除lecture_count之外，存在数据继续加载
                            $("#lecture_count").val(res.lecture_count);//往隐藏标签中赋值
                            for(i=0; i<Object.keys(res).length-1; i++){
                                $(".news_dian .inline:last").after("<div class='inline'></div>");
                                $(".news .inline:last").after("<div class='inline' id='"+res[i]["idmarch_lecture"]+"'time='"+res[i]["lecture_date"]+"'><div class='news_nr'><img src='"+$("#root").val()+"/OA/Common/img/lecture/m_"+res[i]["lecture_img"]+"' width='250' /><h2>"+res[i]["lecture_theme"]+"</h2><div class='content'>"+res[i]["lecture_content"]+"</div></div></div>")
                            }
                        }
                        
                        $('.news,.news_rq').css({ 'width': $('.news .inline').size() * 290 + 'px' })
                        $('.news .inline').each(function() {
                            if ($(this).height() > liht) {
                                $(this).css({ 'height': liht + 'px', 'overflow': 'hidden' });
                                $(this).children('.news_nr').css({ 'height': (liht - 40) + 'px', 'overflow': 'hidden' });
                            }
                        });
                        $('.news .inline').hover(function() {
                            $('.news_rq2').html($(this).attr('time')).stop().animate({ 'margin-left': (($(this).index() * 286) + 120) + 'px' }, 600, function() { })
                        }, function() { })


                    },'json'
                );
            }
        $('#news_list,.news_rq').stop().animate({ 'margin-left': ml + 'px' }, 300, function() {
            if (-parseInt($('#news_list').css('margin-left').replace('px', '')) + ww >= $('#news_list').width())
                $('.you').hide();
            $('.zuo').show();
        });

        ml = -ml;
        if (ml % 290 > 0) {
            ml = ml + 124 - (ml % 290);
        }
        else
            ml = ml + 124;
        $('.news_rq2').html($('.news .inline:eq(' + (parseInt(ml / 290)) + ')').attr('time'));
        $('.news_rq2').stop().animate({ 'margin-left': ml + 'px' }, 600, function() { })
    })

    $('.zuo').click(function() {
        var ml = parseInt($('#news_list').css('margin-left').replace('px', ''));
        if (ml >= 0) {
            return;
        }
        ml += wsize * 290;
        if (ml >= 0) {
            ml = 0;
        }
        $('#news_list,.news_rq').stop().animate({ 'margin-left': ml + 'px' }, 600, function() {
            if (parseInt($('#news_list').css('margin-left').replace('px', '')) >= 0)
                $('.zuo').hide();
            $('.you').show();
        });

        ml = -ml;
        if (ml % 290 > 0) {
            ml = ml + 124 - (ml % 290);
        }
        else
            ml = ml + 124;
        $('.news_rq2').html($('.news .inline:eq(' + (parseInt(ml / 290)) + ')').attr('time'));
        $('.news_rq2').stop().animate({ 'margin-left': ml + 'px' }, 600, function() { })
    })

    var x = 0;
    var arr = Array();  //该数组用于存储每次显示总记录的条数,如：10,20,30
    $("#news_list").mousewheel(function(objEvent, intDelta) {
        if (intDelta < 0) {     //往右滚动
            var ml = parseInt($('#news_list').css('margin-left').replace('px', ''));
            if (0 - ml + ww >= $('#news_list').width()) {
                return;
            }
            ml -= 290;
            if (-ml + ww >= $('#news_list').width()) {
                ml = 0 - ($('#news_list').width() - ww)
                $("#news_list").stop(true).animate({"margin-left":ml-10+"px"},1,function(){});
            }
/*----------------右边滚到头再加载10条数据-------------------*/
            if(-ml + ww >= $("#lecture_count").val() * 290){
                if(jQuery.inArray($("#lecture_count").val(),arr) == -1){
                    arr[x++] = $("#lecture_count").val();
                }else{
                    return;     //对已经加载过的数据就不再加载
                }
                $.post(
                    $("#url").val()+"/add_lecture",
                    {
                        lecture_count:$("#lecture_count").val(),
                    },
                    function(res){
                        if(Object.keys(res).length > 1){ //除lecture_count之外，存在数据继续加载
                            $("#lecture_count").val(res.lecture_count);//往隐藏标签中赋值
                            for(i=0; i<Object.keys(res).length-1; i++){
                                $(".news_dian .inline:last").after("<div class='inline'></div>");
                                $(".news .inline:last").after("<div class='inline' id='"+res[i]["idmarch_lecture"]+"'time='"+res[i]["lecture_date"]+"'><div class='news_nr'><img src='"+$("#root").val()+"/OA/Common/img/lecture/m_"+res[i]["lecture_img"]+"' width='250' /><h2>"+res[i]["lecture_theme"]+"</h2><div class='content'>"+res[i]["lecture_content"]+"</div></div></div>")
                            }
                        }

                        $('.news,.news_rq').css({ 'width': $('.news .inline').size() * 290 + 'px' })
                        $('.news .inline').each(function() {
                            if ($(this).height() > liht) {
                                $(this).css({ 'height': liht + 'px', 'overflow': 'hidden' });
                                $(this).children('.news_nr').css({ 'height': (liht - 40) + 'px', 'overflow': 'hidden' });
                            }
                        });
                        $('.news .inline').hover(function() {
                            $('.news_rq2').html($(this).attr('time')).stop().animate({ 'margin-left': (($(this).index() * 286) + 120) + 'px' }, 600, function() { })
                        }, function() { })


                    },'json'
                );
            }
            $('#news_list,.news_rq').stop().animate({ 'margin-left': ml + 'px' }, 300, function() {

                if (-parseInt($('#news_list').css('margin-left').replace('px', '')) + ww >= $('#news_list').width())
                    $('.you').hide();
                if (parseInt($('#news_list').css('margin-left').replace('px', '')) < 0)
                    $('.zuo').show();

            });
        }
        else if (intDelta > 0) {
            var ml = parseInt($('#news_list').css('margin-left').replace('px', ''));
            if (ml >= 0) {
                return;
            }
            ml += wsize * 290;
            if (ml >= 0) {
                ml = 0;
            }
            $('#news_detailed .close').click();
            $('#news_list,.news_rq').stop().animate({ 'margin-left': ml + 'px' }, 300, function() {

                if (parseInt($('#news_list').css('margin-left').replace('px', '')) >= 0)
                    $('.zuo').hide();
                if (-parseInt($('#news_list').css('margin-left').replace('px', '')) + ww < $('#news_list').width())
                    $('.you').show();
            });
        }
    });
    //打开一个“公共讲座”视频
    $('.news .inline').live("click",function() {
        $.post(
            $("#url").val()+"/content",
            {
                idmarch_lecture:$(this).attr("id"),
            },
            function(res){
                $("#big embed").attr("src",res.lecture_file);
                $("#big").modal('show');
            },'json'
        );
    });
});