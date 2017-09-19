<?php
$num_col = !empty($config['number_count']) ? $config['number_count'] : rand(5,10);
$start = !empty($config['start_value']) ? $config['start_value'] : rand(1,10);
$position = rand(2,$num_col);
$answer = $start*$position;
?>

<div class="start">
	{{ $question->title }}?
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group find-number-in-list">
			<div class="content inline-block">
				@for( $i = 1; $i <= $num_col; $i++ )
					<div class="pull-left number">{{ ($answer == $start*$i) ? Form::text('answer', '') : $start*$i }}{{ ($i < $num_col) ? ', ' : '' }}</div>
				@endfor
			</div>
		</div>
	{{ Form::close() }}
</div>