<?php
$min = !empty($config['min_value']) ? $config['min_value'] : rand(5,50);
$max = rand(5,10);
$start = rand(1,10);
$position = rand(2,$max);
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
				@for( $i = 1; $i <= $max; $i++ )
					<?php $num = $start*$i; ?>
					<div class="pull-left number">{{ ($answer == $num) ? Form::text('answer', '') : $num }}{{ ($i < $max) ? ', ' : '' }}</div>
				@endfor
			</div>
		</div>
		
		<div class="clearfix"></div>
		<div class="form-group">
			<a href="javascript:void(0)" class="inline-block gui-bai closeModel hd-gui-bai-bt">Gửi bài</a>
		</div>
	{{ Form::close() }}
</div>