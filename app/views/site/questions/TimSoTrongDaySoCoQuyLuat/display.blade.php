<?php
$num_col = !empty($config['number_count']) ? $config['number_count'] : rand(5,10);
$start = !empty($config['start_value']) ? $config['start_value'] : rand(1,10);
$plus = !empty($config['number_plus']) ? $config['number_plus'] : rand(1,10);
$position = rand(1,$num_col);
$answer = $start+( $plus*($position -1) );
?>

@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group find-number-in-list">
			<div class="content inline-block">
				@for( $i = 1; $i <= $num_col; $i++ )
					<div class="pull-left number">{{ ($answer == $start+( $plus*($i-1) )) ? Form::text('answer', '') : $start+( $plus*($i-1) ) }}{{ ($i < $num_col) ? ', ' : '' }}</div>
				@endfor
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.dien_so_trong_day_so_co_quy_luat')
