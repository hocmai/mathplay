<?php 
$sort = !empty($config['sort']) ? $config['sort'] : getRandArrayVal(['asc', 'desc']); /////// Thu tu sap xep desc lớn nhất , asc bé nhất
$numValue = (!empty($config['num_value']) && (int)$config['num_value'] > 3) ? (int)$config['num_value'] : rand(5,10); //// So luong phan tu cua day so
$min = !empty($config['min_value']) ? $config['min_value'] : 1;
$max = !empty($config['max_value']) ? $config['max_value'] : 100; ///// Gia tri max phai lon hon gia tri nho nhat + so luong phan tu

// $Arr = [];
// if( $rule ){
// 	////////// Tao day so tang dan
	$range = range($min, $max);
// 	$numArr = $range;
// } else{
// 	/////////////// tao day so ngau nhien
// 	$range = range($min, $max);
	$numArr = [];
	$numArr = getRandArrayVal($range, $numValue);

	if($sort == 'asc'){
		$answer = max($numArr);
	}else {
		$answer = min($numArr);
	}

?>

@include('site.questions.render-title', ['question' => $question, 'str_arr' => [$question->title, ($sort == 'desc') ? ' bé nhất ?' : 'lớn nhất ?'] ])

<div class="container-fluid question-wrapper">
	{{ Form::open(['method' => 'GET', 'class' => 'answer-question-form', 'id' => 'question-'.$question->id]) }}
		<input type="hidden" name="true_answer" value="{{ $answer }}" />
		<input type="hidden" name="qid" value="{{ $question->id }}" />
		<input type="hidden" name="lession_id" value="{{ !empty($lession->id) ? $lession->id : '' }}" />
		<input type="hidden" name="question_number" value="{{ $question_num }}" />
		
		<?php shuffle($numArr); ?>
		<div class="form-group">
			<div class="content inline-block type-number">

				@foreach($numArr as $key => $value)
					<div class="radio min_max padding0">
						{{ Form::radio('answer', $value, false, ['id' => $question_num.'-'.$key]) }}
						<label for="{{ $question_num.'-'.$key }}">
	                       {{ $value }}
	                   	</label>
					</div>
				@endforeach
			</div>
			
		</div>
	{{ Form::close() }}
</div>
@include('site.questions_guide.xac_dinh_so_lon_nhat_be_nhat_trong_day_so')
