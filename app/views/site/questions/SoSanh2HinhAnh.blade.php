<?php
$min = (!empty($config['min_value']) && $config['min_value'] > 0) ? $config['min_value'] : 1;
$max = !empty($config['max_value']) ? $config['max_value'] : 10;
$rand = range($min, $max);
shuffle($rand);
$answer = array_rand($rand, 2);
$images = SoSanh2HinhAnh::getRandomData();
if(!empty($images)) {
    $image_rand = array_rand($images, 2);
}

$num1 = $rand[$answer[0]];
$num2 = $rand[$answer[1]];
?>

<div class="start">
	{{ ( $num1 > $num2 ) ? 'Số nào lớn hơn?' : 'Số nào bé hơn?' }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $num1 }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<?php $num_rand = [$num1, $num2]; shuffle($num_rand); ?>
		<div class="hinhs">
            <div class="hinh">
                A 
                @for($i = 1; $i <= $num_rand[0]; $i++)
                	<img src="{{ !empty($images) ? $images[$image_rand[0]] : '' }}" class="img-responsive mauto" alt=""/>
            	@endfor
            </div>
            <div class="clr"></div>
            <div class="hinh">
                B 
                @for($i = 1; $i <= $num_rand[1]; $i++)
                	<img src="{{ !empty($images) ? $images[$image_rand[1]] : '' }}" class="img-responsive mauto" alt=""/>
            	@endfor
            </div>
        </div>
        <div class="radios">
            <div class="radio">
                <input id="sosanh-answer-{{ $question_num }}1" type="radio" name="answer" value="{{ $num_rand[0] }}" class="">
                <label for="sosanh-answer-{{ $question_num }}1">A</label>
            </div>
            <div class="radio">
                <input id="sosanh-answer-{{ $question_num }}2" type="radio" name="answer" value="{{ $num_rand[1] }}" class="">
                <label for="sosanh-answer-{{ $question_num }}2">B</label>
            </div>
        </div>
	{{ Form::close() }}
</div>