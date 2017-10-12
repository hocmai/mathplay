<?php
$min2 = !empty($config['min_value_2']) ? $config['min_value_2'] : 0;
$max2 = !empty($config['max_value_2']) ? $config['max_value_2'] : 10;

$min1 = (!empty($config['min_value_1']) && $config['min_value_1'] >= $max2) ? $config['min_value_1'] : $max2;
$max1 = !empty($config['max_value_1']) ? $config['max_value_1'] : 10;

$answer2 = rand($min2, $max2);
$answer1 = rand($min1, $max1);
$display = !empty($config['display']) ? $config['display'] : getRandArrayVal(['ngang', 'doc']);
$find = !empty($config['find']) ? $config['find'] : getRandArrayVal(['hieu', 'a', 'b']);

$answer = $answer1 - $answer2;
if( $find == 'a' ){
	$answer = $answer1;
}
else if( $find == 'b' ){
	$answer = $answer2;
}
?>

<div class="start">
	{{ $question->title }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group plus-with-0">
			<div class="content inline-block">
				
				<div class="tong pull-left {{ $display }}" style="font-size: 18px;"><span class="num1">{{ $find == 'a' ? Form::text('answer') : $answer1 }}</span><span class="num2"><span class="plus"> - </span>{{ $find == 'b' ? Form::text('answer') : $answer2 }}</span><span class="result"> = {{ $find == 'hieu' ? Form::text('answer') : $answer1 - $answer2 }}</span></div>
			</div>
		</div>
	{{ Form::close() }}
</div>