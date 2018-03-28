<?php
$min = (!empty($config['min_value']) && $config['min_value'] > 0) ? $config['min_value'] : 1;
$max = !empty($config['max_value']) ? $config['max_value'] : 10;
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['choose','true-false','select']);
$answer_range = getRandArrayVal(range($min, $max), 2);
$images = SoSanh2HinhAnh::getRandomData();
if( count($images) ) {
    $image_rand = array_rand($images, 2);
}
// dd($image_rand);
$num1 = $answer_range[0];
$num2 = $answer_range[1];
$answer = $num1;
$str_arr = [];
$desc = '';
if( $type == 'true-false' ){
    $compare = getRandArrayVal(['nhiều', 'ít']);
    $answer = 0;
    if( ($compare == 'nhiều' && $num1 > $num2) | ($compare == 'ít' && $num1 < $num2) ){
        $answer = 1;
    }
    $desc = 'Số '.$image_rand[0].' '.$compare.' hơn số '.$image_rand[1].'. Đúng hay sai';
}
else if( $type == 'select' ){
    $desc = 'Hãy chọn nhóm có số '.$image_rand[0].' bằng nhóm dưới đây.';
}
else{
    $compare = !empty($config['compare']) ? $config['compare'] : getRandArrayVal(['nhiều hơn','ít hơn']);
    // $compare = getRandArrayVal(['nhiều hơn', 'ít hơn']);
    $answer = $num2;
    if( ($compare == 'nhiều hơn' && $num1 > $num2) | ($compare == 'ít hơn' && $num1 < $num2) ){
        $answer = $num1;
    }
    $desc = 'Nhóm nào '.$compare;
}
?>

@include('site.questions.render-title', ['question' => $question, 'desc' => $desc ])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />

		<div class="hinhs">
            @if($type == 'select')
                <div class="hinh">
                    @for($i = 1; $i <= $num1; $i++)
                        <img src="{{ !empty($images) ? $images[$image_rand[0]] : '' }}" class="img-responsive mauto" alt=""/>
                    @endfor
                </div>
            @else
                <div class="hinh">
                    A 
                    @for($i = 1; $i <= $num1; $i++)
                    	<img src="{{ !empty($images) ? $images[$image_rand[0]] : '' }}" class="img-responsive mauto" alt=""/>
                	@endfor
                </div>
                <div class="clr"></div>
                <div class="hinh">
                    B 
                    @for($i = 1; $i <= $num2; $i++)
                    	<img src="{{ !empty($images) ? $images[$image_rand[1]] : '' }}" class="img-responsive mauto" alt=""/>
                	@endfor
                </div>
            @endif
        </div>
        <div class="radios">
            @if( $type == 'true-false' )
                <div class="radio">
                    <input id="sosanh-answer-{{ $question_num }}1" type="radio" name="answer" value="1" class="">
                    <label for="sosanh-answer-{{ $question_num }}1">Đúng</label>
                </div>
                <div class="radio">
                    <input id="sosanh-answer-{{ $question_num }}2" type="radio" name="answer" value="0" class="">
                    <label for="sosanh-answer-{{ $question_num }}2">Sai</label>
                </div>
            @elseif( $type == 'select' )
                <div class="radio">
                    <input id="sosanh-answer-{{ $question_num }}1" type="radio" name="answer" value="{{ $num1 }}" class="">
                    <label for="sosanh-answer-{{ $question_num }}1">
                        @for($i = 1; $i <= $num1; $i++)
                            <img src="{{ !empty($images) ? $images[$image_rand[0]] : '' }}" width="35px" class="img-responsive pull-left" alt=""/>
                        @endfor
                    </label>
                </div>
                <div class="radio">
                    <input id="sosanh-answer-{{ $question_num }}2" type="radio" name="answer" value="{{ $num2 }}" class="">
                    <label for="sosanh-answer-{{ $question_num }}2">
                        @for($i = 1; $i <= $num2; $i++)
                            <img src="{{ !empty($images) ? $images[$image_rand[0]] : '' }}" width="35px" class="img-responsive pull-left" alt=""/>
                        @endfor
                    </label>
                </div>
            @else
                <div class="radio">
                    <input id="sosanh-answer-{{ $question_num }}1" type="radio" name="answer" value="{{ $num1 }}" class="">
                    <label for="sosanh-answer-{{ $question_num }}1">A</label>
                </div>
                <div class="radio">
                    <input id="sosanh-answer-{{ $question_num }}2" type="radio" name="answer" value="{{ $num2 }}" class="">
                    <label for="sosanh-answer-{{ $question_num }}2">B</label>
                </div>
                
            @endif
        </div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.so_sanh_2_hinh_anh')
