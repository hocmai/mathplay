$(document).ready(function($) {
	
	//////////// Submit answer form
	$('#DienSoHangChucVaDonVi .question-wrapper').on('submit', 'form.answer-question-form', function(e){
		if( !$(this).parents('#DienSoHangChucVaDonVi').hasClass('active') ) return;
		var num1 = $(this).find('[name="answer_1"]').val(),
		num2 = $(this).find('[name="answer_2"]').val(),
		num3 = $(this).find('[name="answer_3"]').val(),
		num4 = $(this).find('[name="answer_4"]').val();
		if( num1 == '' ) num1 = 0;
		if( num2 == '' ) num2 = 0;
		if( num3 == '' ) num3 = 0;
		if( num4 == '' ) num4 = 0;
		num1 = parseInt(num1);
		num2 = parseInt(num2);
		num3 = parseInt(num3);
		num4 = parseInt(num4);

		$(this).find('[name="answer"]').val( num1*1000 + num2*100 + num3*10 + num4);
	})

})