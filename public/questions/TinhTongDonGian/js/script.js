$(document).ready(function($) {

	$('#TinhTongDonGian .question-wrapper form.answer-question-form').on('change', 'input[type="number"]', function(e){
		var num = '' ;
		$(this).parents('form').find('input[type="number"]').each(function(index, el) {
			num += ($(this).val());
		});
		$(this).parents('form').find('input[type="hidden"][name="answer"]').val(num).change();	
	})
});
