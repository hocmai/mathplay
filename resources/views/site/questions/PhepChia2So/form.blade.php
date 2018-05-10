<div class="form-group">
	{{ Form::label('', 'Hình thức') }}
	{{ Form::select('question_config[type]['.$id.']',['' => 'mặc định', 'chia_img' => 'Chia 2 số (dạng hình ảnh)','chia' => 'Chia 2 số(dạng số)','nhan-chia' => 'Quan hệ phép nhân và phép chia'], !empty($config['type']) ? $config['type'] : '', ['class' => 'form-control']) }}
</div>
<p>chỉ dùng cho trường hợp chia 2 số(dạng số)</p>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('', 'Số a nhỏ nhất') }}
        {{ Form::number('question_config[min_a]['.$id.']', isset($config['min_a']) ? $config['min_a'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Số a nhỏ nhất','max' => 12]) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('', 'Số a lớn nhất') }}
        {{ Form::number('question_config[max_a]['.$id.']', isset($config['max_a']) ? $config['max_a'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số a lớn nhất','max' => 12]) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('', 'Số b nhỏ nhất') }}
        {{ Form::number('question_config[min_b]['.$id.']', isset($config['min_b']) ? $config['min_b'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Số b nhỏ nhất', 'max' => 12]) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('', 'Số b lớn nhất') }}
        {{ Form::number('question_config[max_b]['.$id.']', isset($config['max_b']) ? $config['max_b'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số b lớn nhất','max' => 12]) }}
    </div>
</div>
