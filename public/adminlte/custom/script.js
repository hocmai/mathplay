$(window).on('load', function(e) {
	
});

// $('textarea.editor').ckeditor({
//     entities_latin: false,
//     entities_greek: false,
//     filebrowserBrowseUrl : '{{ url("/admins/ckeditor/ckfinder/ckfinder.html") }}',
//     filebrowserImageBrowseUrl : '{{ url("/admins/ckeditor/ckfinder/ckfinder.html?type=Images") }}',
//     filebrowserFlashBrowseUrl : '{{ url("/admins/ckeditor/ckfinder/ckfinder.html?type=Flash") }}',
//     filebrowserUploadUrl : '{{ url("/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files") }}',
//     filebrowserImageUploadUrl : '{{ url("/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images") }}',
//     filebrowserFlashUploadUrl : '{{ url("/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash") }}'
// });
// CKEDITOR.replace( 'editor',
// {
//     entities_latin: false,
//     entities_greek: false,
//     filebrowserBrowseUrl : '{{ url("/admins/ckeditor/ckfinder/ckfinder.html") }}',
//     filebrowserImageBrowseUrl : '{{ url("/admins/ckeditor/ckfinder/ckfinder.html?type=Images") }}',
//     filebrowserFlashBrowseUrl : '{{ url("/admins/ckeditor/ckfinder/ckfinder.html?type=Flash") }}',
//     filebrowserUploadUrl : '{{ url("/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files") }}',
//     filebrowserImageUploadUrl : '{{ url("/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images") }}',
//     filebrowserFlashUploadUrl : '{{ url("/admins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash") }}'
//     }
// );

$(document).ready(function(){
	console.log('Myscript loaded');

	//////////// Add question sound in form
	$('.form-add-question').on('change', '#get-auto-sound >input[type="checkbox"]', function(){
		if($(this).is(':checked')){
			$(this).parents('form').find('#upload-sound').hide();
		} else{
			$(this).parents('form').find('#upload-sound').show();
		}
	})

	//////////// Delete multi row
	$('table').on('change', 'input#check-all', function(){
		if($(this).is(':checked')){
			$('input#check-option').prop('checked', 'checked');
		} else{
			$('input#check-option').prop('checked', false);
		}
		change_val_operation();
	})

	$('table input#check-option').on('change', function(){
		if(!$(this).is(':checked')){
			$('input#check-all').prop('checked', false);
		}
		change_val_operation();
	})

	function change_val_operation(){
		var data = [];
		$('table input#check-option').each( function(){
			if($(this).is(':checked')){
				data.push($(this).val());
			}
		});
		$('#bulk-operation-form input[name="data"]').val(JSON.stringify(data)).change();
	}
	///////////////////////////////////////////////////

	//////////////////////// Change question config in form
	$('.form-add-question').on('change', '.panel select, .panel input:not(.question-config-hidden)', function(){
		var _data = $(this).parents('#get-config-form').find('select, textarea, input:not(.question-config-hidden)').serializeArray(),
		_out = {};
		$.each(_data, function(index, el) {
			el.name = el.name.replace('question_config[', '').replace('][]', '');
			_out[el.name] = el.value;
		});
		$(this).parents('#get-config-form').find('input.question-config-hidden').val(JSON.stringify(_out)).change();
	})

	/////// Upload image preview
	function readURL(input) {
    	$(input).parent().find('>.preview').remove();
    	if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$(input).parent().append('<div class="preview"><img src="'+e.target.result+'" width="100"/></div>');
	        }
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	///// Add multi questions
	$('.form-add-question').on('click', 'button.add-new-question', function(){
		console.log('test');
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
		clone.find('script').

		parent.find('.panel-collapse.in').collapse('hide');
		parent.append(clone.html());
		parent.find('#collapse-'+(length+1)+' select.get-question-form-config').selectpicker('refresh');
	});

	/////// Delete a question
	$('.form-add-question').on('click', '.panel-title>.close', function(){
		var _this = $(this);
		$(this).parent().find('>a.collapsed').collapse('hide');
		window.setTimeout(function(){
			_this.parents('.panel.panel-default').remove();
		}, 300)
	})

});