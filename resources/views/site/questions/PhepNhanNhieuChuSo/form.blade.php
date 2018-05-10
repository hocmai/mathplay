a x b = c<br>
<div class="form-group">
    {{ Form::label('', 'Hiển thị') }}
    {{ Form::select('display', ['' => 'Mặc định', 'ngang' => 'Ngang', 'doc' => 'Dọc'], !empty($config['display']) ? $config['display'] : '', ['class' => 'form-control']) }}
</div>
<div class="form-group">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            {{ Form::label('', 'Số a nhỏ nhất') }}
            {{ Form::text('question_config[min_a]['.$id.']', isset($config['min_a']) ? $config['min_a'] : '', ['class' => 'form-control', 'max' => 999999]) }}
        </div>
        <div class="col-xs-12 col-sm-6">
            {{ Form::label('', 'Số a lớn nhất') }}
            {{ Form::text('question_config[max_a]['.$id.']', isset($config['max_a']) ? $config['max_a'] : '', ['class' => 'form-control', 'max' => 999999]) }}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            {{ Form::label('', 'Số b nhỏ nhất') }}
            {{ Form::text('question_config[min_b]['.$id.']', isset($config['min_b']) ? $config['min_b'] : '', ['class' => 'form-control', 'max' => 999999]) }}
        </div>
        <div class="col-xs-12 col-sm-6">
            {{ Form::label('', 'Số b lớn nhất') }}
            {{ Form::text('question_config[max_b]['.$id.']', isset($config['max_b']) ? $config['max_b'] : '', ['class' => 'form-control', 'max' => 999999]) }}
        </div>
    </div>
    <u>số b nhỏ hơn bằng 9</u> 
</div>