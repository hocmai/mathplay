
$(window).on('load', function(e) {
	console.log('loaded');
});


$(document).ready(function(){
	$('.form-add-question button.add-new-question').on('click', function(){
		var parent = $(this).parents('.form-add-question').find('#accordion >.panel:last');

		//parent.collapse('hide');

		var num_id = parseInt(parent.attr('id')),
		clone = parent.clone();

		clone.attr('id', num_id+1);
		clone.find('[id="collapse-'+num_id+'"]').attr('id', 'collapse-'+(num_id+1));
		clone.find('.panel-heading').attr('id', 'heading-'+(num_id+1));
		clone.find('[aria-expanded]').attr('aria-expanded', 'true');
		clone.find('[href="#collapse-'+num_id+'"]').attr('href', '#collapse-'+(num_id+1));
		clone.find('[aria-controls="collapse-'+num_id+'"]').attr('aria-controls', 'collapse-'+(num_id+1));
		clone.find('[aria-labelledby="heading-'+num_id+'"]').attr('aria-labelledby', 'heading-'+(num_id+1));

		parent.parent().append(clone);
		clone.find('>.panel').collapse('show');

	})
});