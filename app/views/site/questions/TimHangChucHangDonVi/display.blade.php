<?php
$min = !empty($config['min']) ? $config['min'] : 10;
$max = !empty($config['max']) ? $config['max'] : 99;
$number = rand($min, $max);
$tens = floor($number/10);
$ones = $number - ($tens*10);
$answer = array_rand([$tens, $ones]);
?>
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ ($answer == 0) ? $tens*10 : $ones }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<h3>{{ ($answer == 0) ? '<ins>'.$tens.'</ins>' : $tens }}{{ ($answer == 1) ? '<ins>'.$ones.'</ins>' : $ones }}</h3>
				<div class="form-group radio radio-box">
					{{ Form::radio('answer', $tens*10, false, ['id' => '1-'.$question_num]) }}
					<label for="1-{{ $question_num }}">{{ $tens*10 }}</label>
				</div>
				<div class="form-group radio radio-box">
					{{ Form::radio('answer', $ones, false, ['id' => '2-'.$question_num]) }}
					<label for="2-{{ $question_num }}">{{ $ones }}</label>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>