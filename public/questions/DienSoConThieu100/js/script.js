$(document).ready(function($) {
	
	//////////// Submit answer form
	$('.question-wrapper').on('submit', 'form.answer-question-form', function(e){
		var num = [];
		$(this).find('table input[type="text"]').each(function(index, el) {
			num.push($(this).val());
		});
		$(this).find('[name="answer"]').val(JSON.stringify(num).replace(/"/g, ''));
	})

})