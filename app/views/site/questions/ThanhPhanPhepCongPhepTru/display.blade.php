
<?php 
$type = !empty($config['method']) ? $config['method'] : getRandArrayVal(['plus', 'sub']);
$max = !empty($config['max']) ? $config['max'] : 100;
$num1 = rand(1, $max);

$answer = rand(0,2);
if($type == 'plus'){
	$num2 = rand(1, $max);
	$num3 = $num1+$num2;
} else{
	$num2 = rand(1, $num1-1);
	$num3 = $num1-$num2;
}
$total = [$num1, $num2, $num3];
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
	Trong phép tính dưới đây, số <b style="font-size: 16px;">{{ $total[$answer] }}</b> là thành phần gì?
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group">
			<div class="content inline-block">
				<div class="text-right inline-block" style="margin: 10px 0;font-size: 16px;line-height: 25px;">
					<span>{{ $num1 }}<br/></span>
					<span>{{ ( ($type == 'plus') ? '+' : '-' ).' '.$num2 }}</span>
					<hr class="margin0" style="border-color:#111">
					<span>{{ $num3 }}</span>
				</div>
				<div class="form-group">
					@if( $type == 'plus' )
						<div class="form-group radio">
							{{ Form::radio('answer', 0, false, ['id' => $question_num.'-1']) }}
							<label for="{{ $question_num.'-1' }}">Số hạng thứ nhất</label>
						</div>
						<div class="form-group radio">
							{{ Form::radio('answer', 1, false, ['id' => $question_num.'-2']) }}
							<label for="{{ $question_num.'-2' }}">Số hạng thứ hai</label>
						</div>
						<div class="form-group radio">
							{{ Form::radio('answer', 2, false, ['id' => $question_num.'-3']) }}
							<label for="{{ $question_num.'-3' }}">Tổng</label>
						</div>
					@else
						<div class="form-group radio">
							{{ Form::radio('answer', 0, false, ['id' => $question_num.'-1']) }}
							<label for="{{ $question_num.'-1' }}">Số bị trừ</label>
						</div>
						<div class="form-group radio">
							{{ Form::radio('answer', 1, false, ['id' => $question_num.'-2']) }}
							<label for="{{ $question_num.'-2' }}">Số trừ</label>
						</div>
						<div class="form-group radio">
							{{ Form::radio('answer', 2, false, ['id' => $question_num.'-3']) }}
							<label for="{{ $question_num.'-3' }}">Hiệu</label>
						</div>
					@endif
				</div>
			</div>
		</div>
	{{ Form::close() }}
</div>