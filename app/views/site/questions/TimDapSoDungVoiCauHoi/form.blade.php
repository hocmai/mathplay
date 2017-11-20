<?php $uique = str_random(10);
// dd($config, $id);
?>
<div class="form-group">
	{{ Form::label('', 'Hình thức câu hỏi') }}
	{{ Form::select('question_config[type]['.$id.']', ['input' => 'Nhập đáp án', 'choose' => 'Trắc nghiệm'], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Nhập câu trả lời cho câu hỏi') }}
	{{ Form::text('question_config[answer]['.$id.']', isset($config['answer']) ? $config['answer'] : '', ['class' => 'form-control', 'required' => true ]) }}
	<span><i>Nhập bất kỳ số, ký tự, hoặc biểu thức,... cho đáp án của câu hỏi. không chứa "dấu cách".</i></span>
</div>
<div class="form-group">
	{{ Form::label('', 'Nhập các câu trả lời (Chỉ dành cho trắc nghiệm)') }}
	<div class="answer-arr-section">
		<div class="wrapper-content">
			<div class="row row-item">
				<div class="col-xs-4 col-sm-2">
					{{ Form::label('', 'Giá trị') }}
					{{ Form::text('question_config[answer_key_1]['.$id.']', isset($config['answer_key_1']) ? $config['answer_key_1'] : '', ['class' => 'form-control']) }}
					<button type="button" class="btn btn btn-error remove-new-answer-arr" style="width: 100%; margin: 8px 0;"><i class="glyphicon glyphicon-remove"></i> Xóa</button>
				</div>
				<div class="col-xs-8 col-sm-10 textarea-editor">
					{{ Form::label('', 'Nội dung') }}
					{{ Form::textarea('question_config[answer_value_1]['.$id.']', isset($config['answer_value_1']) ? $config['answer_value_1'] : '', ['class' => 'form-control editor', 'id' => 'editor-'.$uique, 'rows' => 5]) }}
					<script type="text/javascript">
						CKEDITOR.replace( 'editor-{{ $uique }}' );
						CKEDITOR.add
					</script>
				</div>
				<div class="clear clearfix"></div>
				<hr/>
			</div> {{-- End row --}}
		</div> {{-- End wrapper --}}
		<button type="button" style="margin-top: -135px;" class="btn btn btn-info add-new-answer-arr"><i class="glyphicon glyphicon-plus"></i> Thêm</button>
	</div>
</div>