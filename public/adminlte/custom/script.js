
$(window).on('load', function(e) {
	console.log('loaded');
});


$(document).ready(function(){
	$('.form-add-question button.add-new-question').on('click', function(){
		if( $(this).parents('.form-add-question').find('#accordion >.panel:last') )
		console.log('test');
	})
});