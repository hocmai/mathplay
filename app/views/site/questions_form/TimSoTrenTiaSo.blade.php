Tiêu đề và nội dung câu hỏi sẽ được tạo tự động

<div class="form-group">
	{{ Form::label('', 'Hình thức') }}
	{{ Form::select('question_config[answer_type][]', ['' => 'Mặc định'] + TimSoTrenTiaSo::getAnswerType(), !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control pull-left']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Giá trị thấp nhất') }}
	{{ Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 0, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'min' => 0]) }}
	<div class="description">Tia số được tạo từ giá trị thấp nhất cộng thêm giá trị mặc định cho đến hết 10 phần tử trên tia số. Nhập 0 để lấy giá trị ngẫu nhiên</div>
</div>
<div class="form-group">
	{{ Form::label('', 'Khoảng cách giữa 2 số') }}
	{{ Form::number('question_config[number_plus][]', !empty($config['number_plus']) ? $config['number_plus'] : 0, ['class' => 'form-control pull-left', 'placeholder' => 'Khoảng cách giữa các số trong tia số', 'min' => 0]) }}
	<div class="description">Nhập 0 để lấy giá trị ngẫu nhiên</div>
</div>