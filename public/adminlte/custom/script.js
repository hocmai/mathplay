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

	//////////////// Dang toan co loi van - cau trac nghiem
	$('.form-add-question').on('click', '.add-new-answer-arr', function(){
		var parent = $(this).parents('.answer-arr-section').find('.wrapper-content');
		clone = parent.find('>.row').first().clone();
		clone.find('.textarea-editor > div').remove();
		clone.find('script').remove();

		var rand = 'editor-' + $.now() + Math.floor((Math.random() * 10) + 1);
		clone.find('input').attr('value', '');
		clone.find('input').val('').change();
		if( clone.find('textarea.editor').length ){
			clone.find('textarea.editor').each(function(index, el) {
				var rand = 'editor-' + $.now() + Math.floor((Math.random() * 10) + 1);
				$(this).attr('id', rand);
				$(this).empty();
				window.setTimeout(function(){
					CKEDITOR.replace( rand );
					CKEDITOR.add;

					//////////// Change input name for all
					parent.find('>.row').each(function(index, el) {
						var name_input = $('input[type="text"]', this).attr('name'),
						name_match = name_input.match(/\[+[\w]+\]/gi);
						if( name_match.length == 2 ){
							$('input[type="text"]', this).attr('name', name_input.replace(name_match[0], "[answer_key_"+ (index+1) +"]") );
						}

						var name_textarea = $('input[type="text"]', this).attr('name'),
						name_match = name_textarea.match(/\[+[\w]+\]/gi);
						if( name_match.length == 2 ){
							$('textarea', this).attr('name', name_textarea.replace(name_match[0], "[answer_value_"+ (index+1) +"]") );
						}
						// $('input[type="text"]', this).attr('name', 'question_config[answer_key_'+ (index+1) +'][]');
						// $('textarea', this).attr('name', 'question_config[answer_value_'+ (index+1) +'][]');
					});
				},200)
			});
		}
		parent.append(clone);
	})
	/////////////////////// Remove answer arr
	$('.form-add-question').on('click', '.remove-new-answer-arr', function(){
		var parent = $(this).parents('.row-item');
		// console.log(parent);
		if( $(this).parents('.wrapper-content').find('.row').length <= 1 ) return false;
		parent.hide(300, function(){
			$(this).remove();
		})
	})

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
	$('.form-add-question').on('change', '.panel select, .panel textarea, .panel input:not(.question-config-hidden)', function(){
		var _data = $(this).parents('#get-config-form').find('select, textarea, input:not(.question-config-hidden)').serializeArray(),
		_out = {};
		// console.log(CKEDITOR.instances, _data);
		$.each(_data, function(index, el) {
			el.name = el.name.replace('question_config[', '').replace('][]', '');
			_out[el.name] = el.value;
		});
		$(this).parents('#get-config-form').find('input.question-config-hidden').val(JSON.stringify(_out)).change();
	})
	$('form.lession-form-update').on('submit', function(e){
		$('.form-add-question #get-config-form', this).each(function(index, val){
			var _data = $(this).find('select, textarea, input:not(.question-config-hidden)').serializeArray(),
			_out = {};
			console.log(_data);
			$.each(_data, function(index, el) {
				el.name = el.name.replace('question_config[', '').replace('][]', '');
				_out[el.name] = el.value;
			});
			$(this).find('input.question-config-hidden').val(JSON.stringify(_out)).change();
		})
		// e.preventDefault();
	})
	/////////////////////////////////////////////////////////


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
		console.log('add new item');
		var form = $(this).parents('.box.box-primary').find('.question-template-form'),
	 		parent = $(this).parents('form').find('.panel-group'),
	 		length = parseInt(parent.find('>.panel').length),
	 		clone = form.clone();
 		
		////////// add editor to textarea
		clone.find('script').remove();
		if( clone.find('textarea.editor').length ){
			clone.find('textarea.editor').each(function(index, el) {
				var rand = 'editor-' + $.now() + Math.floor((Math.random() * 10) + 1);
				$(this).attr('id', rand);
				window.setTimeout(function(){
					CKEDITOR.replace( rand );
				},500)
			});
		}

		parent.find('.panel-collapse.in').collapse('hide');
		parent.append(clone.html());

 		//////// reset all ID for panel accordion
 		window.setTimeout(function(){
	 		parent.find('>.panel').each(function(index, el) {
	 			$(this).attr('id', (index+1));
	 			$(this).find('.panel-collapse').attr({
	 				'id': 'collapse-'+(index+1),
	 				'aria-labelledby': 'heading-'+(index+1)
	 			});
				$(this).find('.panel-heading').attr('id', 'heading-'+(index+1));
				// $(this).find('[aria-expanded]').attr('aria-expanded', 'true');
				$(this).find('.panel-title a[data-toggle="collapse"]').attr({
					'href': '#collapse-'+(index+1),
					'aria-controls': 'collapse-'+(index+1)
				});
				
				$(this).find('#collapse-'+(index+1)+' select.get-question-form-config').selectpicker('refresh');

				///////////// Change all name of input sync panel id
		 		$(this).find('input, select, textarea').each(function(index2, el){
					var name = $(this).attr('name'),
					panel_id = $(this).parents('.panel').attr('id');
					if( typeof name == 'undefined' ) return;

					var name_match = name.match(/\[+[\w]+\]/gi);
					if( name_match.length == 2 ){
						$(this).attr('name', name.replace(name_match[1], "["+ (index+1) +"]") );
					}
				})
	 		});
 		},500);

		// var text = 'question_config[question_start][0]'.match(/\[+[\w]+\]/gi);
		// console.log(text);
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