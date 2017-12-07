<?php
$min_a = !empty($config['min_a']) ? $config['min_a'] : 1;
$max_a = !empty($config['max_a']) ? $config['max_a'] : 100;

$min_b = !empty($config['min_b']) ? $config['min_b'] : 1;
$max_b = !empty($config['max_b']) ? $config['max_b'] : 100;

$min_c = !empty($config['min_c']) ? $config['min_c'] : 1;
$max_c = !empty($config['max_c']) ? $config['max_c'] : 100;

$method = !empty($config['method']) ? $config['method'] : getRandArrayVal(['plus', 'sub']);
$display = !empty($config['display']) ? $config['display'] : getRandArrayVal(['ver', 'hor']);

$a = rand($min_a, $max_a);
$b = rand($min_b, $max_b);
if( $method == 'sub' && $a*$b < $max_c ){
	$max_c = $a*$b;
}
$c = rand($min_c, $max_c);

$answer = $a*$b.','.($a*$b + ( $method == 'sub' ? -$c : $c ));
?>

@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<input type="hidden" name="answer" value="" />
		
		<div class="form-group">
			<div class="content inline-block">
				@if( $display == 'hor' )
					<strong class="">{{ $a.' x '.$b.( ($method == 'sub') ? ' - ' : ' + ').$c }} = {{ Form::text('answer[]', '', ['class' => 'form-control inline-block text-center', 'style' => 'width: 65px']).( ($method == 'sub') ? ' - ' : ' + ').$c }} = {{ Form::text('answer[]', '', ['class' => 'form-control inline-block text-center', 'style' => 'width: 65px']) }}</strong>
				@else
					<div class="cal-line text-right">
						<div class="line line-1">
							<span class="num">{{ $a }}</span>
							<span class="num"><span class="sym"> x </span>{{ $b }}</span>
							<span class="num"><span class="sym">{{ ($method == 'sub') ? ' - ' : ' + ' }}</span>{{ $c }}</span>
						</div>
						<hr>
						<div class="line line-2">
							{{ Form::text('answer[]', '', ['class' => 'form-control inline-block text-right', 'style' => 'width: 65px']) }}
							<span class="num"><span class="sym">{{ ($method == 'sub') ? ' - ' : ' + ' }}</span>{{ $c }}</span>
						</div>
						<hr>
						<div class="line line-3">
							= {{ Form::text('answer[]', '', ['class' => 'form-control inline-block text-right', 'style' => 'width: 65px']) }}
						</div>
					</div>
				@endif
			</div>
		</div>
	{{ Form::close() }}
</div>