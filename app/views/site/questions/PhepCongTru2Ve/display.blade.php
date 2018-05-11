<?php 
$min = isset($config['min']) ? $config['min'] : 1;
$max = isset($config['max']) ? $config['max'] : 100;

$type = !empty($config['type']) ? $config['type'] : getRandArrayVal(['plus', 'sub']);
$find = !empty($config['find']) ? $config['find'] : getRandArrayVal(['a', 'b', 'c', 'd']);

$valueRange = rand($min, $max);

$a = rand(1, $valueRange);
$c = rand(1, $valueRange);
$b = $valueRange - $a;
$d = $valueRange - $c;

if( $type == 'sub' )
{
	$a = rand($valueRange, $max);
	$c = rand($valueRange, $max);
	$b = $a - $valueRange;
	$d = $c - $valueRange;
}
$_arr = ['a' => $a, 'b' => $b, 'c' => $c, 'd' => $d];
?>
@include('site.questions.render-title', ['question' => $question])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $_arr[$find] }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block" style="font-size: 16px; font-weight: 500">
				<span class="a-side inline-block">{{ ($find == 'a') ? Form::number('answer', '', ['class'=>'form-control text-center', 'style' => 'width:55px']) : $a }}</span>
				<span class="type inline-block">{{ ($type == 'plus') ? '+' : '-' }}</span>
				<span class="b-side inline-block">{{ ($find == 'b') ? Form::number('answer', '', ['class'=>'form-control text-center', 'style' => 'width:55px']) : $b }}</span>
				<span class="comp inline-block">=</span>
				<span class="c-side inline-block">{{ ($find == 'c') ? Form::number('answer', '', ['class'=>'form-control text-center', 'style' => 'width:55px']) : $c }}</span>
				<span class="type inline-block">{{ ($type == 'plus') ? '+' : '-' }}</span>
				<span class="d-side inline-block">{{ ($find == 'd') ? Form::number('answer', '', ['class'=>'form-control text-center', 'style' => 'width:55px']) : $d }}</span>
			</div>
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.phep_cong_tru_2_ve')