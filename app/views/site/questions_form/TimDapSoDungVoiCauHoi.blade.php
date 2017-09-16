<div class="form-group">
	{{ Form::label('', 'Nhập câu trả lời cho câu hỏi') }}
	{{ Form::text('question_config[answer][]', !empty($config['answer']) ? $config['answer'] : '', ['class' => 'form-control']) }}
	<span><i>Nhập bất kỳ số, ký tự, hoặc biểu thức,... cho đáp án của câu hỏi. không chứa "dấu cách".</i></span>
</div>