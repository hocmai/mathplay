<?php
$min_a = !empty($config['min_value_a']) ? $config['min_value_a'] : 1;
$max_a = !empty($config['max_value_a']) ? $config['max_value_a'] : 10;

$min_b = !empty($config['min_value_b']) ? $config['min_value_b'] : 1;
$max_b = !empty($config['max_value_b']) ? $config['max_value_b'] : 10;

$answer1 = rand($min_a, $max_a);
$answer2 = rand($min_b, $max_b);
$display = ['ngang', 'doc'];
// dd($images);
?>

<div class="start">
	{{ $question->title }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer1 + $answer2 }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group plus-with-0">
			<div class="content inline-block">
				
				<div class="tong pull-left {{ !empty($config['display']) ? $config['display'] : $display[array_rand($display)] }}" style="font-size: 18px;"><span class="num1">{{ $answer1 }}</span><span class="num2"><span class="plus"> + </span>{{ $answer2 }}</span><span class="result"> = {{ Form::text('answer', '') }}</span></div>
			</div>
		</div>
	{{ Form::close() }}
</div>