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

});