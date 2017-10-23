<?php
$min = 2;
$max = !empty($config['max_value']) ? $config['max_value'] : 10;
$range = range($min, $max);
$total = rand($min, $max);
$type_rand = TimBieuThucCoTongDung::getAnswerType();
$type = !empty($config['answer_type']) ? $config['answer_type'] : array_rand($type_rand);

$answer_rand = array_rand($range, 4);
if( $type == 'input' ){
	$sentence = [];
	for( $i = 0; $i <= $total; $i++ ){
		$sentence[] = $i.'+'.($total - $i).'='.$total;
	}
	$positionAnswer = array_rand($sentence);
	$answer_text = $sentence[$positionAnswer];
}
else if( $type == 'choose' ){
	$answer_text = $range[$answer_rand[0]];
}
?>

<div class="start">
	@if(!empty($config['sound_title']))
        <div class="play-question-sound">
            <button class="control play"></button>
            <video class="hidden">
                <source src="{{ $config['sound_title'] }}" type="" type="audio/mpeg">
            </video>
        </div>
    @endif
    {{ $question->title }}
</div>
<div class="description">
	@if( $type == 'input' )
		Dưới đây là các cách tính tổng của {{ $total }}. Hãy viết biểu thức còn thiếu.
	@elseif( $type == 'choose' )
		Biểu thức nào có tổng = {{ $range[$answer_rand[0]] }}?
	@endif
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer_text }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		@if( $type == 'input' )
			<div class="form-group missing-addition-sentence">
				<div class="content items">
					@foreach( $sentence as $i => $value )
						<div class="item">
							@if($value != $positionAnswer)
								{{ $i.' + '.($total - $i).' = '.$total }}
							@else
								{{ Form::text('answer', '', ['class' => 'form-control']) }}
							@endif
						</div>
					@endforeach
				</div>
			</div>
		@elseif( $type == 'choose' )
			<div class="form-group find-addition-sentence">
				@foreach($answer_rand as $key => $value)
					<?php $sub = rand(1,$range[$value]); ?>
					<div class="form-group inline-block radio-box">
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