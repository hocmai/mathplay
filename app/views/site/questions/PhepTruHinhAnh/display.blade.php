<?php
$max = (!empty($config['max_value']) && $config['max_value'] > 1) ? $config['max_value'] : 10;
$type = !empty($config['question_type']) ? $config['question_type'] : getRandArrayVal(['input', 'choose']);
$randImg = CommonQuestion::getRandImg('PhepTruHinhAnh');
$randImg = getRandArrayVal($randImg);

$num1 = rand(2,$max);
$num2 = rand(1,($num1-1));
$answer = $num1 - $num2;

if($type == 'choose'){
	$answer = $num1.'-'.$num2.'='.($num1-$num2);
	$numArr = [[$num1, $num2]];
	$range = range(1, $max);
	$numRand = array_rand($range, 3);
	foreach ($numRand as $key => $value) {
		$_rand = rand(1, $range[$value]-1);
		if( $num1 != $range[$value] && $num2 != $_rand ){
			$numArr[] = [$range[$value], $_rand];
		} else{
			$numArr[] = [$range[$value], rand(1, $range[$value]-1)];
		}
	}
	shuffle($numArr);
// dd($numArr);
}
elseif( $type == 'write' ){
	$answer = $num1.'-'.$num2.'='.($num1-$num2);
}
?>

@include('site.questions.render-title', ['question' => $question])

<div class="description">
	{{ ($type == 'choose') ? 'Hình ảnh nào biểu diễn đúng biểu thức '.$num1.' - '.$num2.' = '.($num1-$num2) : '' }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				@if( $type == 'input' )
					<div class="images form-group clearfix">
						@for($i = 1; $i <= $num1; $i++)
							<div class="item pull-left{{ ($i>($num1 - $num2)) ? ' ignore' : '' }}"><img src="{{ asset($randImg) }}" width="50" /></div>
						@endfor
					</div>
					<div class="question clear clearfix"><strong style="font-size:18px;font-weight:600">{{ $num1.' - '.$num2.' = ' }}</strong>{{ Form::text('answer', '', ['class' => 'form-control inline-block', 'size' => '10', 'style' => 'width:55px;font-size:18px;font-weight:500;text-align:center;']) }}</div>
				@elseif( $type == 'choose' )
					@foreach( $numArr as $key => $value )
						<div class="images pull-left inline-block">
							{{ Form::radio('answer', $value[0].'-'.$value[1].'='.($value[0] - $value[1]), false, ['class' => 'hidden', 'id' => $question->id.'-'.$question_num.'-'.$key]) }}
							<label for="{{ $question->id.'-'.$question_num.'-'.$key }}">
								@for($i = 1; $i <= $value[0]; $i++)
									<div class="item pull-left{{ ($i>($value[0] - $value[1])) ? ' ignore' : '' }}"><img src="{{ asset($randImg) }}" width="50" /></div>
								@endfor
							</label>
						</div>
						<div class="clear clearfix"></div>
					@endforeach
				@elseif( $type == 'write' )
					<div class="images form-group clearfix">
						@for($i = 1; $i <= $num1; $i++)
							<div class="item pull-left{{ ($i>($num1 - $num2)) ? ' ignore' : '' }}"><img src="{{ asset($randImg) }}" width="50" /></div>
						@endfor
					</div>
					<div class="question clear clearfix">{{ Form::text('answer', '', ['class' => 'form-control inline-block', 'size' => '10', 'style' => 'width:155px;font-size:18px;font-weight:500;text-align:center;']) }}</div>
				@endif
			</div>
		</div>
	{{ Form::close() }}
</div>