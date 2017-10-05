<div class="form-group">
	{{ Form::label('', 'Hình thức câu hỏi') }}
	{{ Form::select('question_config[answer_type][]', [''=>'Mặc định', 'trac-nghiem' => 'Trắc nghiệm chọn đáp án', 'dien-dap-an' => 'Điền đáp án'], !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control']) }}
	<div class="clearfix description">Nếu giá trị lớn nhất > 10, hình thức câu hỏi luôn là điền đáp án</div>
</div>
<div class="form-group">
	{{ Form::label('', 'Phương thức trả lời') }}
	{{ Form::select('question_config[count_type][]', [''=>'Mặc định', 'dem-hinh-anh' => 'Đếm hình ảnh', 'dem-o-trong-khung' => 'Đếm ô trong khung', 'dem-o-con-thieu' => 'Đếm ô còn thiếu'], !empty($config['count_type']) ? $config['count_type'] : '', ['class' => 'form-control']) }}
	<div class="clearfix description">Đối với câu hỏi dạng hình ảnh và đếm ô còn thiếu, mặc định giá trị lớn nhất luôn là 10</div>
</div>
<div class="form-group">
	{{ Form::label('', 'Chọn hình ảnh hiển thị') }}
	<div class="clearfix description">Chỉ dành cho câu hỏi dạng hình ảnh</div>
	{{ Form::select('question_config[select_img][]', DemSoTrongKhung10::getImageData()['list'], !empty($config['select_img']) ? $config['select_img'] : '', ['class' => 'form-control']) }}
</div>
<div class="row">
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Giá trị thấp nhất') }}
		{{ Form::number('question_config[min_value][]', !empty($config['min_value']) ? $config['min_value'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'max' => 99]) }}
	</div>
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Giá trị lớn nhất') }}
		{{ Form::number('question_config[max_value][]', !empty($config['max_value']) ? $config['max_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất', 'max' => 100]) }}
	</div>
</div>