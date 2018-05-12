<?php
$shapes = ChuViCacHinh::getShape(); // hinh vuông ,hình chữ nhật hinh binh hanh, hinh tam giac
$answer = array_rand($shapes);
$answer = !empty($config['shape']) ? $config['shape'] : array_rand($shapes);
$a =  rand(2,10); // chieu dai
$b = rand(2,10); // chieu rong
$unit = !empty($config['unit']) ? $config['unit'] : getRandArrayVal(['cm','dm','m']);
$perimeter = []; //chu vi
if($answer == 'tam-giac'){
	$perimeter = $a*$a*$b;
}
// chu vi tam giac bang canh a nhan canh b nhan canh c
if($answer =='vuong'){
	$perimeter = $a*4;
}
// chu vi hinh vuông = a x4
if($answer =='chu-nhat'){
	$perimeter = ($b+$a)*2;
}
// chu vi hinh chu nhat = (chieu dai + chieu rong) x 2
if($answer == 'binh-hanh'){
	$perimeter = ($a+$b)*2;
}
 // chu vi hinh binh hanh = (a+b)x2
?>
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ json_encode($perimeter) }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="row">
				<div class="pull-left col-md-4 col-xs-2">
					<p class="textleft pull-right">{{ $a.' '.$unit }}</p>
				</div>
				<div class="pull-center col-md-4 col-xs-8">
					@if($answer == 'binh-hanh')
						<p class="texttop">{{ $b.' '.$unit }}</p>
						<div class="shapes {{ $answer }} margin0 inline-block">
							<svg class="shape" width="200" height="200">{{ChuViCacHinh::renderShape($answer) }}</svg>
						</div>
						<p class="textbottom">{{ $b.' '.$unit }}</p>
					@elseif($answer =='vuong' )
						<p class="texttop">{{ $a.' '.$unit }}</p>
						<div class="shapes {{ $answer }} margin0 inline-block"  >
							<svg class="shape" width="200" height="200">{{ChuViCacHinh::renderShape($answer) }}</svg>
						</div>
						<p class="textbottom">{{ $a.' '.$unit }}</p>
					@elseif($answer == 'chu-nhat')
						<p class="texttop">{{ $b.' '.$unit }}</p>
						<div class="shapes {{ $answer }} margin0 inline-block ">
							<svg class="shape" width="200" height="200">{{ChuViCacHinh::renderShape($answer) }}</svg>
						</div>
						<p class="textbottom">{{ $b.' '.$unit }}</p>
					@else
						<div class="shapes {{ $answer }} margin0 inline-block  ">
							<svg class="shape" width="200" height="200">{{ ChuViCacHinh::renderShape($answer) }}</svg>
						</div>
						<p class="textbottom">{{ $b.' '.$unit }}</p>
					@endif
					<div class="clearfix"></div>
				</div>
				<div class="pull-right col-md-4 col-xs-2">
					<p class="textright pull-left">{{ $a.' '.$unit }}</p>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="form-group">
			{{ Form::text('answer', '', ['class' => 'form-control', 'style' => 'width:80px; display: inline-block;']).' '.$unit }}
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.chu_vi_cac_hinh')