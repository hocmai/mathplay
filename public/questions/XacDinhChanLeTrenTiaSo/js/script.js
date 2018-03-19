$(document).ready(function($) {
	
	// //////////// Submit answer form
	// $('#DienSoConThieu100 .question-wrapper form.answer-question-form').on('change', 'table input[type="text"]', function(e){
	// 	var num = [];
	// 	console.log('test');
	// 	$(this).parents('table').find('input[type="text"]').each(function(index, el) {
	// 		num.push($(this).val());
	// 	});
	// 	$(this).parents('form').find('[name="answer"]').val(JSON.stringify(num).replace(/"/g, ''));
	// })
	// confirm('aaaaaa');
	$('# .question-wrapper form.answer-question-form').on('change', 'table input[type="text"]', function(e){
		var num = [];
		console.log('test');
		$(this).parents('table').find('input[type="text"]').each(function(index, el) {
			num.push($(this).val());
		});
		$(this).parents('form').find('[name="answer"]').val(JSON.stringify(num).replace(/"/g, ''));
	})
})
