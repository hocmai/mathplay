<div class="form-group">
	{{ Form::label('', 'Hình thức câu hỏi') }}
	{{ Form::select('question_config[type][]', ['input' => 'Nhập đáp án', 'choose' => 'Trắc nghiệm'], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Nhập các câu trả lời (Chỉ dành cho trắc nghiệm)') }}
	{{ Form::text('question_config[answer_arr][]', !empty($config['answer_arr']) ? $config['answer_arr'] : '', ['class' => 'form-control', 'required' => true]) }}
	<span><i>Nhập bất kỳ số, ký tự, hoặc biểu thức,... cho đáp án của câu hỏi. Mỗi đáp án ngăn cách bằng dấu chấm phẩy ";".</i></span>
</div>
<div class="form-group">
	{{ Form::label('', 'Nhập câu trả lời cho câu hỏi') }}
	{{ Form::text('question_config[answer][]', !empty($config['answer']) ? $config['answer'] : '', ['class' => 'form-control', 'required' => true ]) }}
	<span><i>Nhập bất kỳ số, ký tự, hoặc biểu thức,... cho đáp án của câu hỏi. không chứa "dấu cách".</i></span>
</div>