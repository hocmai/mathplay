<?php
$min = (isset($config['min_value']) && $config['min_value'] > 1) ? $config['min_value'] : 2;
$max = isset($config['max_value']) ? $config['max_value'] : 5;
$max = (($max - $min) < 3) ? $min + 3 : $max;
$answer_range = getRandArrayVal(range($min, $max), 4);

$answer_rand = [];
$type = [ 
    '_H_' => ['blue', 'orange', 'pink', 'purple'],
    '_piece_' => ['green', 'pink', 'purple', 'yellow'],
    '_piece2_' => ['green', 'purple', 'red', 'yellow']
];

foreach ($answer_range as $key => $value) {
    $num1 = rand(1, $value-1);
    $type_rand = array_rand($type);
    $images = getRandArrayVal($type[$type_rand], 2);
    $answer_rand[$value] = [
        'num1' => $num1,
        'num2' => $value-$num1,
        'type_img' => $type_rand,
        'img1' => $type_rand.$images[0],
        'img2' => $type_rand.$images[1],
    ];

}
// dd($answer_rand);
$position = array_rand($answer_rand);

$type_answer = ['trac-nghiem', 'dien-dap-an'];
$type_answer = !empty($config['answer_type']) ? $config['answer_type'] : $type_answer[array_rand($type_answer)];
?>

@include('site.questions.render-title', ['question' => $question])

<div class="description">
    @if($type_answer == 'trac-nghiem')
        Hình ảnh nào dưới đây đúng với biểu thức {{ $answer_rand[$position]['num1']." + ".$answer_rand[$position]['num2'].' = '.$position }}
    @else
        Viết biểu thức tương ứng với hình ảnh bên dưới (Ví dụ: x + y = z)
    @endif
</div>

<div class="container-fluid question-wrapper">
    {{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
        <input type="hidden" name="true_answer" value="{{ $answer_rand[$position]['num1']."+".$answer_rand[$position]['num2'].'='.$position }}" />
        <input type="hidden" name="qid" value="{{ $question->id }}" />
        <input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
        <input type="hidden" name="question_number" value="{{ $question_num }}" />
        
        @if($type_answer == 'trac-nghiem')
            <div class="form-group plus-with-puzzle text-left">
                @foreach( $answer_rand as $key => $answer )
                    <div class="form-group">
                        <div class="radio">
                            <input type="radio" value="{{ $answer['num1'].'+'.$answer['num2'].'='.$key }}" name="answer" id="answer-{{ $question_num.'-'.$key }}">
                            <label class="{{ $answer['type_img'] }}" for="answer-{{ $question_num.'-'.$key }}">
                                @for( $i = 1; $i <= $key; $i++ )
                                    <img src="{{ asset('questions/DienBieuThuc/img/puzzle'.( ($i <= $answer['num1']) ? $answer['img1'] : $answer['img2']).'.png') }}" class="{{ ($answer['type_img'] == '_H_' && $i%2 == 0) ? 'rotate' : '' }}" width="50">
                                @endfor
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="form-group plus-with-puzzle text-center">
                <div class="form-group">
                    <div class="preview">
                        <div class="{{ $answer_rand[$position]['type_img'] }} item">
                            @for( $i = 1; $i <= $position; $i++ )
                                <img src="{{ asset('questions/DienBieuThuc/img/puzzle'.( ($i <= $answer_rand[$position]['num1']) ? $answer_rand[$position]['img1'] : $answer_rand[$position]['img2']).'.png') }}" class="{{ ($answer_rand[$position]['type_img'] == '_H_' && $i%2 == 0) ? 'rotate' : '' }}" width="50">
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group inline-block">
                {{ Form::text('answer', '', ['class' => 'form-control']) }}
            </div>
        @endif
    {{ Form::close() }}
</div>
@include('site.questions_guide.dien_bieu_thuc')