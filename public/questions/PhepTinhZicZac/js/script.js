$(document).ready(function(){
	$('#PhepTinhZicZac .wrap-zz input[name="answer_"]').on('change', function(){
		var input_text = '';
		$('#PhepTinhZicZac .wrap-zz input[name="answer_"]').each(function(){
			input_text += $(this).val();
		})
		$(this).parents('form').find('input[name="answer"]').val(input_text).change();
	})
})