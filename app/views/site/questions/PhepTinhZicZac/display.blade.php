<?php
$min = !empty($config['min']) ? $config['min'] : 1;
$max = !empty($config['max']) ? $config['max'] : 100;
$num = !empty($config['num']) ? $config['num'] : rand(7,10);
$firstNum = !empty($config['first']) ? $config['first'] : rand($min,$max);

$range = [$firstNum];
for ($i = 1; $i < $num*2 - 1; $i++) { 
	if( $i % 2 > 0 ){
		//// so a', b', c'
		$range[$i] = rand(-abs($range[$i-1])+1, abs($max-$range[$i-1]));
	} elseif ( $i != 0 ){
		//// so a, b, c
		$range[$i] = $range[$i-2] + $range[$i-1];
	}
}
$rangeRand = $_rangeRand = array_rand($range, rand(5,8));
$answer = '';

///////// Dam bao rang khong co 3 o input nam lien nhau, khong the dien dap an.
for ( $i = 1; $i < count($rangeRand) - 1; $i++ ) {
	if( $rangeRand[$i-1]+1 == $rangeRand[$i] && $rangeRand[$i]+1 == $rangeRand[$i+1] ){
		if(isset($_rangeRand[$i])) unset($_rangeRand[$i]);
	}
}
$rangeRand = $_rangeRand;
foreach ($rangeRand as $key => $value) {
	$answer .= abs($range[$value]);
}
// dd($range);
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
				<div class="wrap-zz">
					<?php $checkSub = 0; $checkNum = 0; ?>
					@foreach ( $range as $key => $value )
						@if( $key % 2 > 0 )
							<div class="pull-left sub {{ (($checkSub % 2 == 0) ? 'down' : 'up').( in_array($key, $rangeRand) ? ' has-input' : '' ) }}">
								<span>
									{{ ($value < 0) ? '- ' : '+ ' }}
									{{ ( in_array($key, $rangeRand) ) ? Form::text('answer_', '', ['class' => 'form-control']) : abs($value) }}
								</span>
							</div>
							<?php $checkSub++; ?>
						@else
							<div class="pull-left num {{ (($checkNum % 2 == 0) ? 'down' : 'up').( in_array($key, $rangeRand) ? ' has-input' : '' ) }}">
								<span>
								{{ ( in_array($key, $rangeRand) ) ? Form::text('answer_', '', ['class' => 'form-control']) : $value }}
								</span>
							</div>
							<?php $checkNum++; ?>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>