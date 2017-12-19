<?php
$min_a = (isset($config['min_a']) && is_numeric($config['min_a'])) ? $config['min_a'] : 1;
$max_a = (isset($config['max_a']) && is_numeric($config['max_a'])) ? $config['max_a'] : 999999;
$min_b = (isset($config['min_b']) && is_numeric($config['min_b'])) ? $config['min_b'] : 1;
$max_b = (isset($config['max_b']) && is_numeric($config['max_b'])) ? $config['max_b'] : 999999;

if( $min_a > $max_a ){
	$max_a = $min_a;
}
if( $min_b > $max_b ){
	$max_b = $min_b;
}

$a = rand($min_a, $max_a);

///// phep tru, so a >= b
if( $max_b > $a ){
	$max_b = $a;
}
if( $min_b > $max_b ){
	$min_b = $max_b;
}
$b = rand($min_b, $max_b);

$c = $a + $b;
$answer = $c;

// $a = str_split($a);
// $b = str_split($b);
// $c = str_split($c);
?>

@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		{{ Form::hidden('answer') }}
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="text-right" style="width:80px;line-height:25px;font-size:18px;font-weight:400;letter-spacing:1px;">
					<span class="number-a clearfix">
						<span style="display: table-cell;width: 19px;text-align: center;">{{ $a }}</span>
					</span>
					<span class="number-b clearfix">
						<span class="pull-left">+</span>
						<span style="display: table-cell;width: 19px;text-align: center;">{{ $b }}</span>
					</span>
					<hr style="margin: 5px 0">
					<span class="number-c">
						<div class="multi-input-number">
							{{ Form::text('answer', '', ['style'=>'text-align:left;width:70px;height:25px;letter-spacing: 1px;', 'maxlength'=>6]) }}
						</div>
					</span>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>
<div class="huong-dan-giai text-left" style="display">
	<h2>Hướng dẫn giải</h2>
	<div class="wrapper" style="font-size: 18px">
		@include('site.questions_guide.phepcong_nhieuso', [
			'question' => $question,
			'config' => $config,
			'a' => $a,
			'b' => $b,
			'c' => $c,
		])
	</div>
</div>
