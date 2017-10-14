<?php
$max = !empty($config['max_value']) ? $config['max_value'] : 10;
$range = range(0, $max);

$type = !empty($config['answer_type']) ? $config['answer_type'] : getRandArrayVal(['input', 'input_a', 'choose']);
$answer_rand = array_rand($range, 4);
if( $type == 'input' | $type == 'input_a' ){
	$sentence = [];
	$answer = rand(3,10);
	$limit = rand(5,8);
	if( $type == 'input' ){
		for( $i = 0; $i <= $answer; $i++ ){
			$sentence[] = $answer.' - '.$i.' = '.($answer-$i);
		}
		$positionAnswer = rand(1, $limit-2);
	} else if( $type == 'input_a' ){
		for( $i = ($answer+$limit); $i >= $answer; $i-- ){
			$sentence[] = $i.' - '.($i-$answer).' = '.$answer;
		}
		$positionAnswer = rand(1, count($sentence)-1);
	}
	$answer_text = str_replace(' ', '', $sentence[$positionAnswer]);
}
else if( $type == 'choose' ){
	$answer = [];
	$_arr = getRandArrayVal($range, 4);
	foreach ($_arr as $key => $value) {
		$rand = rand($value, $max);
		$answer[] = ['label' => $rand.' - '.($rand-$value), 'val' => $value];
	}
	$answer_text = $_arr[0];
}
?>

<div class="start">
	@if( $type == 'input' )
		Dưới đây là các cách tính hiệu của {{ $answer }}. Hãy viết biểu thức còn thiếu theo mẫu dưới đây.
	@elseif( $type == 'input_a' )
		Dưới đây là các cách tính hiệu của {{ $answer }}. Hãy viết biểu thức còn thiếu theo mẫu dưới đây.
	@elseif( $type == 'choose' )
		Biểu thức nào có hiệu = {{ $_arr[0] }}?
	@endif
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer_text }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		@if( $type == 'input' | $type == 'input_a' )
			<div class="form-group missing-addition-sentence inline-block">
				<div class="content items">
					@foreach( $sentence as $i => $value )
						<div class="item">
							@if($i != $positionAnswer)
								{{ $value }}
							@else
								{{ Form::text('answer', '', ['class' => 'form-control text-right padding0', 'style' => 'font-size:16px']) }}
							@endif
						</div>
					@endforeach
				</div>
			</div>
		@elseif( $type == 'choose' )
			<div class="form-group find-addition-sentence">
				<?php shuffle($answer) ?>
				@foreach($answer as $key => $value)
					<div class="form-group inline-block radio-box">
						<input class="hidden" id="answer-{{ $question_num.'-'.$key }}" type="radio" name="answer" value="{{ $value['val'] }}">
						<label for="answer-{{ $question_num.'-'.$key }}">{{ $value['label'] }}</label>
					</div>
				@endforeach
			</div>
		@endif
	{{ Form::close() }}
</div>