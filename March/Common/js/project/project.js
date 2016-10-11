
                $(document).ready(function () {
                    $('.pro').hover(function () {
                        $(".cover", this).stop().animate({ top: '-212px' }, { queue: false, duration: 0 });
                        $(".proInfo", this).css("color", "#666666");
                        $(".lk", this).css("color", "#0088cc");
                        $(".proUser", this).css("color", "red");
                    }, function () {
                        $(".cover", this).stop().animate({ top: '0px' }, { queue: false, duration: 0 });
                        $(".proInfo", this).css("color", "#888888");
                        $(".lk", this).css("color", "#888888");
                        $(".proUser", this).css("color", "#888888");
                    });
                });
