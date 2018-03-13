<?php
$min = !empty($option['min']) ? $option['min'] : 5;
$max = !empty($option['max']) ? $option['max'] : 100;

$number = rand($min, $max);
$uocSo[] = getRandArrayVal(CommonQuestion::timUocSo($number), 1, true);
$uocSo[] = getRandArrayVal(CommonQuestion::timUocSo($number), 1, true);
$uocSo[] = getRandArrayVal(CommonQuestion::timUocSo($number), 1, true);
$rand_arr = [];
for( $i = 0; $i < 3; $i++ ){
	$rand = rand(0,3);
	$result = $uocSo[$i]*($number/$uocSo[$i]+$rand);
	if( $result < $number ){
		$condition = 'less';
		$conditionVn = 'nhỏ hơn';
	} elseif ( $result > $number ){
		$condition = 'greater';
		$conditionVn = 'lớn hơn';
	} else {
		$condition = 'equal';
		$conditionVn = 'bằng';
	}
	$rand_arr[] = ['condition' => $condition, 'sosanh' => $conditionVn, 'num' => $result, 'text' => $uocSo[$i].' x '.($number/$uocSo[$i]+$rand)];
}
// dd($rand_arr, $number);
?>
@include('site.questions.render-title', ['question' => $question, 'desc' => $question->content])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="1" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		<input type="hidden" name="answer" value="" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="dragable-number form-group">
					@foreach ($rand_arr as $num => $element)
						<div class="wrapper">
							<div class="item" data-number="{{ $element['num'] }}" data-condition="{{ $element['condition'] }}">{{ $element['text'] }}</div>
						</div>
					@endforeach
				</div>
				<div class="clear clearfix"></div>

				<div class="dropable-number">
					<div class="item less">
						<span class="head">Nhỏ hơn {{ $number }}</span>
						<div class="drop-grid-area"></div>
					</div>
					<div class="item equal">
						<span class="head">bằng {{ $number }}</span>
						<div class="drop-grid-area"></div>
					</div>
					<div class="item greater">
						<span class="head">Lớn hơn {{ $number }}</span>
						<div class="drop-grid-area"></div>
					</div>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.so_sanh_tich_va_mot_so_keo_tha')