$(document).ready(function(){

    ///////// Play question sound
    $('.play-question-sound>button.control').on('click', function(){
        if($(this).hasClass('play')){
            $(this).parent().find('>video')[0].play();
        } else{
            $(this).parent().find('>video')[0].pause();
            $(this).parent().find('>video')[0].load();
        }
        $(this).toggleClass('play');
    })
    $('.play-question-sound>video').on('ended', function(){
        $(this).parent().find('button.control').addClass('play');
    })

    ////////////////////// An modal thong bao khi chua nhap dap an //////////////
    $('.box-thong-tin-bai-lam .over').on('click', function(){
        $('body').removeClass('open-hd-giai');
    });

    ///////////////////////// Multi select question log /////////////////
    $('.question-log-filter .dropdown-menu').off().on('click', 'a', function(){
        var key = $(this).attr('data-key'),
        id = $(this).attr('data-id');
        $(this).parents('form#filter-question-log-form').find('input[type="submit"]').attr('disabled', true);

        if(!$(this).hasClass('has-child')){
            if( key == 'lession_id' ){
                $('.question-log-filter .dropdown-menu li a.active').removeClass('active');
                $(this).addClass('active');
                $(this).parents('form#filter-question-log-form').find('input[name="lession"]').val(id).change();
                $(this).parents('form#filter-question-log-form').find('input[type="submit"]').removeAttr('disabled');
            }
            return false;
        }
        $('.question-log-filter .menu-content.active').removeClass('active');
        $('.question-log-filter .menu-content[parent-name="'+key+'"][parent-id="'+id+'"]').addClass('active');
        return false;
    })
    $('.question-log-filter .menu-content').off().on('click', '.menu-header', function(){
        var key = $(this).parent().attr('parent-name'),
        id = $(this).parent().attr('parent-id');
        if( key == '' | id == '' ){
            return false;
        }
        $(this).parent().removeClass('active');
        $('.question-log-filter li a[data-key="'+key+'"][data-id="'+id+'"]').parents('.menu-content').addClass('active');
        return false;
    })

    ///////////////////// Login hoc OAuth //////////////////////////
	$('.hocmai-oauth-login').on('click', function(event){
		hocmaiOAuth.login(this, function(response){
            var response = JSON.parse(response);
            $('body>.loading').remove();
            if( typeof response.success != 'undefined'  ){
                $('body').append('<div class="loading"><span>Đang đăng nhập bằng tài khoản HocMai...</span></div>');
                $.ajax({
                    url: '/ajax/oauthcallback',
                    method: 'POST',
                    data: response,
                    success: function(data){
                        console.log(data);
                        var timeOut = 800;
                        if( typeof data.status != 'undefined' && data.status == 'error' ){
                            timeOut = 5000;
                        }
                        $('body>.loading').html('<span>'+data.message+'</span>');
                        window.setTimeout(function(){
                            if( typeof data.status != 'undefined' && data.status == 'success' ){
                                window.location.href = '';
                            } else{
                                $('body>.loading').hide('normal');
                            }
                        }, timeOut)
                    },
                    error: function(error) {
                        console.log(error.responseText);
                        $('body>.loading').html('<span>Xảy ra lỗi trong quá trình đăng nhập. Vui lòng thử lại</span>');
                        window.setTimeout(function(){
                            $('body>.loading').hide('normal');
                        }, 800)
                    },
                });
            }
		});
		return false;
	})

    /////////////////////// hien thi ban phim ao //////////////////////
    // window.setTimeout(function(){
        if( $('.question-rendered.active input[type="text"]').length ){
            $('.question-rendered.active input[type="text"]:first').focus();
            $('.question-rendered.active input[type="text"]:first').addClass('virtual-focus');
            keyboardToggle('show');
        }
        else if( $('.question-rendered.active input[type="number"]').length ){
            $('.question-rendered.active input[type="number"]:first').focus();
            $('.question-rendered.active input[type="number"]:first').addClass('virtual-focus');
            keyboardToggle('show');
        }
    // },300)

    $(window).on('click', function(e){
        if( $('.ban-phim').length == 0 ) return;

        if( $(e.target).get(0).tagName != 'INPUT' 
            && $.inArray($(e.target).attr('type'), ['text','number']) < 0 
            && $(e.target).parents('.ban-phim').length == 0
            && !$('.ban-phim').hasClass('clicked') )
        {
            $('input.virtual-focus').removeClass('virtual-focus');
            keyboardToggle('hide');
        }
    })

    $(document).on('focus', '.question-rendered input[type="text"], .question-rendered input[type="number"]', function(){
        $('input.virtual-focus').removeClass('virtual-focus');
        $(this).addClass('virtual-focus');
        keyboardToggle('show');
    })

    $('.ban-phim .text-show').click(function () {
        keyboardToggle();
    });

    /////// nhap input qua ban phim ao ///////////
    $('.ban-phim').on('click', '.item-number', function(){
        if( $('input.virtual-focus').is(":visible") ){
            var origin = $('input.virtual-focus').val(),
            value = $(this).text();
            $('input.virtual-focus').val(origin + value).change();
            $('input.virtual-focus').val(origin + value).focus();
        }
    })
    $('.ban-phim').on('click', '.delete', function(){
        if( $('input.virtual-focus').is(":visible") ){
            var origin = $('input.virtual-focus').val();
            $('input.virtual-focus').val(origin.substring(0, origin.length - 1)).change();
            $('input.virtual-focus').val(origin.substring(0, origin.length - 1)).focus();
        }
    })

});

keyboardToggle = function(action = ''){
    var $ = jQuery;
    if( action == '' | action == 'toggle' ){
        $('.ban-phim').toggleClass('clicked');
    }
    else if( action == 'show' ){
        $('.ban-phim').removeClass('clicked');
    } 
    else{
        $('.ban-phim').addClass('clicked');
    }

    if($('.ban-phim').hasClass('clicked')){
        $('.ban-phim .text-show').html("Hiển thị bàn phím <i class='fa fa-angle-double-up'></i>")
    }else {
        $('.ban-phim .text-show').html("Thu nhỏ <i class='fa fa-angle-double-down'></i>")
    }
}


var hocmaiOAuth = (function () {

	var loginCallback,
	loginProcessed;

	function login(link, callback){
		var loginWindow,
		w_width = $(window).width(),
		w_height = $(window).height(),
		width = 450,
		height = 480,
		top = w_height/2 - (height/2),
		left = w_width/2 - (width/2),
		href = jQuery(link).attr('href');

		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|WindowPhone|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			width = w_width;
			height = w_height;
			top = 0;
			left = 0;
		}

        loginCallback = callback;
        loginProcessed = false;

		loginWindow = window.open(href, '_blank', 'location=no,clearcache=yes,width='+width+',height='+height+',top='+top+',left='+left);
		return false;
	}


    /**
     * Called either by oauthcallback.html (when the app is running the browser) or by the loginWindow loadstart event
     * handler defined in the login() function (when the app is running in the Cordova/PhoneGap container).
     * @param url - The oautchRedictURL called by Facebook with the access_token in the querystring at the ned of the
     * OAuth workflow.
     */
    function oauthCallback(messages) {
    	if (loginCallback) loginCallback(messages);
    }

	// The public API
    return {
        login: login,
        oauthCallback: oauthCallback,
    }

}());
