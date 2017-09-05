<?php
$min = (!empty($config['min_value']) && $config['min_value'] >= 10) ? $config['min_value'] : 10;
$max = !empty($config['max_value']) ? $config['max_value'] : 90;
$number = rand($min, $max);

$method = !empty($config['method']) ? $config['method'] : '';
if( $method == '' ){
	$method = ['plus', 'devide'];
	$method = $method[array_rand($method)];
}

$plus = !empty($config['number_plus']) ? $config['number_plus'] : '';
if( $plus == '' ){
	$plus = [1,2,5,10];
	$plus = $plus[array_rand($plus)];
}
if( $method == 'plus' ){
	$answer = $number + $plus;
	$text = ['Đếm với '.$plus.' đơn vị. Đằng sau số '.$number.' là số mấy?', 'Số nào đứng sau số '.$number.' nếu cộng thêm '.$plus.' đơn vị?'];
} else{
	$answer = $number - $plus;
	$text = ['Đếm với '.$plus.' đơn vị. Đứng trước số '.$number.' là số mấy?', 'Số nào đứng trước số '.$number.' nếu trừ đi '.$plus.' đơn vị?'];
}
?>

<div class="start">
	{{ $text[array_rand($text)] }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<div class="form-group inline-block">
			<div class="col-sm-12">
				{{ Form::number('answer', '', ['class' => 'form-control', 'required' => true]) }}
			</div>
		</div>
		
		<div class="clearfix"></div>
		<div class="form-group">
			<a href="javascript:void(0)" class="inline-block gui-bai closeModel hd-gui-bai-bt">Gửi bài</a>
		</div>
	{{ Form::close() }}
</div>