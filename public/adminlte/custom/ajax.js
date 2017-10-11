$(document).ready(function(){

	console.log('Ajax script loaded');
	///// Get config question form
	$('.form-add-question').on('change', '.get-question-form-config', function(e){
		var type = $(this).val(), _this = $(this);
		$(this).parents('.panel-body').find('#get-config-form').empty();
		if(type != ''){
			$(this).parents('.panel-body').find('#get-config-form').button('loading');
			$.ajax({
				url:'/ajax/getquestionformconfig',
				method:'POST',
				data: {type: type},
				//dataType:'json',
				cache:false,
				success:function(data){
					console.log(data);
					_this.parents('.panel-body').find('#get-config-form').empty().append(data);
				}
			});
		}
	})

	////////// Delete question in lession
	$('.form-add-question').on('click', '.panel .delete-question', function(){
		var qid = $(this).attr('qid'),
		lessionId = $(this).attr('lession_id'),
		_this = $(this);
		if( confirm('Bạn có chắc chắn muốn xóa?') ){
			$.ajax({
				url:'/ajax/delete/question',
				method:'DELETE',
				data: {qid: qid, lession_id: lessionId},
				cache:false,
				success:function(data){
					console.log(data);
					if(data){
						_this.parents('.panel-collapse').collapse('hide');
						window.setTimeout(function(){
							_this.parents('.panel.panel-default').remove();
						},300)
					}
				}
			});
		}
	})

	/////////////// Delete image in question type form


	////////////// Remove image ///////////////
	$('#question-type-config-form .js-form-item-file').on('click', 'button.deleteImage', function(){
		$(this).attr('disabled', 'disabled').addClass('loading');
		var target = $(this).attr('data-target'),
		type = $(this).parents('#question-type-config-form').find('input[name="question_type"]').val(),
		_this = $(this);

		$.ajax({
			url: '/ajax/question-type/removefileconfig',
			method: 'POST',
			data: {path: target, type: type},
			cache: false,
			success: function(data){
				console.log(data);
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

});