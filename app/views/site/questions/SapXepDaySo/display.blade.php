<?php 
$sort = !empty($config['sort']) ? $config['sort'] : getRandArrayVal(['asc', 'desc']); /////// Thu tu sap xep
$rule = (empty($config['rule']) | $config['rule'] != 1) ? false : true; //////// Quy luat day so
$numValue = (!empty($config['num_value']) && (int)$config['num_value'] > 3) ? (int)$config['num_value'] : rand(5,10); //// So luong phan tu cua day so
$min = (!empty($config['min_value']) && (int)$config['min_value'] > 0) ? (int)$config['min_value'] : rand(1,100);
$max = (!empty($config['max_value']) && (int)$config['max_value'] > ($min + $numValue)) ? (int)$config['max_value'] : rand($min + $numValue + 10, $min + $numValue + 15); ///// Gia tri max phai lon hon gia tri nho nhat + so luong phan tu

$answer = '';
$Arr = [];
if( $rule ){
	////////// Tao day so tang dan
	$range = range($min, $min+$numValue);
	$numArr = $range;
} else{
	/////////////// tao day so ngau nhien
	$range = range($min, $max);
	$numArr = [];
	$Arr = array_rand($range, $numValue);
	foreach ($Arr as $key => $value) {
		$numArr[] = $range[$value];
	}
}

//////////// sap xep
if($sort == 'desc'){
	//// sap xep giam dan
	krsort($numArr, SORT_NUMERIC);
}
else{
	//// Sap xep tang dan
	asort($numArr, SORT_NUMERIC);
}

/////////// lay cau tra loi theo dung thu tu
foreach($numArr as $value){
	$answer .= $value;
} ?>

<div class="start">
	{{ $question->title.' '.(($sort == 'desc') ? 'giảm dần' : 'tăng dần') }}
</div>

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<?php shuffle($numArr); ?>
		<div class="form-group">
			<div class="content inline-block sort-number">
				@foreach($numArr as $key => $value)
					<div class="item sort pull-left">{{ $value }}</div>
				@endforeach
			</div>
			<input type="hidden" name="answer">
		</div>
	{{ Form::close() }}
</div>