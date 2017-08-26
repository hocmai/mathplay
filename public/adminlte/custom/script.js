
$(window).on('load', function(e) {
	console.log('loaded');
});


$(document).ready(function(){
	$('.form-add-question button.add-new-question').on('click', function(){
		var parent = $(this).parents('.form-add-question').find('#accordion >.panel:last'),
		num_id = parseInt(parent.attr('id')),
		clone = parent.clone();

		clone.attr('id', num_id+1);
		clone.find('[id="collapse-'+num_id+'"]').attr('id', 'collapse-'+(num_id+1));
		clone.find('[href="#collapse-'+num_id+'"]').attr('href', '#collapse-'+(num_id+1));
		$('.collapse.in').collapse('hide');
		parent.parent().append(clone);

	})
});