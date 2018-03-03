<?php
$min = !empty($option['min']) ? $option['min'] : 5;
$max = !empty($option['max']) ? $option['max'] : 100;

$number = rand($min, $max);
$uocSo1 = getRandArrayVal(CommonQuestion::timUocSo($number));
$uocSo2 = getRandArrayVal(CommonQuestion::timUocSo($number));
$uocSo3 = getRandArrayVal(CommonQuestion::timUocSo($number));
$rand_arr = [ $uocSo1.' x '.($number/$uocSo1 + rand(-1,2)), $uocSo2.' x '.($number/$uocSo2 + rand(0,3)), $uocSo3.' x '.($number/$uocSo3 + rand(0,3)) ];
// dd($rand_arr, $number);
?>
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="dragable-number form-group">
					@foreach ($rand_arr as $element)
						<div class="wrapper">
							<div class="item">{{ $element }}</div>
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
