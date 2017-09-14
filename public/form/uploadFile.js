(function($){

	console.log('uploadFile ajax Loaded');

	$('.js-form-item-file').on('change', 'input#inputUploadFile[type="file"]', function(e){
		$(this).attr('disabled', 'disabled');

		var _this = $(this),
		files = e.target.files,
		path = $(this).attr('data-target'),
		imageType = /image.*/;

		for ( var i = 0; i < files.length; i++ ) {
			if ( !files[i].type.match(imageType) ){ continue;}
			var formData = new FormData();
            formData.append("file", files[i]),
            token = Date.now();

            if( typeof path != 'undefined' ){
            	formData.append("path", path);
            }

        	(function(token) {
	            $.ajax({
	    			url: '/ajax/uploadfile',
	    			method: 'POST',
	    			data: formData,
	    			cache: false,
	        		contentType: false,
	        		processData: false,
	        		success: function(data){
	        			_this.removeAttr('disabled');
	        			if(data){
        					var item = _this.parents('.js-form-item-file').find('.panel .preview .item#'+ token);
	        				window.setTimeout(function(){
        						item.find('.progress').fadeOut();
	        				},800)
        					item.append('\
        						<div class ="col-xs-2 col-sm-2" style="padding:0">\
				        			<img src="'+ data.url +'" width="80"/>\
								</div>\
								<div class="col-xs-8 col-sm-9 input">\
									<input type="text" placeholder="Title" name="' + _this.attr('name') + '[image_title][]" class="form-control" size="100"/>\
									<input type="hidden" name="' + _this.attr('name') + '[image_url][]" value="'+ data.url +'"/>\
									<a class="link-preview" type="image/jpeg" target="_blank" href="'+ data.url +'">'+ data.name +'</a>\
								</div>\
								<div class="col-xs-2 col-sm-1" style="padding:0"><button type="button" class="btn btn-danger deleteImage" data-target="'+ data.url +'">Xóa</button></div>\
							');
	        			}
	        		},
	        		error: function(error){
	        			console.log($.parseJSON(error.responseText).error.message);
	        			_this.removeAttr('disabled');
	        		},
			        xhr: function() {
		                var myXhr = $.ajaxSettings.xhr();
		                if(myXhr.upload){
		                    myXhr.upload.addEventListener('progress', function(bar){
	                    		if(bar.lengthComputable){
							        var max = bar.total;
							        var current = bar.loaded;
							        var Percentage = Math.floor((current * 100)/max);

							        // console.log(current,max,Percentage);
							        _this.parents('.js-form-item-file').find('.panel .preview .item#'+ token +' .progress-bar').css('width', Percentage+'%').text(Percentage+'%');

							        if(Percentage >= 100){
							           _this.parents('.js-form-item-file').find('.panel .preview .item#'+ token +' .progress-bar').text('Hoàn thành');
							        }
							    }  
		                    }, false);
		                }
		                return myXhr;
			        },
	    		});
    		}(token));
    		////////////////// End ajax ////////////////

			_this.parents('.js-form-item-file').find('.panel .preview').append('<div class="clearfix clear item" role="alert" id="'+ token +'" style="margin-bottom:10px;padding-bottom:10px;border-bottom:1px solid #ddd">\
					<div class="progress"><div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">0%</div></div>\
	    		</div>');
	    }
	    /////////////////// End for //////////////////
	})


	////////////// Remove image ///////////////
	$('.js-form-item-file').on('click', 'button.deleteImage', function(){
		$(this).attr('disabled', 'disabled').addClass('loading');
		var target = $(this).attr('data-target'),
		_this = $(this);

		$.ajax({
			url: '/ajax/removefile',
			method: 'POST',
			data: {path: target},
			cache: false,
			success: function(data){
				if(data){
					_this.parents('.item').fadeOut('400', function() {
						_this.parents('.item').remove();
					});
				}
				_this.removeAttr('disabled');
			},
			error: function(error){
				console.log(error);
				_this.removeAttr('disabled');
			}
		});
	});

})(jQuery);