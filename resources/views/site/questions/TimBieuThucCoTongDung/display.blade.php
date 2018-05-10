<?php
$min = 2;
$max = !empty($config['max_value']) ? $config['max_value'] : 10;
$range = range($min, $max);
$total = rand($min, $max);
$type_rand = TimBieuThucCoTongDung::getAnswerType();
$type = !empty($config['answer_type']) ? $config['answer_type'] : array_rand($type_rand);

$answer_rand = getRandArrayVal($range, 4, true);
$sentence = [];
if( $type == 'input' ){
	for( $i = 0; $i <= $total; $i++ ){
		$sentence[] = $i.'+'.($total - $i).'='.$total;
	}
	$positionAnswer = array_rand($sentence);
	$answer_text = $sentence[$positionAnswer];
}
else if( $type == 'choose' ){
	foreach ($answer_rand as $key => $value) {
		$sub = rand(1,$value-1);
		$sentence[$value] = ($value-$sub).' + '.$sub;
	}
	$answer_text = getRandArrayVal($answer_rand);
}

if( $type == 'input' ){
	$str_arr = ['Dưới đây là các cách tính tổng của', $total.'.', 'Hãy viết biểu thức còn thiếu.'];
}
elseif( $type == 'choose' ){
	$str_arr = ['Biểu thức nào có tổng bằng', $answer_text ];
	shuffle($answer_rand);
}
else{
	$str_arr = [$question->title];
}?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => $str_arr ])

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
				@foreach($sentence as $key => $value)
					<div class="form-group inline-block radio-box">
						<input class="hidden" id="answer-{{ $question_num.'-'.$key }}" type="radio" name="answer" value="{{ $key }}">
						<label for="answer-{{ $question_num.'-'.$key }}">
							{{ $value }}
						</label>
					</div>
				@endforeach
			</div>
		@endif
	{{ Form::close() }}
</div>
@include('site.questions_guide.tim_bieu_thuc_co_tong_dung')
