$(document).ready(function(){

	console.log('Ajax script loaded');
	///// Get config question form
	$('form').on('change', '.get-question-form-config', function(e){
		var type = $(this).val(), _this = $(this);
		$(this).parents('form').find('#get-config-form').empty();
		if(type != ''){
			$(this).parents('form').find('#get-config-form').button('loading');
			$.ajax({
				url:'/ajax/getquestionformconfig',
				method:'POST',
				data: {type: type},
				//dataType:'json',
				cache:false,
				success:function(data){
					_this.parents('form').find('#get-config-form').empty().append(data);
				}
			});
		}
	})

	////////// Delete question in lession
	$('.form-add-question').on('click', '.delete-question', function(){
		var qid = $(this).attr('qid'),
		lessionId = $(this).attr('lession_id');
		$.ajax({
			url:'/ajax/delete/question',
			method:'DELETE',
			data: {qid: qid, lessionId: lessionId},
			cache:false,
			success:function(data){
				console.log(data);
			}
		});
	})

});