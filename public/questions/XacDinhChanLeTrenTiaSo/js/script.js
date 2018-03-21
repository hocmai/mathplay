$(document).ready(function($) {
	
	$('#XacDinhChanLeTrenTiaSo .question-wrapper form.answer-question-form').on('change', 'input[type="checkbox"]', function(e){
		var num = '';
		$(this).parents('.form-group.number-line').find('input[type="checkbox"]:checked').each(function(index, el) {
			num += $(this).val();
		});
		$(this).parents('form').find('[name="answer"]').val(num).change();
	})
})
