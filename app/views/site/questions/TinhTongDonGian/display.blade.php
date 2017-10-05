<?php
$min = !empty($config['min_value']) ? $config['min_value'] : 1;
$max = !empty($config['max_value']) ? $config['max_value'] : 10;
$answer1 = rand($min, $max);
$answer2 = rand($min, $max);
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
				
				<div class="tong pull-left {{ !empty($config['display']) ? $config['display'] : $display[array_rand($display)] }}" style="font-size: 18px;"><span class="num1">{{ $answer1 }}</span><span class="num2"><span class="plus"> + </span>{{ $answer2 }}</span><span class="result"> = {{ Form::number('answer', '') }}</span></div>
			</div>
		</div>
	{{ Form::close() }}
</div>