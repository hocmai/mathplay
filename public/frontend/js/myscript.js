$(document).ready(function(){
	$('.hocmai-oauth-login').on('click', function(event){
		hocmaiOAuth.login(this, function(response){
			console.log(response);
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

		function loginWindow_loadStartHandler(event) {
	        //
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
    function oauthCallback(url) {
        
    	if (loginCallback) loginCallback(parseQueryString(url));
        loginProcessed = true;
        // if (url.indexOf("access_token=") > 0) {
        //     queryString = url.substr(url.indexOf('#') + 1);
        //     obj = parseQueryString(queryString);
        //     tokenStore.fbAccessToken = obj['access_token'];
        //     if (loginCallback) loginCallback({status: 'connected', authResponse: {accessToken: obj['access_token']}});
        // } else if (url.indexOf("error=") > 0) {
        //     queryString = url.substring(url.indexOf('?') + 1, url.indexOf('#'));
        //     obj = parseQueryString(queryString);
        //     if (loginCallback) loginCallback({status: 'not_authorized', error: obj.error});
        // } else {
        //     if (loginCallback) loginCallback({status: 'not_authorized'});
        // }
    }

    function parseQueryString(queryString) {
        var qs = decodeURIComponent(queryString),
            obj = {},
            params = qs.split('&');
        params.forEach(function (param) {
            var splitter = param.split('=');
            obj[splitter[0]] = splitter[1];
        });
        return obj;
    }

	// The public API
    return {
        // init: init,
        login: login,
        // logout: logout,
        // revokePermissions: revokePermissions,
        // api: api,
        oauthCallback: oauthCallback,
        // getLoginStatus: getLoginStatus
    }

}());