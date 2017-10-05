$(document).ready(function(){

	$('#SapXepDaySo .content.sort-number').sortable({
		// placeholder: "highlight"
	});

	//////////// Submit answer form
    $('#SapXepDaySo .question-wrapper').on('submit', 'form.answer-question-form', function(e){
        var num = '';
        $(this).find('.content .item.sort').each(function() {
            num += $(this).text();
        });
        $(this).find('[name="answer"]').val(num);
    })

})