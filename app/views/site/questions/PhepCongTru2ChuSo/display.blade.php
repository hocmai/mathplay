<?php
$method = !empty($config['type']) ? $config['type'] : getRandArrayVal(['plus','sub']);
$remember = !empty($config['remember']) ? true : false;
$find = !empty($config['find']) ? $config['find'] : getRandArrayVal(['a','b','c']);
$min_a = (isset($config['min_a']) && is_numeric($config['min_a'])) ? $config['min_a'] : 1;
$max_a = (isset($config['max_a']) && is_numeric($config['max_a'])) ? $config['max_a'] : 99;
$min_b = (isset($config['min_b']) && is_numeric($config['min_b'])) ? $config['min_b'] : 1;
$max_b = (isset($config['max_b']) && is_numeric($config['max_b'])) ? $config['max_b'] : 99;

if( $remember && $method == 'plus' ){
	$max_a = 89;
}
if( $remember && $method == 'sub' ){
	$min_a = 11;
}

if( $min_a > $max_a ){
	$max_a = $min_a;
}
if( $min_b > $max_b ){
	$max_b = $min_b;
}

$a = rand($min_a, $max_a);
if( $method == 'plus' ){
	/// Phep cong se khong qua 100
	if( (99-$a) < $max_b ){
		$max_b = 99-$a;
	}
	if( $min_b > $max_b ){
		$min_b = $max_b;
	}
	$b = rand($min_b, $max_b);

	if( $remember && ($a+$b) < 100 ){
		//// phep cong co nho
		$a2 = str_split((string)$a);
		$a2 = (int)end( $a2 );
		$b2 = rand(10-$a2,9);
		$b1 = floor($b/10)*10;
		if( $b1+$b2 > $max_b ){
			$b = rand($min_b, $max_b-10);
			$b1 = floor($b/10)*10;
		}
		$b = $b1 + $b2;
	}

	$c = $a + $b;
} else{
	///// phep tru, so a >= b
	if( $max_b > $a ){
		$max_b = $a;
	}
	if( $min_b > $max_b ){
		$min_b = $max_b;
	}
	$b = rand($min_b, $max_b);

	if( $remember ){
		//// phep tru co nho
		$a2 = str_split((string)$a);
		$a2 = (int)end( $a2 );
		if( $a2 == 9 ){
			$a2 = rand(0,8);
			$a = floor($a/10)*10 + $a2;
		}

		$b2 = rand($a2+1,9);
		$b1 = floor($b/10)*10;
		if( $b1+$b2 > $max_b ){
			if( $max_b <= 10 ){
				$min_b = 0;
				$max_b = 20;
			}
			$b = rand($min_b, $max_b-10);
			$b1 = floor($b/10)*10;
		}
		$b = $b1 + $b2;
	}

	$c = $a - $b;
}

if( $find == 'a' ){
	$answer = $a;
}
elseif( $find == 'b' ){
	$answer = $b;
}
else{
	$answer = $c;
}

$a = str_split($a);
$b = str_split($b);
$c = str_split($c);
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
	
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		{{ Form::hidden('answer') }}
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="text-right" style="width: 55px;line-height: 25px;font-size: 18px;font-weight: 400">
					<span class="number-a clearfix">
						@if( $find == 'a' )
							<div class="multi-input-number">
								{{ isset($a[1]) ? Form::text('answer2', '', ['style'=>'margin-right:-5px;text-align:center;width:20px;height:25px', 'maxlength'=>1]) : '' }}
								{{ Form::text('answer1', '', ['style'=>'text-align:center;width:20px;height:25px', 'maxlength'=>1]) }}
							</div>
						@else
							<span style="display: table-cell;width: 19px;text-align: center;">{{ $a[0] }}</span>
							{{ isset($a[1]) ? '<span style="display: table-cell;width: 19px;text-align: center;">'.$a[1].'</span>' : '' }}
						@endif
					</span>
					<span class="number-b clearfix">
						<span class="pull-left">{{ ($method == 'plus') ? '+' : '-' }}</span>
						@if( $find == 'b' )
							<div class="multi-input-number">
								{{ isset($b[1]) ? Form::text('answer2', '', ['style'=>'margin-right:-5px;text-align:center;width:20px;height:25px', 'maxlength'=>1]) : '' }}
								{{ Form::text('answer1', '', ['style'=>'text-align:center;width:20px;height:25px', 'maxlength'=>1]) }}
							</div>
						@else
							<span style="display: table-cell;width: 19px;text-align: center;">{{ $b[0] }}</span>
							{{ isset($b[1]) ? '<span style="display: table-cell;width: 19px;text-align: center;">'.$b[1].'</span>' : '' }}
						@endif
					</span>
					<hr style="margin: 5px 0">
					<span class="number-c">
						@if( $find == 'c' )
							<div class="multi-input-number">
								{{ isset($c[1]) ? Form::text('answer2', '', ['style'=>'margin-right:-5px;text-align:center;width:20px;height:25px', 'maxlength'=>1]) : '' }}
								{{ Form::text('answer1', '', ['style'=>'text-align:center;width:20px;height:25px', 'maxlength'=>1]) }}
							</div>
						@else
							<span style="display: table-cell;width: 19px;text-align: center;">{{ $c[0] }}</span>
							{{ isset($c[1]) ? '<span style="display: table-cell;width: 19px;text-align: center;">'.$c[1].'</span>' : '' }}
						@endif
					</span>
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>