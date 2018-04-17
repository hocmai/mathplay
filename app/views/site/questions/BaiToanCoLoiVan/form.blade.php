<?php $uique = str_random(10); ?>
<div class="form-group">
	{{ Form::label('', 'Hình thức câu hỏi') }}
	{{ Form::select('question_config[type]['.$id.']', ['input' => 'Nhập đáp án', 'choose' => 'Trắc nghiệm', 'multi' => 'Chọn nhiều đáp án'], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control choose-type-answer-nhap-dap-an']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Nhập câu trả lời cho câu hỏi') }}
	{{ Form::text('question_config[answer]['.$id.']', isset($config['answer']) ? $config['answer'] : '', ['class' => 'form-control', 'required' => true ]) }}
	<span><i>Nhập bất kỳ số, ký tự, hoặc biểu thức,... cho đáp án của câu hỏi. không chứa "dấu cách", sử dụng dấu phấy để ngăn cách nhiều đáp án.</i></span>
</div>
<div class="form-group multi-key-value-array {{ ( (!empty($config['type']) && $config['type'] == 'input') | empty($config['type']) ) ? 'hide' : '' }}">
	{{ Form::label('', 'Nhập các câu trả lời (Chỉ dành cho trắc nghiệm)') }}
	<div class="answer-arr-section">
		<div class="wrapper-content">
			@if( isset($config['answer_key']) )
				@foreach($config['answer_key'] as $key => $value )
					<?php $uique = str_random(10); ?>
					<div class="row row-item">
						<div class="col-xs-4 col-sm-2">
							{{ Form::label('', 'Giá trị') }}
							{{ Form::text('question_config[answer_key]['.$id.'][]', $value, ['class' => 'form-control']) }}
							<button type="button" class="btn btn btn-error remove-new-answer-arr" style="width: 100%; margin: 8px 0;"><i class="glyphicon glyphicon-remove"></i> Xóa</button>
						</div>
						<div class="col-xs-8 col-sm-10 textarea-editor">
							{{ Form::label('', 'Nội dung') }}
							{{ Form::textarea('question_config[answer_value]['.$id.'][]', isset($config['answer_value'][$key]) ? $config['answer_value'][$key] : '', ['class' => 'form-control editor', 'id' => 'editor-'.$uique, 'rows' => 5]) }}
							<script type="text/javascript">
								CKEDITOR.replace( 'editor-{{ $uique }}' );
								CKEDITOR.add
							</script>
						</div>
						<div class="clear clearfix"></div>
						<hr/>
					</div> {{-- End row --}}
				@endforeach
			@else
				<div class="row row-item">
					<div class="col-xs-4 col-sm-2">
						{{ Form::label('', 'Giá trị') }}
						{{ Form::text('question_config[answer_key]['.$id.'][]', '', ['class' => 'form-control']) }}
						<button type="button" class="btn btn btn-error remove-new-answer-arr" style="width: 100%; margin: 8px 0;"><i class="glyphicon glyphicon-remove"></i> Xóa</button>
					</div>
					<div class="col-xs-8 col-sm-10 textarea-editor">
						{{ Form::label('', 'Nội dung') }}
						{{ Form::textarea('question_config[answer_value]['.$id.'][]', '', ['class' => 'form-control editor', 'id' => 'editor-'.$uique, 'rows' => 5]) }}
						<script type="text/javascript">
							CKEDITOR.replace( 'editor-{{ $uique }}' );
							CKEDITOR.add
						</script>
					</div>
					<div class="clear clearfix"></div>
					<hr/>
				</div> {{-- End row --}}
			@endif
		</div> {{-- End wrapper --}}
		<button type="button" style="margin-top: -135px;" class="btn btn btn-info add-new-answer-arr"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
	</div>
</div>
<?php $uique = str_random(10); ?>
<div class="form-group">
	{{ Form::label('', 'Nhập hướng dẫn giải') }}
	{{ Form::textarea('question_config[question_guide]['.$id.']', isset($config['question_guide']) ? $config['question_guide'] : '', ['class' => 'form-control', 'required' => true, 'id' => 'editor-'.$uique ]) }}
	<script type="text/javascript">
		CKEDITOR.replace( 'editor-{{ $uique }}' );
		CKEDITOR.add
	</script>
</div>