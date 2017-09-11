$(document).ready(function($) {
	
	//////////// Submit answer form
	$('.question-wrapper').on('submit', 'form.answer-question-form', function(e){
		var num1 = $(this).find('[name="answer_1"]').val(),
		num2 = $(this).find('[name="answer_2"]').val();
		if( num1 == '' ) num1 = 0;
		if( num2 == '' ) num2 = 0;
		num1 = parseInt(num1);
		num2 = parseInt(num2);

		$(this).find('[name="answer"]').val( num1*10 + num2);
	})

})