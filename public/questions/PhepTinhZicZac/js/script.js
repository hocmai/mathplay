$(document).ready(function(){
	$('#PhepTinhZicZac .question-wrapper .wrap-zz input[name="answer_"]').on('change', function(){
		var input_text = [];
		$(this).parents('.wrap-zz').find('input[name="answer_"]').each(function(){
			input_text.push( $(this).val() );
		})
		$(this).parents('form').find('input[name="answer"]').val(input_text.join(',')).change();
	})
})