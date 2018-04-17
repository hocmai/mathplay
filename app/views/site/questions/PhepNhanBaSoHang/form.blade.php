<div class="form-group">
    {{ Form::label('', 'Hiển thị') }}
    {{ Form::select('question_config[display]['.$id.']', ['' => 'Mặc định', 'doc' => 'Dọc', 'ngang' => 'Ngang'], !empty($config['display']) ? $config['display'] : '', ['class' => 'form-control']) }}
</div>
<strong>(a x b x c = d)</strong>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('', 'Số a nhỏ nhất') }}
        {{ Form::number('question_config[min_a]['.$id.']', isset($config['min_a']) ? $config['min_a'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Số a nhỏ nhất']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('', 'Số a lớn nhất') }}
        {{ Form::number('question_config[max_a]['.$id.']', isset($config['max_a']) ? $config['max_a'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số a lớn nhất']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('', 'Số b nhỏ nhất') }}
        {{ Form::number('question_config[min_b]['.$id.']', isset($config['min_b']) ? $config['min_b'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Số b nhỏ nhất']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('', 'Số b lớn nhất') }}
        {{ Form::number('question_config[max_b]['.$id.']', isset($config['max_b']) ? $config['max_b'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số b lớn nhất']) }}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-6">
        {{ Form::label('', 'Số c nhỏ nhất') }}
        {{ Form::number('question_config[min_c]['.$id.']', isset($config['min_c']) ? $config['min_c'] : 1, ['class' => 'form-control pull-left', 'placeholder' => 'Số c nhỏ nhất']) }}
    </div>
    <div class="form-group col-sm-6">
        {{ Form::label('', 'Số c lớn nhất') }}
        {{ Form::number('question_config[max_c]['.$id.']', isset($config['max_c']) ? $config['max_c'] : 10, ['class' => 'form-control pull-left', 'placeholder' => 'Số c lớn nhất']) }}
    </div>
</div>