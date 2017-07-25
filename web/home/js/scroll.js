$(window).scroll(function() {
    var boxElemets = $(".section");
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();
    $.each(boxElemets,
    function() {
        var otop = $(this).offset().top + 300;
        var is_init = $(this).attr('init') if (otop < docViewBottom) {
            $(this).attr('init', 'true');
            var sid = $(this).attr("id");
            var $obj2 = $('.section2');
            var $obj3 = $('.section3');
            var $obj4 = $('.section4');
            var $obj5 = $('.section5');
            var $obj6 = $('.section6');
            var time = 1200;
            var delay = 0;
            if (sid == "section3") {
                $obj3.find('.succeed_title').css({
                    position: "relative"
                }).delay(delay).animate({
                    top: '0'
                },
                1500, 'easeOutExpo');
                $obj3.find('.success_text').css({
                    position: "relative"
                }).delay(delay).animate({
                    left: '0'
                },
                1500, 'easeOutExpo');
                $obj3.find('.portfolio-grid').css({
                    position: "relative"
                }).delay(delay).animate({
                    bottom: '0'
                },
                1500, 'easeOutExpo');
            } else if (sid == "section4") {
                $obj4.find('.home_solutions_title').css({
                    position: "relative"
                }).delay(delay).animate({
                    left: '0'
                },
                1500, 'easeOutExpo');
                $obj4.find('.home_solutions_text').css({
                    position: "relative"
                }).delay(delay).animate({
                    right: '0'
                },
                1500, 'easeOutExpo');
                $obj4.find('.home_solutions_list').css({
                    position: "relative"
                }).delay(delay).animate({
                    top: '0'
                },
                1500, 'easeOutExpo');
            } else if (sid == "section5") {
                $obj5.find('.home_news_title').css({
                    position: "relative"
                }).delay(delay).animate({
                    bottom: '0'
                },
                1500, 'easeOutExpo');
                $obj5.find('.home_news_text').css({
                    position: "relative"
                }).delay(delay).animate({
                    right: '0'
                },
                1500, 'easeOutExpo');
                $obj5.find('.home_news_list').css({
                    position: "relative"
                }).delay(delay).animate({
                    left: '0'
                },
                1500, 'easeOutExpo');
            } else if (sid == "section6") {
                $obj6.find('.home_partner_title').delay(delay).animate({
                    opacity: 1
                });
                $obj6.find('.home_partner_text').delay(delay).animate({
                    opacity: 1
                });
                $obj6.find('.home_partner_list').delay(delay).animate({
                    opacity: 1
                });
            }
        }
    });
    var docViewTop = $(window).scrollTop();
    var cur_index = 0;
    if (docViewTop >= 3936) {
        cur_index = 5;
    } else if (docViewTop >= 3196) {
        cur_index = 4;
    } else if (docViewTop >= 2489) {
        cur_index = 3;
    } else if (docViewTop >= 1382) {
        cur_index = 2;
    } else if (docViewTop >= 660) {
        cur_index = 1;
    }
    $("#fp-nav li a").eq(cur_index).addClass("active");
    $("#fp-nav li").eq(cur_index).siblings().find("a").removeClass("active");
});

function scroll_to(i_tab) {
    $("#fp-nav li a").eq(i_tab).addClass("active");
    $("#fp-nav li").eq(i_tab).siblings().find("a").removeClass("active");
    var top = $(".section").eq(i_tab).offset().top;
    $('html,body').animate({
        scrollTop: top
    },
    500);
    var $obj2 = $('.section2');
    var $obj3 = $('.section3');
    var $obj4 = $('.section4');
    var $obj5 = $('.section5');
    var $obj6 = $('.section6');
    var time = 1200;
    var delay = 0;
    if (i_tab == 2) {
        $obj3.find('.succeed_title').css({
            position: "relative"
        }).delay(delay).animate({
            top: '0'
        },
        1500, 'easeOutExpo');
        $obj3.find('.success_text').css({
            position: "relative"
        }).delay(delay).animate({
            left: '0'
        },
        1500, 'easeOutExpo');
        $obj3.find('.portfolio-grid').css({
            position: "relative"
        }).delay(delay).animate({
            bottom: '0'
        },
        1500, 'easeOutExpo')
    }
    if (i_tab == 3) {
        $obj4.find('.home_solutions_title').css({
            position: "relative"
        }).delay(delay).animate({
            left: '0'
        },
        1500, 'easeOutExpo');
        $obj4.find('.home_solutions_text').css({
            position: "relative"
        }).delay(delay).animate({
            right: '0'
        },
        1500, 'easeOutExpo');
        $obj4.find('.home_solutions_list').css({
            position: "relative"
        }).delay(delay).animate({
            top: '0'
        },
        1500, 'easeOutExpo')
    }
    if (i_tab == 4) {
        $obj5.find('.home_news_title').css({
            position: "relative"
        }).delay(delay).animate({
            bottom: '0'
        },
        1500, 'easeOutExpo');
        $obj5.find('.home_news_text').css({
            position: "relative"
        }).delay(delay).animate({
            right: '0'
        },
        1500, 'easeOutExpo');
        $obj5.find('.home_news_list').css({
            position: "relative"
        }).delay(delay).animate({
            left: '0'
        },
        1500, 'easeOutExpo')
    }
    if (i_tab == 5) {
        $obj6.find('.home_partner_title').delay(delay).animate({
            opacity: 1
        });
        $obj6.find('.home_partner_text').delay(delay).animate({
            opacity: 1
        });
        $obj6.find('.home_partner_list').delay(delay).animate({
            opacity: 1
        })
    }
}