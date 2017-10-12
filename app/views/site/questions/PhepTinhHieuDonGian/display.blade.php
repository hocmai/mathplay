<?php
$max1 = !empty($config['max_value_1']) ? $config['max_value_1'] : 10;

$min2 = !empty($config['min_value_2']) ? $config['min_value_2'] : 1;
$max2 = !empty($config['max_value_2']) ? $config['max_value_2'] : 10;

$answer2 = rand($min2, $max2);
$answer1 = rand($answer2, $max1);
$display = ['ngang', 'doc'];
// dd($images);
?>

<div class="start">
	{{ $question->title }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer1 - $answer2 }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group plus-with-0">
			<div class="content inline-block">
				
				<div class="tong pull-left {{ !empty($config['display']) ? $config['display'] : $display[array_rand($display)] }}" style="font-size: 18px;"><span class="num1">{{ $answer1 }}</span><span class="num2"><span class="plus"> - </span>{{ $answer2 }}</span><span class="result"> = {{ Form::text('answer', '') }}</span></div>
			</div>
		</div>
	{{ Form::close() }}
</div>