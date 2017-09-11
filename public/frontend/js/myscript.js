$(document).ready(function(){
	$('.hocmai-oauth-login').on('click', function(event){
		hocmaiOAuth.login(this, function(response){
            $('body>.loading').remove();
            var response = JSON.parse(response);
            if( typeof response.success != 'undefined'  ){
                $('body').append('<div class="loading"><span>Đang đăng nhập bằng tài khoản HocMai...</span></div>');
                $.ajax({
                    url: '/ajax/oauthcallback',
                    method: 'POST',
                    data: response,
                    success: function(data){
                        $('body>.loading').html('<span>'+data.message+'</span>');
                        window.setTimeout(function(){
                            if( typeof data.status != 'undefined' && data.status == 'success' ){
                                window.location.href = '';
                            } else{
                                $('body>.loading').hide('normal');
                            }
                        }, 800)
                    },
                    error: function(error) {
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


});

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