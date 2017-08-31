$(window).on('load', function(e) {
	
});


$(document).ready(function(){
	console.log('Myscript loaded');

	$('.form-add-question').on('click', 'button.add-new-question', function(){
		var form = $(this).parents('.box.box-primary').find('.question-template-form'),
	 		parent = $(this).parents('form').find('.panel-group'),
	 		length = parseInt(parent.find('>.panel').length),
	 		clone = form.clone();

		clone.find('[id="collapse-0"]').attr('id', 'collapse-'+(length+1));
		clone.find('.panel-heading').attr('id', 'heading-'+(length+1));
		clone.find('[aria-expanded]').attr('aria-expanded', 'true');
		clone.find('[href="#collapse-0"]').attr('href', '#collapse-'+(length+1));
		clone.find('[aria-controls="collapse-0"]').attr('aria-controls', 'collapse-'+(length+1));
		clone.find('[aria-labelledby="heading-0"]').attr('aria-labelledby', 'heading-'+(length+1));
		clone.find('>.panel').attr('id', length+1);

		parent.find('.panel-collapse.in').collapse('hide');
		parent.append(clone.html());
		parent.find('#collapse-'+(length+1)+' select.get-question-form-config').selectpicker('refresh');
	})
});