<?php
$min = 2;
$max = !empty($config['max_value']) ? $config['max_value'] : 10;
$total = rand($min, $max);

$type_rand = TimBieuThucCoTongDung::getAnswerType();
$type = !empty($config['answer_type']) ? $config['answer_type'] : array_rand($type_rand);

$sentence = [];
for( $i = 0; $i <= $total; $i++ ){
	$sentence[] = $i.'+'.($total - $i).'='.$total;
}
$answer = $sentence[array_rand($sentence)];

if( $type == 'choose' ){
	$range = range($min, $max);
	$answer = array_rand($range, 4);
}
?>

<div class="start">
	@if( $type == 'input' )
		Dưới đây là các cách tính tổng của {{ $total }}. Hãy viết biểu thức còn thiếu.
	@else
		Biểu thức nào có tổng = {{ $range[$answer[0]] }}?
	@endif
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ ($type == 'input') ? $answer : $range[$answer[0]] }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		@if( $type == 'input' )
			<div class="form-group missing-addition-sentence">
				<div class="content items">
					@foreach( $sentence as $i => $value )
						<div class="item">
							@if($value != $answer)
								{{ $i.' + '.($total - $i).' = '.$total }}
							@else
								{{ Form::text('answer', '', ['class' => 'form-control']) }}
							@endif
						</div>
					@endforeach
				</div>
			</div>
		@elseif( $type == 'choose' )
			<?php shuffle($answer); ?>
			<div class="form-group find-addition-sentence">
				@foreach($answer as $key => $value)
					<?php $sub = rand(1,$range[$value]); ?>
					<div class="form-group inline-block">
						<input class="hidden" id="answer-{{ $question_num.'-'.$key }}" type="radio" name="answer" value="{{ $range[$value] }}">
						<label for="answer-{{ $question_num.'-'.$key }}">
							{{ ($range[$value]-$sub).' + '.$sub }}
						</label>
					</div>
				@endforeach
			</div>
		@endif
	{{ Form::close() }}
</div>