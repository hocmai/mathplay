$(window).on('load', function(e) {
	
});


$(document).ready(function(){
	console.log('Myscript loaded');

	/////// Upload image preview
	function readURL(input) {
    	$(input).parent().find('>.preview').remove();
    	if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$(input).parent().append('<div class="preview"><img src="'+e.target.result+'" width="100"/></div>');
	        	// console.log(e.target.result);
	        	// $(input).parent().find('.preview').
	            // $('#blah').attr('src', e.target.result);
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$('input[type="file"][preview]').change(function(){
	    readURL(this);
	    console.log('test');
	});

	///// Add multi questions
	$('.form-add-question').on('click', 'button.add-new-question', function(){
		var form = $(this).parents('.box.box-primary').find('.question-template-form'),
	 		parent = $(this).parents('form').find('.panel-group'),
	 		length = parseInt(parent.find('>.panel').length),
	 		clone = form.clone(),
	 		last_id = parseInt(parent.find('>.panel').last().attr('id'));
 		
 		if( last_id > length ) length = last_id;

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

	/////// Delete a question
	$('.form-add-question').on('click', '.panel-title>.close', function(){
		var _this = $(this);
		$(this).parent().find('>a.collapsed').collapse('hide');
		window.setTimeout(function(){
			_this.parents('.panel.panel-default').remove();
		}, 300)
	})

});