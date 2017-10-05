<?php
$min = !empty($config['min_value']) ? $config['min_value'] : rand(1,10);
$plus = !empty($config['number_plus']) ? $config['number_plus'] : rand(1,10);
$range = (!empty($config['number_count']) && $config['number_count'] >= 3) ? $config['number_count'] : rand(5, 10);
$lines = [];
for($i = 0; $i < $range; $i++){
	$lines[] = $min;
	$min += $plus;
}

$type_rand = array('input-total', 'input','inline');
$type = !empty($config['answer_type']) ? $config['answer_type'] : $type_rand[array_rand($type_rand)];
$position = 0;
if($type == 'inline'){
	$answer = $lines[array_rand($lines)];
} else{
	$position = rand(1, $range - 2);
	$answer = $lines[$position];
	$target = rand($position-1,$position+1);
}
?>

<div class="start">
	@if($type == 'inline')
		Điền số còn thiếu trong tia số
	@elseif($type == 'input')
		@if($target < $position)
			Số nào bên phải cạnh số {{ $lines[$target] }}?
		@elseif( $target > $position )
			Số nào bên trái cạnh số {{ $lines[$target] }}?
		@else
			Ở vị trí số {{ $position + 1 }} là số mấy?
		@endif
	@elseif($type == 'input-total')
		<?php $target = $position-1 ?>
		Hoàn thành phép tính tổng theo mẫu dưới đây
	@endif
</div>
<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group number-line">
			<div class="content inline-block">
				@foreach($lines as $key => $value)
					@if( $type == 'input-total' )
						<div class="line inline-block {{ ( $key == $target | $key == $position ) ? 'active'.( $key == $target ? ' first' : '' ) : '' }}">
							{{ ( $key == $target ) ? '<div class="sub">+ '.$plus.'</div>' : '' }}
							{{ $value }}
						</div>
					@else
						<div class="line inline-block">
							{{ ( $value == $answer && $type == 'inline' ) ? Form::text('answer', '', ['class' => 'form-control padding0 text-center']) : $value }}
						</div>
					@endif
					
				@endforeach
			</div>
		</div>
		
		@if($type == 'input')
			<div class="form-group inline-block">
				<div class="col-sm-12">
					{{ Form::number('answer', '', ['class' => 'form-control', 'min' => 1]) }}
				</div>
			</div>
		@elseif($type == 'input-total')
			<div class="form-group inline-block" style="font-size:18px">
				{{ $lines[$target].' + '.$plus.' = '.Form::number('answer', '', ['class' => 'form-control', 'style' => 'width:80px;display:inline-block;font-size:18px', 'min' => 1]) }}
			</div>
		@endif
	{{ Form::close() }}
</div>