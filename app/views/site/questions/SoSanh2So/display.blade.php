<?php
$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['choose', 'input']);
$min = !empty($config['min']) ? $config['min'] : 1;
$max = !empty($config['max']) ? $config['max'] : 100;

$num1 = rand($min, $max);
$num2 = rand($min, $max);

if( $num1 > $num2 ){
	$answer = '>';
}
else if( $num1 < $num2 ){
	$answer = '<';
}
else {
	$answer = '=';
}

$method = !empty($config['method']) ? $config['method'] : getRandArrayVal(['tong-so', 'tong-tong', 'hieu-so', 'hieu-hieu']);
switch ($method)
 {
	case 'tong-so':
		$tong = rand(0, $num1);
		$num1 = $tong.' + '.($num1 - $tong);
		break;

	case 'tong-tong':
		$tong1 = rand(0, $num1);
		$num1 = $tong1.' + '.($num1 - $tong1);
		$tong2 = rand(0, $num2);
		$num2 = $tong2.' + '.($num2 - $tong2);
		break;

	case 'hieu-so':
		if( $num1 >= $max ){
			$num1 = rand($min, $max - 1);
		}
		$hieu1 = rand($num1,$max);
		$num1 = $hieu1.' - '.($hieu1 - $num1);
		break;

	case 'hieu-hieu':
		if( $num1 >= $max ){
			$num1 = rand($min, $max - 1);
		}
		$hieu1 = rand($num1,$max);
		$num1 = $hieu1.' - '.($hieu1 - $num1);

		if( $num2 >= $max ){
			$num2 = rand($min, $max - 1);
		}
		$hieu2 = rand($num2,$max);
		$num2 = $hieu2.' - '.($hieu2 - $num2);
		break;
}?>

@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				@if( $type == 'choose' )
					<div class="choose answer inline-block" style="line-height: 35px;font-size: 16px;font-weight: 500;">
						<span class="pull-left number">{{ $num1 }}</span>
						<span class="pull-left input"> ____ </span>
						<span class="pull-left number">{{ $num2 }}</span>
					</div>
					<div class="clearfix"></div>
					<div class="radio-box radio form-group">
						<input type="radio" name="answer" value="<" id="{{ $question_num.'-1' }}"/>
						<label for="{{ $question_num.'-1' }}">Nhỏ hơn</label>
					</div>
					<div class="radio-box radio form-group">
						<input type="radio" name="answer" value="=" id="{{ $question_num.'-2' }}"/>
						<label for="{{ $question_num.'-2' }}">Bằng</label>
					</div>
					<div class="radio-box radio form-group">
						<input type="radio" name="answer" value=">" id="{{ $question_num.'-3' }}"/>
						<label for="{{ $question_num.'-3' }}">Lớn hơn</label>
					</div>
				@else
					<div class="input answer" style="line-height: 35px;font-size: 16px;font-weight: 500;">
						<span class="pull-left number">{{ $num1 }}</span>
						<span class="pull-left input">{{ Form::text('answer', '', ['class' => 'form-control', 'style'=>'width: 35px;margin:0 5px;']) }}</span>
						<span class="pull-left number">{{ $num2 }}</span>
					</div>
				@endif
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.sosanh2so',[
	'num1'=>$num1,
	'num2'=>$num2,
	'answer'=>$answer
])