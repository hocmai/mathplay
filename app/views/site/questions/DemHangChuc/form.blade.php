<div class="form-group">
	{{ Form::label('', 'Phương thức trả lời') }}
	{{ Form::select('question_config[answer_type]['.$id.']', [''=>'Mặc định', 'trac-nghiem' => 'Trắc nghiệm chọn đáp án', 'dien-dap-an' => 'Điền đáp án'], !empty($config['answer_type']) ? $config['answer_type'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('', 'Hình ảnh hiển thị') }}
	{{ Form::select('question_config[image_data]['.$id.']', DemHangChuc::getImageData()['list'], !empty($config['image_data']) ? $config['image_data'] : '', ['class' => 'form-control']) }}
</div>
<div class="row">
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Giá trị thấp nhất') }}
		{{ Form::number('question_config[min_value]['.$id.']', !empty($config['min_value']) ? $config['min_value'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị thấp nhất', 'min' => 10]) }}
	</div>
	<div class="form-group col-sm-5">
		{{ Form::label('', 'Giá trị lớn nhất') }}
		{{ Form::number('question_config[max_value]['.$id.']', !empty($config['max_value']) ? $config['max_value'] : 100, ['class' => 'form-control pull-left', 'placeholder' => 'Giá trị lớn nhất', 'max' => 100]) }}
	</div>
</div>