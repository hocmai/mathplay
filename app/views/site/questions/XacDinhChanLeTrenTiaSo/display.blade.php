<?php
$true_answer = '';
$min = !empty($config['min_value']) ? $config['min_value'] : rand(1,10);
$type = getRandArrayVal(['even','odd']);
$range = (!empty($config['number_count']) && $config['number_count'] >= 3) ? $config['number_count'] : 10;
$lines = [];
$answer_arr = [];
for($i = 0; $i < $range; $i++){
    $lines[] = $min;
    if($type == 'even' && $min%2 == 0){
        $true_answer .= $min;
        $answer_arr[] = $min;
    }elseif($type == 'odd' && $min%2 > 0) {
        $true_answer .= $min;
        $answer_arr[] = $min;
    }                                                               
    $min ++;
}

// even la chan 
// odd la le
?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => ['Chọn các số ', ($type == 'even') ? ' chẵn ' : ' lẻ ' ,'trên tia số ' ]])

<div class="container-fluid question-wrapper">
    {{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
        <input type="hidden" name="true_answer" value="{{ $true_answer }}" />
        <input type="hidden" name="qid" value="{{ $question->id }}" />
        <input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
        <input type="hidden" name="question_number" value="{{ $question_num }}" />
        <input type="hidden" name="answer" />
        <div class="form-group number-line">
            <div class="content inline-block">
                @foreach($lines as $key => $value)
                    <div class="line inline-block" >
                        {{ Form::checkbox('answer_number', $value, false,['id' => $question_num.$key.'oddeven'] )}}
                        <label for="{{ $question_num.$key.'oddeven' }}">{{ $value }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    {{ Form::close() }}
</div>
@include('site.questions_guide.xac_dinh_chan_le_tren_tia_so')
