$(document).ready(function(){
    /*menu*/
    var $li_cap1 = $('.menu-mobile>ul>li');
    for (var i = 0; i <= $li_cap1.length; i++) {
        $($li_cap1[i]).find('ul').parent().prepend("<i class='fa fa-angle-down'></i>");
        $('i', $($li_cap1[i])).click(function () {

            if ($(this).parent().find('>ul').is(':hidden')) {
                $(this).css({'transform': 'rotate(90deg)', '-webkit-transform': 'rotate(90deg)'});
            } else {
                $(this).css({'transform': 'rotate(0deg)', '-webkit-transform': 'rotate(0deg)'});
            }

            $(this).parent().find('>ul').slideToggle();
        })
    }

    $('.menu-mobile .button').click(function () {
        if($('#full_page').hasClass('push_right')){
            $('.full_page').removeClass('push_right');
            $(this).next().animate();
        }else{

            $('.full_page').addClass('push_right');
            $(this).next().animate();

        }

    });
    $('.menu-mobile .button').one("click",function () {
        $('.full_page').append('<div class="over"></div>');

    });
    $(".full_page").on("click",".over", function(){
        $('.full_page').removeClass('push_right');
        $(this).next().hide(400);
    });




    $('.icon_search').click(function () {
        $(this).next().slideToggle();
    });
    /*e-menu*/
});