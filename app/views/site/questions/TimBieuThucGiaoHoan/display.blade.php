<?php
$min = 2;
$max = !empty($config['max_value']) ? $config['max_value'] : 10;
$range = range($min, $max);
$type_rand = TimBieuThucGiaoHoan::getAnswerType();
$type = !empty($config['answer_type']) ? $config['answer_type'] : array_rand($type_rand);

$answer_rand = array_rand($range, 4);
$total = $range[$answer_rand[0]];
$sub = ($total%2 != 0) ? rand(0, $total) : rand(0, ($total/2 - 1));
$answer_text = ($total-$sub).'+'.$sub.'='.$total;

if( $type == 'giao-hoan' ){
	$sentence2 = [[$total-$sub, $sub], [$sub, $total-$sub]];
	foreach ($answer_rand as $key => $value) {
		/////////// Dam bao khong xuat hien 2 dap an trung nhau
		if( $range[$value] == $total ){
			continue;
		}
		$valueRand = rand(0, $range[$value]);
		$sentence2[] = [$valueRand, $range[$value] - $valueRand];
	}
}

// dd($type);
?>

@include('site.questions.render-title', ['question' => $question])

<div class="description">
	@if( $type == 'giao-hoan' )
		Viết lại biểu thức giao hoán của phép cộng {{ $sub.'+'.($total-$sub).'='.$total }}?
	@else
		Biểu thức nào là phép giao hoán của phép cộng {{ $sub.'+'.($total-$sub).'='.$total }}?
	@endif
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer_text }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		@if( $type == 'giao-hoan-2' )
			<div class="form-group find-addition-sentence inline-block">
				{{ Form::text('answer', '', ['class' => 'form-control', 'style' => 'width: 150px']) }}
			</div>
		@elseif( $type == 'giao-hoan' )
			<?php shuffle($sentence2); ?>
			<div class="form-group find-addition-sentence">
				@foreach($sentence2 as $key => $value)
					<?php
					if( !isset($check) && ($value[0].'+'.$value[1].'='.($value[0] + $value[1])) != $answer_text ){
						$check = true;
						continue;
					}?>
					<div class="form-group inline-block radio-box">
						<input class="hidden" id="answer-{{ $question_num.'-'.$key }}" type="radio" name="answer" value="{{ $value[0].'+'.$value[1].'='.($value[0] + $value[1]) }}">
						<label for="answer-{{ $question_num.'-'.$key }}">
							{{ $value[0].' + '.$value[1].' = '.($value[0] + $value[1]) }}
						</label>
					</div>
				@endforeach
			</div>
		@endif
	{{ Form::close() }}
</div>
@include('site.questions_guide.tim_bieu_thuc_giao_hoan')