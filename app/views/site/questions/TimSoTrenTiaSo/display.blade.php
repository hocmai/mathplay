<?php
$min = !empty($config['min_value']) ? $config['min_value'] : 1;
$max = !empty($config['max_value']) ? $config['max_value'] : 100;
$plus = !empty($config['number_plus']) ? $config['number_plus'] : rand(1,10);
$range = (!empty($config['number_count']) && $config['number_count'] >= 3) ? $config['number_count'] : rand(5, 10);
$lines = [];
for($i = 0; $i < $range; $i++){
	$lines[] = $min;
	$min += $plus;
}

$type = !empty($config['answer_type']) ? $config['answer_type'] : getRandArrayVal(['input-total', 'input','inline']);
$position = 0;
if($type == 'inline'){
	$position = array_rand($lines);
	$answer = $lines[$position];
} else{
	$position = rand(1, $range - 2);
	$answer = $lines[$position];
	$target = rand($position-1,$position+1);
}
if($type == 'inline'){
	$str_arr = ['Điền vào chỗ trống số còn thiếu trên tia số'];
}
elseif($type == 'input'){
	if($target < $position)
		$str_arr = ['Số nào bên phải cạnh số', $lines[$target],'trên tia số là số ?' ];
	elseif( $target > $position ){
		$str_arr = ['Số nào bên trái cạnh số', $lines[$target],'trên tia số là số ?' ];
	}
	else{
		$str_arr = ['Ở vị trí số', $position + 1, 'là số mấy'];
	}
}	
elseif($type == 'input-total'){
	$target = $position-1;
	$str_arr = ['Hoàn thành phép tính tổng theo mẫu dưới đây'];
}
?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => $str_arr])

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
@include('site.questions_guide.timsotrentiaso')
