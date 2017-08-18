
$(document).ready(function(){

    $(".back_down").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
            });
        } // End if
    });

    var maxHeight = -1;

    $('.bg_blue').each(function() {
        maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
    });

    $('.bg_blue').each(function() {
        $(this).height(maxHeight);
    });


    $("#lof_go_top, .toptop,.lendau").click(function(){
        $("html,body").animate({scrollTop:0}, '300');
    });
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll>300){
            $("#lof_go_top").fadeIn();
        }else{
            $("#lof_go_top").fadeOut();
        }
    });

    $( ".button_register_blog, .ready" ).one( "click", function() {
        if($(".modal-content .form_resgiter").length == 0){
            $(".form_resgiter").clone().appendTo(".modal-content");
        }

    });

    $('.bs-example-modal-sm').on('shown.bs.modal', function(){
        BaseFormValidation.init();
        $('.modal-content').off();
        $('.select2').remove();
        jQuery(function () {
            App.initHelpers('select2');
        });
        //console.log(12355);
    });


    function throttle(f, delay){
        var timer = null;
        return function(){
            var context = this, args = arguments;
            clearTimeout(timer);
            timer = window.setTimeout(function(){
                    f.apply(context, args);
                },
                delay || 2000);
        };
    }

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $('.chon-dap-an .radio').click(function() {
        $(this).siblings().removeClass("checkClicked");
        $(this).addClass("checkClicked");
    });


    $('.closeModel').click(function(){
        setTimeout(function(){
            $('#myModal').modal('hide');
        }, 2000);
    });



    $('.multiple').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        autoplaySpeed: 4500,
        speed: 500,
        prevArrow: '<button type="button" data-role="none" class="slick-prev slick-prev3" aria-label="Previous" tabindex="0" role="button">Previous</button>',
        nextArrow: '<button type="button" data-role="none" class="slick-next slick-next3" aria-label="Next" tabindex="0" role="button">Next</button>',
        responsive: [
            {
                breakpoint: 1199,
                settings: {
                    slidesToShow: 2,
                    dots: true,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    dots: true,
                    slidesToScroll: 1
                }
            },

            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                    dots: true,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    dots: true,
                    slidesToScroll: 1
                }
            }
        ]

    });
    $('.slick-prev3').click(function(e){
        e.preventDefault();
        $('.single_slider_next').click();
    });
    $('.slick-next3').click(function(e){
        e.preventDefault();
        $('.single_slider_prev').click();
    });


    $('.chuong .title-sub i').click(function () {
        if(($(this).parent().next()).is(':hidden')){
            $(this).removeClass('fa-angle-down').addClass('fa-angle-up');
            $(this).parent().addClass('title-sub-open');
        }else {
            $(this).removeClass('fa-angle-up').addClass('fa-angle-down');
            $(this).parent().removeClass('title-sub-open');
        }


            $(this).parent().next().slideToggle();


    });


    $('#myModal-false').on('shown.bs.modal', function () {
        $('.bao-cao').show();
    });

    $('#myModal-false').on('hidden.bs.modal', function (e) {
        $('.bao-cao').hide();
    });


    $('body').on('click','.hdg-btom',(function () {
        if($('#myModal-false').is("visible")){
            $('.ban-phim').removeClass('clicked');
        }else {
            $('.ban-phim').addClass('clicked');
        }
    }));


    var documentHeight = $( document ).outerHeight();
    var Hw = $(window).outerHeight();
    var Hr = $('.rightHeight').outerHeight();
    var Hf = $('.leftHeight').outerHeight();
    var Ww = $(window).outerWidth();
    var Hbr = $('.bracum-set-height').outerHeight();
    var Hscreen = Hw-Hbr;
    var box_s_1_H = $('.box-s-1').outerHeight();

    // if(991 <= Ww){

    if( $('.fullScreen2').outerHeight() != null){
        if($('.fullScreen2').outerHeight() > Hscreen){
            var zoom2 = Hw / $('.fullScreen2').outerHeight();
            $('.full_page').css({'zoom':zoom2});
        }else {
            $('.fullScreen2').outerHeight(Hscreen);
            $('.full_page').css({'zoom':1});
        }
    }



    if(Hf <= Hscreen){
        $('.fullScreen').outerHeight(Hscreen);
        if(Hr <= Hscreen){

            $('.rightHeight').css({'overflow-y':'auto'});
        }else {
            $('.rightHeight').css({'overflow-y':'scroll'});

        }
    }
    else {
        var zoom = Hw / ( Hf + Hbr );
        $('body').css({'zoom':zoom});
        $('.fullScreen').outerHeight(Hf);

        console.log(zoom);
        console.log(Hscreen / zoom);
        if(Hr <= Hf){

            $('.rightHeight').css({'overflow-y':'auto'});
        }else {

            $('.rightHeight').css({'overflow-y':'scroll'});
        }
    }

    $(window).bind('mousewheel DOMMouseScroll', function(event)
    {
        if(event.ctrlKey == true)
        {
            event.preventDefault();
        }
    });
    // $('.box-s-2').outerHeight(Hf  - box_s_1_H);
    $(window).resize(function(){

        var documentHeight = $( document ).outerHeight();
        var Hw = $(window).outerHeight();
        var Hr = $('.rightHeight').outerHeight();
        var Hf = $('.leftHeight').outerHeight();
        var Ww = $(window).outerWidth();
        var Hbr = $('.bracum-set-height').outerHeight();
        var Hscreen = Hw-Hbr;
        var mainHeight = $('main').outerHeight();
        // $('.box-s-2').outerHeight(Hf - box_s_1_H);



        if(Hf <= Hscreen){
            $('body').css({'zoom':1});
            $('.fullScreen').outerHeight(Hscreen);
            if(Hr <= Hscreen){

                $('.rightHeight').css({'overflow-y':'auto'});
            }else {
                $('.rightHeight').css({'overflow-y':'scroll'});

            }
        }
        else {
            var zoom = Hw / ( Hf + Hbr );

            $('body').css({'zoom':zoom});
            $('.fullScreen').outerHeight(Hf);

            console.log(zoom);
            console.log(Hscreen / zoom);
            if(Hr <= Hf){

                $('.rightHeight').css({'overflow-y':'auto'});
            }else {

                $('.rightHeight').css({'overflow-y':'scroll'});
            }
        }
        if( $('.fullScreen2').outerHeight() != null){
            if($('.fullScreen2').outerHeight() > Hscreen){
                var zoom2 = Hw / $('.fullScreen2').outerHeight();
                $('.full_page').css({'zoom':zoom2});
            }else {
                $('.fullScreen2').outerHeight(Hscreen);
                $('.full_page').css({'zoom':1});
            }
        }



    });


    // }

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    $('body').on("click",".item-number" ,(function () {
       var currentValue = $(this).attr('data-number');

       var nextValue = $('.get-value').val();

        $('.get-value').val(nextValue+""+currentValue);
        console.log(nextValue);
    }));
    $('body').on("click",".delete" ,(function () {

        $('.get-value').val(
            function(index, value){
                return value.substr(0, value.length - 1);
            });
    }));

    $('.ban-phim .text-show').click(function () {
        $('.ban-phim').toggleClass('clicked');
        if($('.ban-phim').hasClass('clicked')){
            $(this).html("Hiển thị bàn phím <i class='fa fa-angle-double-up'></i>")
        }else {
            $(this).html("Thu nhỏ <i class='fa fa-angle-double-down'></i>")
        }
    });


    $('.hd-gui-bai-bt').click(function () {
       $('body').toggleClass('open-hd-giai');
    });
    $('.over').click(function () {
        $('body').removeClass('open-hd-giai');
    });

    if(Hw < 767){
        // $('.title-head').prependTo('.huong-dan-giai');
    }


});





