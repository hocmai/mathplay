<?php 
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['coin', 'basic']);
$desc = '';
$answer = 1;
if( $type == 'basic' ){
	$min = !empty($config['min']) ? $config['min'] : 1;
	$max = !empty($config['max']) ? $config['max'] : 100;
	$num1 = rand($min, $max);
	$num2 = rand($min, $max);
	$numRand1 = rand(1, $num1);
	$numRand2 = rand(1, $num2);
	$display = getRandArrayVal(['left', 'right', 'balance']);
	if( ($display == 'left' && $num1 > $num2) | ($display == 'right' && $num1 < $num2) | ($display == 'balance' && $num1 == $num2) ){
		$answer = 1;
	} else{
		$answer = 0;
	}
	$desc = 'Cán cân lệch về bên nào thì bên đó nặng hơn. Chọn đáp án đúng.';
}?>

@include('site.questions.render-title', ['question' => $question, 'desc' => $desc])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<input type="hidden" name="answer" value="" />
		
		<div class="form-group">
			<div class="content inline-block">
				@if( $type == 'coin' )
					<canvas class="canvas-weight-balance" id="canvas-weight-balance-{{ $question_num }}" width="400px" height="300px" data-balance="{{ getRandArrayVal(['left', 'right']) }}" data-rand="{{ rand(1,5) }}"></canvas>
				@else
					<div class="weight-vr form-group lower-{{ $display }}">
						<div class="left pull-left num"><span>{{ $numRand1.' + '.($num1 - $numRand1) }}</span></div>
						<div class="right pull-right num"><span>{{ $numRand2.' + '.($num2 - $numRand2) }}</span></div>
						<div class="clear clearfix"></div>
						<span class="bottom"></span>
						<span class="balance"></span>
					</div>

					<div class="clear clearfix"></div>
					<div class="form-group radio radio-box">
						{{ Form::radio('answer', 1, false, ['id'=>'select-weight-1-'.$question_num]) }}
						<label for="{{ 'select-weight-1-'.$question_num }}">Đúng</label>
					</div>
					<div class="form-group radio radio-box">
						{{ Form::radio('answer', 0, false, ['id'=>'select-weight-2-'.$question_num]) }}
						<label for="{{ 'select-weight-2-'.$question_num }}">Sai</label>
					</div>
				@endif
			</div>
		</div>
	{{ Form::close() }}
</div>