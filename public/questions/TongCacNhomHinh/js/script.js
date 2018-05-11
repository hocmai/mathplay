$(document).ready(function(){
	$(document).on('change', '#TongCacNhomHinh input[name="answer_1"], #TongCacNhomHinh input[name="answer_2"]', function(event) {
		var val = '';
		$(this).parents('.question-content').find('input[type="text"]').each(function(){
			val += $(this).val();
		})
		$(this).parents('form').find('input[name="answer"]').val(val).change();
	});
})